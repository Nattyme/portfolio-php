<?php 
// $pagination = pagination(6, 'posts');

// // Делаем запрос в БД для получения постов
// $posts = R::find('posts', "ORDER BY id DESC {$pagination['sql_page_limit']}");

$pageTitle = "Каталог товаров";
// Подключение шаблонов страницы
ob_start();
include ROOT . "templates/blog/all-posts.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";

include ROOT . "templates/blog/index.tpl";

include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";