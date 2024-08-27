<?php
// Сообщения
$messagesNewCounter = R::count('messages', ' status = ? ', ['new']);
$messagesDisplayLimit = 99; 

// Заказы
$ordersNewCounter = R::count('orders', ' status = ?', ['new']);
$ordersDisplayLimit = 99; 

// Комментарии
$commentsNewCounter = R::count('comments', ' status = ?', ['new']);
$commentsDisplayLimit = 99; 

// Категории товаров, отображающиеся в выпадающем меню "Магазин"
$category_shopDB = R::find('categories_shop');

$sqlQuery = 'SELECT
                categories_shop.id, categories_shop.title,
                products.cat
             FROM `categories_shop`
             LEFT JOIN `products` ON categories_shop.id = products.cat
             WHERE categories_shop.id = ? LIMIT 1';

$category_shop = array();
foreach ($category_shopDB as $category) {
  $categoryCurrent = R::getRow($sqlQuery, [$category['id']]);
  if (!empty($categoryCurrent['cat'])) {
    $category_shop[] = ['id' => $categoryCurrent['cat'], 'title' => $categoryCurrent['title']];
  }
}

// Категории постов, отображающиеся в выпадающем меню "Блог"
$category_postDB = R::find('categories');

$sqlQuery = 'SELECT
                categories.id, categories.title,
                posts.cat
             FROM `categories`
             LEFT JOIN `posts` ON categories.id = posts.cat
             WHERE categories.id = ? LIMIT 1';

$category_post = array();
foreach ($category_postDB as $category) {
  $categoryCurrent = R::getRow($sqlQuery, [$category['id']]);
  if (!empty($categoryCurrent['cat'])) {
    $category_post[] = ['id' => $categoryCurrent['cat'], 'title' => $categoryCurrent['title']];
  }
}
