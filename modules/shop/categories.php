<?php 
$category = R::load('categories_shop', $uriGetParam);
$pageTitle = "Категория: {$category['title']}";

$pagination = pagination(6, 'products', ['cat = ? ', [$uriGetParam]]);

$sqlQuery = 'SELECT
                products.id, products.title, products.content, products.cover, products.cover_small,
                products.timestamp, products.edit_time, products.cat, products.price,
                categories_shop.title AS cat_title
             FROM `products`
             LEFT JOIN `categories_shop` ON products.cat = categories_shop.id
             WHERE `cat` = ?';

$products = R::getAll($sqlQuery, [$uriGetParam]);
// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/shop/catalog.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";