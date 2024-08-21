<?php
// Получаем комментарий
$comment = R::load('comments', $_GET['id']); 

if ($comment['status'] === 'new') {
  $comment->status = NULL;
  R::store($comment);
  $commentsNewCounter = R::count('comments', ' status = ?', ['new']);
}

$pageTitle = "Комментарий";
$pageClass = "admin-page";
ob_start();
include ROOT . "admin/templates/comments/single.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";