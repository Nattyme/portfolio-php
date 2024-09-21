<?php
if( isset($_POST['submit']) ) {
  // Проверка на заполненность названия
  if( trim($_POST['title']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Введите заголовок технологии'];
  } 

  if ( empty($_SESSION['errors'])) {
    $technology = R::dispense('technologies');
    $technology->title = $_POST['title'];

     // Если передано изображение - уменьшаем, сохраняем, записываем в БД
    if ( isset($_FILES['cover']['name']) && $_FILES['cover']['tmp_name'] !== '') {
      //Если передано изображение - уменьшаем, сохраняем файлы в папку
      $coverFileName = saveUploadedImgNoCrop ('cover', [68, 68], 12, 'technology', [68, 68]);

      // Если новое изображение успешно загружено 
      if ($coverFileName) {
        // Записываем имя файлов в БД
        $project->cover = $coverFileName[0];
        $project->coverSmall = $coverFileName[1];
      }
    }

    R::store($technology);

    $_SESSION['success'][] = ['title' => 'Технология была успешно создана'];
    header('Location: ' . HOST . 'admin/technology');
    exit();
  }
}

$pageTitle = "Технологии - новая запись";

ob_start();
include ROOT . "admin/templates/technologies/new.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";