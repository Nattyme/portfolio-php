<?php
// Получаем комментарий
$sqlQuery = 'SELECT 
                p.id as post_id, p.title as post_title,
                u.id as user_id, u.name as user_name, u.surname as user_surname, u.email as user_email,
                c.id, c.user, c.post, c.text, c.timestamp, c.status
              FROM `posts` AS p
              INNER JOIN `comments` AS c
              ON c.post = p.id
              INNER JOIN `users` AS u
              ON c.user = u.id
              WHERE c.id = ?';

$comment = R::getRow($sqlQuery, [$_GET['id']]);

if ($comment['status'] === 'new') {
  $comment = R::load('comments', $comment['id']);
  $comment->status = NULL;
  R::store($comment);
  $commentsNewCounter = R::count('comments', ' status = ?', ['new']);

  $comment = R::getRow($sqlQuery, [$_GET['id']]);
}

if( isset($_POST['block-user'])) {
  $userBlocked = R::dispense('blockedusers');
  $userBlocked->email = $comment['user_email'];
  $userBlocked->user_id = $comment['user_id'];
 
  // Сохраняем пользователя в блок лист
  R::store($userBlocked);

  // Находим ID заблокированного пользователя в таблице users
  $userBlocked = R::load('users', $comment['user_id']);

  // Находим комментарии пользователя в таблице комментариев
  $commentsToDelete = R::find('comments', ' user LIKE ?', [$userBlocked['user_id']]);

  // Обходим массив комментариев и удаляем 
  foreach ($commentsToDelete as $comment) {
    R::trash($comment);
  }

  // Удаляем пользователя из таблицы users
  R::trash($userBlocked);
  
  $_SESSION['success'][] = ['title' => 'Пользователь заблокирован. Все его комментарии успешно удалены. '];
  header('Location: ' . HOST . 'admin/comments');
  exit();
}

$pageTitle = "Комментарий";
$pageClass = "admin-page";
ob_start();
include ROOT . "admin/templates/comments/single.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";