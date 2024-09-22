<?php 
require_once ROOT . "./libs/functions.php";

// Показываем отдельную страницу проекта
$sqlQuery = 'SELECT  
              p.id, p.title, p.cat, p.about, p.deadline, p.pages, p.budget, p.link, p.timestamp, p.technology, p.cover,
              c.title AS cat_title, c.id AS cat_id
             FROM `portfolio` as p
             LEFT JOIN `categories` as c ON p.cat = c.id
             WHERE p.id = ? LIMIT 1';
$project = R::getRow($sqlQuery, [$uriGet]);

// $sqlQuery = 'SELECT
//                 products.id, products.title, products.content, products.cover, products.timestamp, 
//                 products.brand, products.edit_time, products.cat, products.price, products.brand,
//                 categories.title AS cat_title,
//                 brands.title AS brand_title
//              FROM `products`
//              LEFT JOIN `categories` ON products.cat = categories.id
//              LEFT JOIN `brands` ON products.brand = brands.id
//              WHERE products.id = ? LIMIT 1';

// Кнопки назад и вперед
$projectsId = R::getCol('SELECT id FROM `portfolio`');
foreach ($projectsId as $index => $value) {
  if ( $project['id'] == $value ) {
    $prevId = array_key_exists($index + 1, $projectsId) ? $projectsId[$index + 1] : NULL;
    $nextId = array_key_exists($index - 1, $projectsId) ? $projectsId[$index - 1] : NULL;
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