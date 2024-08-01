<?php
if( isset($_POST['postSubmit']) ) {
  // Проверка на заполненность названия
  if( trim($_POST['title']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Введите заголовок проекта'];
  } 

  // Проверка на заполненность содержимого
  if( trim($_POST['content']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Заполните содержимое проекта'];
  } 

  if ( empty($_SESSION['errors'])) {
    $project = R::dispense('portfolio');
    $project->title = $_POST['title'];
    $project->cat = $_POST['cat'];
    $project->about = $_POST['about'];
    $project->tools = $_POST['tools'];
    $project->link = $_POST['link'];
    $project->deadline = $_POST['deadline'];
    $project->pages = $_POST['pages'];
    $project->budget = $_POST['budget'];
    $project->timestamp = time();

    // // Если передано изображение - уменьшаем, сохраняем, записываем в БД
    // if ( isset($_FILES['cover']['name']) && $_FILES['cover']['tmp_name'] !== '') {
    //   //Если передано изображение - уменьшаем, сохраняем файлы в папку
    //   $coverFileName = saveUploadedImg('cover', [600, 300], 12, 'blog', [1110, 460], [290, 230]);

    //   // Если новое изображение успешно загружено 
    //   if ($coverFileName) {
    //     // Записываем имя файлов в БД
    //     $post->cover = $coverFileName[0];
    //     $post->coverSmall = $coverFileName[1];
    //   }
    // }

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
