<?php
// Находим категории, относящиеся к секции portfolio
$catsArray = R::find('categories', ' section LIKE ? ORDER BY title ASC', ['portfolio']);

// Создаем массив для категорий portfolio
$cats = [];
foreach ($catsArray as $key => $value) {
  $cats[] = ['id' => $value['id'], 'title' => $value['title'], 'section' => $value['section']];
}

if( isset($_POST['postEdit'])) {
  // Проверка на заполненность названия
  if( trim($_POST['title']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Введите заголовок проекта'];
  } 

  // Проверка на заполненность содержимого
  if( trim($_POST['about']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Заполните содержимое проекта'];
  } 

  if( trim($_POST['tools']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Заполните технологии проекта'];
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
    $project->tools = json_encode($tools);
    $project->link = $_POST['link'];
    $project->editTime = time();
    // print_r($project);
    // die();
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

$project = R::load('portfolio', $_GET['id']);

//Запрос технологий в БД с сортировкой id по убыванию
$technologies = R::find('technologies'); 

// Формируем массив выбранных технологий
$currentTechnologies = json_decode($project['tools'], true);

$pageTitle = "Блог. Редактировать пост {$project['title']}";
$pageClass = "admin-page";
// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/portfolio/edit.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";
