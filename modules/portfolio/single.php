<?php 
require_once ROOT . "./libs/functions.php";

// Одиночный пост, показываем отдельную страницу блога
$sqlQuery = 'SELECT * FROM `portfolio` WHERE portfolio.id = ? LIMIT 1';
$project = R::getRow($sqlQuery, [$uriGet]);

// Кнопки назад и вперед
$postsId = R::getCol('SELECT id FROM `portfolio`');
foreach ($postsId as $index => $value) {
  if ( $project['id'] == $value ) {
    $prevId = array_key_exists($index + 1, $postsId) ? $postsId[$index + 1] : NULL;
    $nextId = array_key_exists($index - 1, $postsId) ? $postsId[$index - 1] : NULL;
  }
}

// // Комментарии
// $sqlQueryComments = 'SELECT 
//                         comments.text, comments.user, comments.timestamp,
//                         users.id, users.name, users.surname, users.avatar_small
//                      FROM `comments`
//                      LEFT JOIN `users` ON comments.user = users.id
//                      WHERE comments.post = ?';

// $comments = R::getAll( $sqlQueryComments, [$post['id']] );

$pageTitle = "Проект в портфолио - {$project['title']}";
// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";

include ROOT . "templates/portfolio/single.tpl";

include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";