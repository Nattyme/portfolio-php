<?php
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id']) ) {
   // Проверка запроса на удаление
  // admin/messages?action=delete&id=7
  $comment = R::load('comments', $_GET['id']);

  R::trash($comment);
}

// Запрос постов в БД с сортировкой id по убыванию
// $comments = R::find('comments', 'ORDER BY id DESC'); 


$sqlQuery = 'SELECT
                    users.id, users.name, users.surname, users.avatar_small,
                    comments.id, comments.text, comments.user, comments.timestamp, comments.status
              FROM `users`
              LEFT JOIN `comments` ON users.id = comments.user';
$comments = R::getAll($sqlQuery);



$pageTitle = "Комментарии - все записи";
$pageClass = "admin-page";

// Шаблон страницы
ob_start();
include ROOT . "admin/templates/comments/all.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";