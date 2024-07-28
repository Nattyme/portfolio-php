<?php

if( isset($_POST['submit'])) {
  // Проверка на заполненность названия
  if( trim($_POST['title']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Введите заголовок поста'];
  } 

  // Если нет ошибок
  if ( empty($_SESSION['errors'])) {
    $cat = R::load('categories', $_GET['id']);
    $cat->cat_title = $_POST['title'];

    R::store($cat);

    $_SESSION['success'][] = ['title' => 'Категория успешно обновлена.'];
  }
}

// Запрос постов в БД с сортировкой id по убыванию
$cat = R::load('categories', $_GET['id']); 

$pageTitle = "Категории - редактировтаь запись";
ob_start();
include ROOT . "admin/templates/categories/edit.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";