<?php
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
