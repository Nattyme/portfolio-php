<?php
$pagination = pagination(8, 'portfolio');

//Запрос постов в БД с сортировкой id по убыванию
$projects = R::find('portfolio', "ORDER BY id DESC {$pagination['sql_page_limit']}");

$pageTitle = "Портфолио - все записи";
$pageClass = "admin-page";
ob_start();
include ROOT . "admin/templates/portfolio/all.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";