<?php 
// $pagination = pagination(6, 'posts');

// // Делаем запрос в БД для получения постов
// $posts = R::find('posts', "ORDER BY id DESC {$pagination['sql_page_limit']}");

$pageTitle = "Каталог товаров";
// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/shop/catalog.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";