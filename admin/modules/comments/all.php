<?php
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id']) ) {
   // Проверка запроса на удаление
  $comment = R::load('comments', $_GET['id']);

  R::trash($comment);
}

// Подключаем пагинацию
$pagination = pagination(8, 'comments');

$sqlQuery = 'SELECT
                    users.id AS user_id, users.name, users.surname, users.avatar_small,
                    comments.id, comments.text, comments.user, comments.timestamp, 
                    comments.status, comments.post,
                    posts.title, posts.id AS post_id
              FROM `users`
              LEFT JOIN `comments` ON users.id = comments.user
              LEFT JOIN `posts` ON comments.post = posts.id
              ORDER BY comments.id DESC';
              
$comments = R::getAll($sqlQuery);

$pageTitle = "Комментарии - все записи";
$pageClass = "admin-page";

// Шаблон страницы
ob_start();
include ROOT . "admin/templates/comments/all.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";