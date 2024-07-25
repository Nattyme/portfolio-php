<?php
if( isset($_POST['postSubmit']) ) {
  // Проверка на заполненность названия
  if( trim($_POST['title']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Введите заголовок поста'];
  } 

  // Проверка на заполненность содержимого
  if( trim($_POST['content']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Заполните содержимое поста'];
  } 

  if ( empty($_SESSION['errors'])) {
    $post = R::dispense('posts');
    $post->title = $_POST['title'];
    $post->content = $_POST['content'];
    $post->timestamp= time();

    //Если передано изображение - уменьшаем, сохр., записываем в БД
    if( isset($_FILES['cover']['name']) && $_FILES['cover']['tmp_name'] !== '') {
      // 1. Записываем парам файла в переменные
      $fileName = $_FILES['cover']['name'];
      $fileTmpLoc = $_FILES['cover']['tmp_name'];
      $fileType = $_FILES['cover']['type'];
      $fileSize = $_FILES['cover']['size'];
      $fileErrorMsg = $_FILES['cover']['error'];
      $kaboom = explode(".", $fileName);
      $fileExt = end($kaboom);

      // 2. Проверка файла на соответствие требованиям сайта к фото
      // 2.1 Проверка на маленький размер изображения
      list($width, $height) = getimagesize($fileTmpLoc);
      if ($width < 600 || $height < 300 ) {
        $_SESSION['errors'][] = [
          'title' => 'Изображение слишком маленького размера',
          'desc' => 'Загрузите изображение с размерами от 600x300 и более.'
        ];
      }
      // 2.2 Проверка на большой вес файла изображения
      if ($fileSize > 12583912) {
        $_SESSION['errors'][] = [
          'title' => 'Файл изображения не должен быть более 12 Mb'
        ];
      }

      // 2.3 Проверка на формат файла
      if (!preg_match("/\.(gif|jpg|jpeg|png|webp)$/i", $fileName)) {
        $_SESSION['errors'][] = [
          'title'=> 'Недопустимый формат файла',
          'desc'=> '<p>Файл изображения должен быть в формате gif, jpg, jpeg или png.</p>'
        ];
      }

      // 2.4 Проверка на иную ошибку
      if ($fileErrorMsg == 1) {
        $_SESSION['errors'][] = ['title' => 'При загрузке файла произошла ошибка. Повторите попытку.'];
      }

      // Если ошибок нет
      if ( empty($_SESSION['errors']) ) {
        // Прописываем путь для хранения изображения
        $coverFolderLocation = ROOT . 'usercontent/blog/';

        $db_file_name = rand(100000000000,999999999999) . "." . $fileExt;
        $uploadfile1110 = $coverFolderLocation . $db_file_name;
        $uploadfile290 = $coverFolderLocation . '290-' . $db_file_name;

        //Обработать фотографию
        // 1. Обрезать до 160x160
        $result1110 = resize_and_crop($fileTmpLoc, $uploadfile1110, 1110, 460);
        // 2. Обрезать до 48x48
        $result290 = resize_and_crop($fileTmpLoc, $uploadfile290, 290, 230);

        if ($result1110 != true || $result290 != true) {
          $_SESSION['errors'][] = ['title' => 'Ошибка сохранения файла'];
          return false;
        }

        // Сохраняем имя файла в БД
        $post->cover = $db_file_name;
        $post->coverSmall = '290-' . $db_file_name;
      }
    }

    R::store($post);
    $_SESSION['success'][] = ['title' => 'Пост успешно добавлен'];
    header('Location: ' . HOST . 'admin/blog');
    exit();
  }
}

// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/blog/post-edit.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";
