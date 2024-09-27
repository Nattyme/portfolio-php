<?php

// Находим категории, относящиеся к секции portfolio
$catsArray = R::find('categories', ' section LIKE ? ORDER BY title ASC', ['portfolio']);

// Создаем массив для категорий portfolio
$cats = [];
foreach ($catsArray as $key => $value) {
  $cats[] = ['id' => $value['id'], 'title' => $value['title'], 'section' => $value['section']];
}

$project = R::load('portfolio', $_GET['id']);

//Запрос технологий в БД с сортировкой id по убыванию
$technologies = R::find('technologies'); 

if( isset($_POST['postEdit'])) {
  // Проверки на заполненность названия
  if( trim($_POST['title']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Введите заголовок проекта'];
  } else {
    // Проверка на текстовый формат
    if( ctype_digit($_POST['title'])) {
      $_SESSION['errors'][] = ['title' => 'Поле "Название проекта" заполняется в текстовом формате'];
    }
  }

  // Проверка на заполненность описания
  if( trim($_POST['about']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Поле "Описание проекта" не может быть пустым'];
  } else {
    // Проверка на текстовый формат
    // if( ctype_digit($_POST['about']) ) {
    //   $_SESSION['errors'][] = ['title' => 'Заполните описание проекта в текстовом формате'];
    // }
  }

  // Проверка на заполненность кол-ва страниц
  if( trim($_POST['pages']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Поле "Страниц свёрстано" не может быть пустым'];
  } else {
    // Проверка на цифровой формат страниц
    if( !ctype_digit($_POST['pages']) ) {
      $_SESSION['errors'][] = ['title' => 'Поле "Страниц свёрстано" заполняется в цифровом формате'];
    } 
  }

  // Проверка на заполненность времени проекта
  if( trim($_POST['deadline']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Поле "Время работы над проектом" не может быть пустым'];
  }

  // Проверка на заполненность бюджета проекта
  if( trim($_POST['budget']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Поле "Бюджет проекта" не может быть пустым'];
  }

  // Проверка на заполненность ссылки проекта 
  if( trim($_POST['link']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Поле "Ссылка на проект" не может быть пустым'];
  } 

  $currentTechnologies = array();
  
  // Проверка на заполненность технологий
  foreach ($technologies as $key => $value) {
    if(isset($_POST[$value['id']])) {
      $currentTechnologies[] = ['id' => $value['id'], 'title' => $value['title']];
    } 
  }

  if ( empty( $currentTechnologies) ) {
    $_SESSION['errors'][] = ['title' => 'Укажите технологии проекта'];
  }
 
  // Если нет ошибок
  if ( empty($_SESSION['errors'])) {
    $project = R::load('portfolio', $_GET['id']);
    $project->title = $_POST['title'];
    $project->cat = $_POST['cat'];
    $project->about = $_POST['about'];
    $project->deadline = $_POST['deadline'];
    $project->pages = $_POST['pages'];
    $project->budget = $_POST['budget'];
    $project->technology = json_encode($currentTechnologies);
    $project->link = $_POST['link'];
    $project->editTime = time();
    
    // Если передано изображение - уменьшаем, сохраняем, записываем в БД
    if( isset($_FILES['cover']['name']) && $_FILES['cover']['tmp_name'] !== '') {
      //Если передано изображение - уменьшаем, сохраняем файлы в папку, получаем название файлов изображений
      $coverFileName = saveUploadedImg('cover', [500, 240], 12, 'portfolio', [1110, 935], [500, 240]);

      // Если новое изображение успешно загружено 
      if ($coverFileName) {
        $coverFolderLocation = ROOT . 'usercontent/portfolio/';
        // Если есть старое изображение - удаляем 
        if (file_exists($coverFolderLocation . $project->cover) && !empty($project->cover)) {
          unlink($coverFolderLocation . $project->cover);
        }

        // Если есть старое маленькое изображение - удаляем 
        if (file_exists($coverFolderLocation . $project->coverSmall) && !empty($project->coverSmall)) {
          unlink($coverFolderLocation . $project->coverSmall);
        }
          // Записываем имя файлов в БД
        $project->cover = $coverFileName[0];
        $project->coverSmall = $coverFileName[1];
      }
    }

    // Удаление обложки
    if ( isset($_POST['delete-cover']) && $_POST['delete-cover'] == 'on') {
      $coverFolderLocation = ROOT . 'usercontent/portfolio/';

      // Если есть старое изображение - удаляем 
      if (file_exists($coverFolderLocation . $project->cover) && !empty($project->cover)) {
        unlink($coverFolderLocation . $project->cover);
      }

      // Если есть старое маленькое изображение - удаляем 
      if (file_exists($coverFolderLocation . $project->coverSmall) && !empty($project->coverSmall)) {
        unlink($coverFolderLocation . $project->coverSmall);
      }

      // Удалить записи файла в БД
      $project->cover = NULL;
      $project->coverSmall = NULL;
    }

    R::store($project);

    if ( empty($_SESSION['errors'])) {
      $_SESSION['success'][] = ['title' => 'Проект успешно обновлен.'];
    }
  }
}

// Формируем массив выбранных технологий
$currentTechnologies = json_decode($project['technology'], true);


$pageTitle = "Портфолио. Редактировать проект {$project['title']}";
$pageClass = "admin-page";
// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/portfolio/edit.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";
