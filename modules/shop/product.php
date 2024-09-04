<?php 
require_once ROOT . "./libs/functions.php";

// Показываем отдельную страницу товара
$sqlQuery = 'SELECT
                products.id, products.title, products.content, products.cover, products.timestamp, 
                products.brand, products.edit_time, products.cat, products.price, products.brand,
                categories_shop.title AS cat_title,
                brands.title AS brand_title
             FROM `products`
             LEFT JOIN `categories_shop` ON products.cat = categories_shop.id
             LEFT JOIN `brands` ON products.brand = brands.id
             WHERE products.id = ? LIMIT 1';

$product = R::getRow($sqlQuery, [$uriGet]);

// // Комментарии
// $sqlQueryComments = 'SELECT 
//                         comments.text, comments.user, comments.timestamp,
//                         users.id, users.name, users.surname, users.avatar_small
//                      FROM `comments`
//                      LEFT JOIN `users` ON comments.user = users.id
//                      WHERE comments.post = ?';

// $comments = R::getAll( $sqlQueryComments, [$post['id']] );

// // Вывод похожих постов
// $relatedproducts = get_related_products($post['title']);

$pageTitle = "Название товара {$product['title']}";
// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/shop/product.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";