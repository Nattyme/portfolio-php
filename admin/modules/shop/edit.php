<?php
$cats = R::find('categories_shop', 'ORDER BY title ASC'); 
$brands = R::find('brands', 'ORDER BY title ASC');

if( isset($_POST['submit'])) {
  // Проверка на заполненность названия
  if( trim($_POST['title']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Введите название товара'];
  } 

  // Проверка на заполненность содержимого
  if( trim($_POST['price']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Введите стоимость товара'];
  } 

  // Проверка на заполненность содержимого
  if( trim($_POST['content']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Введите описание товара'];
  } 

  // Если нет ошибок
  if ( empty($_SESSION['errors'])) {
    $product = R::load('products', $_GET['id']);
    $product->title = $_POST['title'];
<<<<<<< HEAD
    $product->cat = $_POST['cat'];
=======
>>>>>>> 4a02176d853c5b005c94930e85052a5dd998d251
    $product->brand = $_POST['brand'];
    $product->price = $_POST['price'];
    $product->content = $_POST['content'];
    $product->editTime = time();

    // Если передано изображение - уменьшаем, сохраняем, записываем в БД
    if( isset($_FILES['cover']['name']) && $_FILES['cover']['tmp_name'] !== '') {
      //Если передано изображение - уменьшаем, сохраняем файлы в папку, получаем название файлов изображений
      $coverFileName = saveUploadedImgNoCrop('cover', [600, 300], 12, 'products', [540, 380], [290, 230]);

      // Если новое изображение успешно загружено 
      if ($coverFileName) {
        $coverFolderLocation = ROOT . 'usercontent/products/';
        // Если есть старое изображение - удаляем 
        if (file_exists($coverFolderLocation . $product->cover) && !empty($product->cover)) {
          unlink($coverFolderLocation . $product->cover);
        }

        // Если есть старое маленькое изображение - удаляем 
        if (file_exists($coverFolderLocation . $product->coverSmall) && !empty($product->coverSmall)) {
          unlink($coverFolderLocation . $product->coverSmall);
        }
          // Записываем имя файлов в БД
        $product->cover = $coverFileName[0];
        $product->coverSmall = $coverFileName[1];
      }
    }

    // Удаление обложки
    if ( isset($_POST['delete-cover']) && $_POST['delete-cover'] == 'on') {
      $coverFolderLocation = ROOT . 'usercontent/products/';

      // Если есть старое изображение - удаляем 
      if (file_exists($coverFolderLocation . $product->cover) && !empty($product->cover)) {
        unlink($coverFolderLocation . $product->cover);
      }

      // Если есть старое маленькое изображение - удаляем 
      if (file_exists($coverFolderLocation . $product->coverSmall) && !empty($product->coverSmall)) {
        unlink($coverFolderLocation . $product->coverSmall);
      }

      // Удалить записи файла в БД
      $product->cover = NULL;
      $product->coverSmall = NULL;
    }

    R::store($product);

    if ( empty($_SESSION['errors'])) {
      $_SESSION['success'][] = ['title' => 'Товар успешно обновлен.'];
    }
  }
}

$product = R::load('products', $_GET['id']);

$pageTitle = "Магазин. Редактировать товар ";
$pageClass = "admin-page";
// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/shop/edit.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";
