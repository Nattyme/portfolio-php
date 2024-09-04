<?php
if( isset($_POST['submit'])) {
  // Проверка на заполненность названия
  if( trim($_POST['title']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Введите заголовок категории'];
  } 

  // Если нет ошибок
  if ( empty($_SESSION['errors'])) {
    $cat = R::load('categories', $_GET['id']);
    $cat->title = $_POST['title'];

    R::store($cat);
<<<<<<< HEAD
    
=======

>>>>>>> 4a02176d853c5b005c94930e85052a5dd998d251
    $_SESSION['success'][] = ['title' => 'Категория успешно обновлена.'];
  }
}

// Запрос постов в БД с сортировкой id по убыванию
$cat = R::load('categories', $_GET['id']); 

$pageTitle = "Категории. Редактировать категорию {$cat['title']}";

ob_start();
include ROOT . "admin/templates/categories/edit.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";