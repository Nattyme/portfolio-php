<?php
// Получаем  текущую секцию для записи в БД
$currentSection = getCurrentSection ();

if( isset($_POST['submit']) ) {
  // Проверка на заполненность названия
  if( trim($_POST['title']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Введите заголовок категории'];
  } 

  if ( empty($_SESSION['errors'])) {
    $cat = R::dispense('categories');
    $cat->section = $currentSection;
    $cat->title = $_POST['title'];
    R::store($cat);
    
    $_SESSION['success'][] = ['title' => 'Категория была успешно создана'];
    header('Location: ' . HOST . 'admin/category?' . $currentSection);
    exit();
  }
}

$pageTitle = "Категории - новая запись";

ob_start();
include ROOT . "admin/templates/categories/new.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";