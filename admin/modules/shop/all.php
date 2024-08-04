<?php
$pagination = pagination(8, 'products');
$products = R::find('products');

$pageTitle = "Магазин - все товары";
$pageClass = "admin-page";
ob_start();
include ROOT . "admin/templates/shop/all.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";