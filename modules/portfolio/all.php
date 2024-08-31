<?php 
$pagination = pagination($settings['card_on_page_portfolio'], 'portfolio');
$projects = R::find('portfolio', "ORDER BY id DESC {$pagination['sql_page_limit']}");

$pageTitle = "Портфолио - все записи";
// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";

include ROOT . "templates/portfolio/all.tpl";

include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";