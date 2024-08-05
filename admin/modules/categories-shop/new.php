<?php
if( isset($_POST['submit']) ) {
  
  // Проверка на заполненность названия
  if( trim($_POST['title']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Введите заголовок категории'];
  } 

  if ( empty($_SESSION['errors'])) {
    define('TABLE', 'categories_shop');
    R::ext('xdispense', function( $TABLE ){ 
      return R::getRedBean()->dispense( $TABLE ); 
    });
    $cat = R::xdispense( TABLE);
    $cat->title = $_POST['title'];
   
    R::store($cat);

    $_SESSION['success'][] = ['title' => 'Категория была успешно создана'];
    header('Location: ' . HOST . 'admin/category-shop');
    exit();
  }
}

$pageTitle = "Категории - новая запись";
$pageClass = "admin-page";
 
ob_start();
include ROOT . "admin/templates/categories-shop/new.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";