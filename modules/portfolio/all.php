<?php 
$pagination = pagination(6, 'portfolio');
$projects = R::find('portfolio', "ORDER BY id DESC {$pagination['sql_page_limit']}");

$pageTitle = "Портфолио - все записи";
// Подключение шаблонов страницы
ob_start();
include ROOT . "templates/portfolio/all.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";

include ROOT . "templates/portfolio/index.tpl";

include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";