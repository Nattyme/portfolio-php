<?php

if( isset($_POST['postEdit'])) {
  $post = R::load('posts', $_GET['id']);
  $post->title = $_POST['title'];
  $post->content = $_POST['content'];
  $post->editTime = time();
  R::store($post);

  $_SESSION['success'][] = ['title' => 'Пост успешно обновлен.'];
}

$post = R::load('posts', $_GET['id']);

// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/blog/post-edit.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";
