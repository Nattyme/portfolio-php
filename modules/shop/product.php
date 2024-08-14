<?php 
require_once ROOT . "./libs/functions.php";
//Одиночный пост, показываем отдельную страницу блога
$sqlQuery = 'SELECT
                products.id, products.title, products.content, products.cover, products.timestamp, 
                products.edit_time, products.cat, products.price,
                categories_shop.title AS cat_title
             FROM `products`
             LEFT JOIN `categories_shop` ON products.cat = categories_shop.id
             WHERE products.id = ? LIMIT 1';

$product = R::getRow($sqlQuery, [$uriGet]);

// // Кнопки назад и вперед
// $productsId = R::getCol('SELECT id FROM products');
// foreach ($productsId as $index => $value) {
//   if ( $post['id'] == $value ) {
//     $prevId = array_key_exists($index + 1, $productsId) ? $productsId[$index + 1] : NULL;
//     $nextId = array_key_exists($index - 1, $productsId) ? $productsId[$index - 1] : NULL;
//   }
// }

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