<?php
$products = R::find('products', "ORDER BY id DESC {$pagination['sql_page_limit']}");

$pageTitle = "Магазин - все товары";
$pageClass = "admin-page";
ob_start();
include ROOT . "admin/templates/shop/all.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";