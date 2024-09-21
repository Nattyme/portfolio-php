<?php
$technology = R::load('technologies', $_GET['id']); 

if ( isset($_POST['submit']) ) {
  R::trash($technology); 
  
  $_SESSION['success'][] = ['title' => 'Технология успешно удалена.'];
  header('Location: ' . HOST . 'admin/technology');
  exit();
}

$pageTitle = "Технологии - удалить запись";
ob_start();
include ROOT . "admin/templates/technologies/delete.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";