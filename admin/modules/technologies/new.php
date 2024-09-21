<?php
if( isset($_POST['submit']) ) {
  // Проверка на заполненность названия
  if( trim($_POST['title']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Введите заголовок технологии'];
  } 

  if ( empty($_SESSION['errors'])) {
    $technology = R::dispense('technologies');
    $technology->title = $_POST['title'];

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