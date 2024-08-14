<?php
$cat = R::load('categories', $_GET['id']); 

if ( isset($_POST['submit']) ) {
  R::trash($cat); 
  
  $_SESSION['success'][] = ['title' => 'Категория была успешно удалена.'];
  header('Location: ' . HOST . 'admin/category');
  exit();
}

$pageTitle = "Категории - удалить запись";
ob_start();
include ROOT . "admin/templates/categories/delete.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";