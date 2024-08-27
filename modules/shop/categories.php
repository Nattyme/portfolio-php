<?php 
$category = R::load('categories_shop', $uriGetParam);
$pageTitle = "Категория: {$category['title']}";

$pagination = pagination(6, 'products', ['cat = ? ', [$uriGetParam]]);

$productsDB = R::findLike('products', ['cat' => [$uriGetParam]], 'ORDER BY id DESC ' . $pagination['sql_page_limit']); 
$products = array();
foreach ($productsDB as $current_product) {
  $categories = R::find('categories_shop'); 
  $product['id'] = $current_product->id;
  $product['title'] = $current_product->title;
  $product['cat'] = $current_product->cat;
  $product['cover_small'] = $current_product->cover_small;
  $product['price'] =$current_product->price;
  if ($current_product['cat'] === $categories[$current_product['cat']]['id']) {
    $current_product['cat'] = $categories[$current_product['cat']]['title'];
  }
  $product['cat_title'] = $current_product['cat'];
  $products [] = $product;
}

// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/shop/catalog.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";