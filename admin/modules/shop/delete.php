<?php
$product = R::load('products', $_GET['id']); 

if( isset($_POST['submit']) ) {
  // Удаление обложки
  if ( !empty($product['cover']) ) {
    // Удадить файлы обложки с сервера
    $coverFolderLocation = ROOT . 'usercontent/products/';
    unlink($coverFolderLocation . $product->cover);
    unlink($coverFolderLocation . $product->coverSmall);
  }

  R::trash($product);
  
  $_SESSION['success'][] = ['title' => 'Товар был успешно удалён.'];
  header('Location: ' . HOST . 'admin/blog');
  exit();
}

$pageTitle = "Магазин - удалить товар";
$pageClass = "admin-page";
// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/shop/delete.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";
