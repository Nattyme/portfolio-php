<?php
if ( isset($_POST['submit'])) {
  // Проверка на ID
  if ( !isset($_POST['id']) || empty($_POST['id'])) {
    $_SESSION['errors'][] = ['title' => 'Отсутствует параметр id. Невозможно добавитить комментарий'];
  }

  // Проверка на текст комментария
  if (    !isset($_POST['comment']) || 
          empty(trim($_POST['comment'])) || 
          mb_strlen(trim($_POST['comment'])) < 3 
      ) 
  {
    $_SESSION['errors'][] = ['title' => 'Комментарий не может быть пустым'];
  }

  // Сохранение комментария
  if ( empty($_SESSION['errors'])) {
    $comment = R::dispense('comments');
    $comment->text = $_POST['comment'];
    $comment->post = $_POST['id'];
    $comment->user = $_SESSION['logged_user']['id'];
    $comment->timestamp = time();
    R::store($comment);

    header('Location: ' . HOST . "blog/" . $_POST['id'] . '#comments');

  } else {
      header('Location: ' . HOST . "blog/" . $_POST['id'] . '#comments-form');
  }
}