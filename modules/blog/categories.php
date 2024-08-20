<?php 
$category = R::load('categories', $uriGetParam);
$pageTitle = "Категория: {$category['title']}";

$pagination = pagination(6, 'posts', ['cat = ? ', [$uriGetParam]]);
$posts = R::findLike('posts', ['cat' => [$uriGetParam]], 'ORDER BY id DESC ' . $pagination['sql_page_limit']); 

// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";

include ROOT . "templates/blog/all.tpl";

include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";