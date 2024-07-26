<?php
if( isset($_POST['postEdit'])) {
  // Проверка на заполненность названия
  if( trim($_POST['title']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Введите заголовок поста'];
  } 

  // Проверка на заполненность содержимого
  if( trim($_POST['content']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Заполните содержимое поста'];
  } 

  // Если нет ошибок
  if ( empty($_SESSION['errors'])) {
    $post = R::load('posts', $_GET['id']);
    $post->title = $_POST['title'];
    $post->content = $_POST['content'];
    $post->editTime = time();

    // Если передано изображение - уменьшаем, сохраняем в папку
    $coverFileName = saveUploadedImg('cover', [600, 300], 12, 'blog', [1110, 460], [290, 230]);

    // Если новое изображение успешно загружено 
    if ($coverFileName) {
      // Удаляем старое изображение
      unlink(ROOT . 'usercontent/blog/' . $post->cover);
      unlink(ROOT . 'usercontent/blog/' . $post->coverSmall);
    }
    
    // Записываем имя файлов в БД
    $post->cover = $coverFileName[0];
    $post->coverSmall = $coverFileName[1];
    // Удаление обложки
    if ( isset($_POST['delete-cover']) && $_POST['delete-cover'] == 'on') {
      // Удадить файлы обложки с сервера
      $coverFolderLocation = ROOT . 'usercontent/blog/';
      unlink($coverFolderLocation . $post->cover);
      unlink($coverFolderLocation . $post->coverSmall);

      // Удалить записи файла в БД
      $post->cover = NULL;
      $post->coverSmall = NULL;
    }

    R::store($post);

    $_SESSION['success'][] = ['title' => 'Пост успешно обновлен.'];
  }
}

$post = R::load('posts', $_GET['id']);

// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/blog/post-edit.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";
