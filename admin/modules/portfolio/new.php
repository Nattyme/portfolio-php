<?php
// Получаем  текущую секцию 
$currentSection = getCurrentSection();
$_SESSION['currentSection'] = $currentSection;

// Находим категории, относящиеся к секции portfolio
$catsArray = R::find('categories', ' section LIKE ? ORDER BY title ASC', ['portfolio']);

// Формируем массив технологий
$technologies = R::find('technologies');

// Создаем массив для категорий portfolio
$cats = [];
foreach ($catsArray as $key => $value) {
  $cats[] = ['id' => $value['id'], 'title' => $value['title'], 'section' => $value['section']];
}

if( isset($_POST['postSubmit']) ) {

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
    // if( ctype_digit($_POST['about'])) {
    //   $_SESSION['errors'][] = ['title' => 'Заполните описание проекта в текстовом формате'];
    // }
  }

  // Проверка на заполненность кол-ва страниц
  if( trim($_POST['pages']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Поле "Страниц свёрстано" не может быть пустым'];
  } else {

    // Проверка на цифровой формат страниц
    if( !ctype_digit($_POST['pages'])) {
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
  } else {

    // Валидация ссылки
    if( !filter_var(trim($_POST['link']), FILTER_VALIDATE_URL) ) {
      $_SESSION['errors'][] = ['title' => 'Указан неверный формат ссылки'];
    }

  }

  $currentTechnologies = array();

  foreach ($technologies as $key => $value) {
    if(isset($_POST[$value['id']])) {
      $currentTechnologies[] = ['id' => $value['id'], 'title' => $value['title']];
    }
  }

  if ( empty( $currentTechnologies) ) {
    $_SESSION['errors'][] = ['title' => 'Укажите технологии проекта'];
  }

  if ( empty($_SESSION['errors'])) {
    $project = R::dispense('portfolio');
    $project->title = $_POST['title'];
    $project->cat = $_POST['cat'];
    $project->about = $_POST['about'];
    $project->deadline = $_POST['deadline'];
    $project->pages = $_POST['pages'];
    $project->budget = $_POST['budget'];
    $project->link = $_POST['link'];
    $project->timestamp = time();

    $project->technology = json_encode($currentTechnologies);

    // Если передано изображение - уменьшаем, сохраняем, записываем в БД
    if ( isset($_FILES['cover']['name']) && $_FILES['cover']['tmp_name'] !== '') {
      //Если передано изображение - уменьшаем, сохраняем файлы в папку
      $coverFileName = saveUploadedImg('cover', [500, 241], 12, 'portfolio', [1110, 460], [500, 241]);

      // Если новое изображение успешно загружено 
      if ($coverFileName) {
        // Записываем имя файлов в БД
        $project->cover = $coverFileName[0];
        $project->coverSmall = $coverFileName[1];
      }
    }
 
    R::store($project);

    $_SESSION['success'][] = ['title' => 'Проект успешно добавлен'];
    header('Location: ' . HOST . 'admin/portfolio');
    exit();
  }
}

$pageTitle = "Портфолио - создание новой записи";
$pageClass = "admin-page";
// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/portfolio/new.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";
