<?php
// $cats = R::find('categories', 'ORDER BY title ASC'); 
if( isset($_POST['submit']) ) {
  // Проверка на заполненность названия
  if( trim($_POST['title']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Введите название товара'];
  } 

  if( trim($_POST['price']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Введите стоимость товара'];
  } 

  // Проверка на заполненность содержимого
  if( trim($_POST['content']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Введите описание товара'];
  } 

  if ( empty($_SESSION['errors']) ) {
    $product = R::dispense('products');
    $product->title = $_POST['title'];
    $product->price = $_POST['price'];
    $product->content = $_POST['content'];
    $product->timestamp = time();

    // Если передано изображение - уменьшаем, сохраняем, записываем в БД
    if ( isset($_FILES['cover']['name']) && $_FILES['cover']['tmp_name'] !== '') {
      //Если передано изображение - уменьшаем, сохраняем файлы в папку
      $coverFileName = saveUploadedImg('cover', [600, 300], 12, 'products', [540, 380], [290, 230]);

      // Если новое изображение успешно загружено 
      if ($coverFileName) {
        // Записываем имя файлов в БД
        $product->cover = $coverFileName[0];
        $product->coverSmall = $coverFileName[1];
      }
    }

    R::store($product);

    $_SESSION['success'][] = ['title' => 'Товар успешно добавлен'];
    header('Location: ' . HOST . 'admin/shop');
    exit();
  }
}

$pageTitle = "Магазин - добавить новый товар";
$pageClass = "admin-page";
// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/shop/new.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";
