<?php
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id']) ) {
   // Проверка запроса на удаление
  $comment = R::load('comments', $_GET['id']);

  R::trash($comment);
}

// Подключаем пагинацию
$pagination = pagination(8, 'comments');

$sqlQuery = 'SELECT
                    u.id AS user_id, u.name, u.surname, u.avatar_small,
                    c.id, c.text, c.user, c.timestamp, 
                    c.status, c.post,
                    p.title, p.id AS post_id
              FROM `users` as u
              LEFT JOIN `comments` as c ON u.id = c.user
              LEFT JOIN `posts` as p ON c.post = p.id
              ORDER BY c.id DESC';
              
$comments = R::getAll($sqlQuery);

$pageTitle = "Комментарии - все записи";
$pageClass = "admin-page";

// Шаблон страницы
ob_start();
include ROOT . "admin/templates/comments/all.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";