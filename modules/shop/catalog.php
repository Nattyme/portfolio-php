<?php 
// $sqlQuery = 'SELECT
//                      p.id as product_id, p.cat, p.title as product_title,
//                      c.id as cat_id, c.title as cat_title,
//                      b.id as brand_id, b.title as brand_title
//               FROM `categories_shop` AS c
//               INNER JOIN `products` AS p
//               ON c.id = p.cat
//               INNER JOIN `brands` AS b
//               ON p.brand = b.id';
// $productsDB = R::getAll($sqlQuery);
// $pagination = pagination(6, $productsDB);
// $products = R::getAll($sqlQuery . 'ORDER BY id DESC' . $pagination['sql_page_limit']);


$pagination = pagination(6, 'products');
$productsDB = R::find('products', 'ORDER BY id DESC ' . $pagination['sql_page_limit']);

$products = array();
foreach ($productsDB as $current_product) {
  $categories = R::find('categories_shop');
  $brands = R::find('brands');
  
  $product['id'] = $current_product->id;
  $product['title'] = $current_product->title;
  $product['brand'] = $current_product->brand;
  $product['cat'] = $current_product->cat;
  $product['cover_small'] = $current_product->cover_small;
  $product['price'] =$current_product->price;
  if ($current_product['cat'] === $categories[$current_product['cat']]['id']) {
    $current_product['cat'] = $categories[$current_product['cat']]['title'];
  }
  if ($current_product['brand'] === $brands[$current_product['brand']]['id']) {
    $current_product['brand'] = $brands[$current_product['brand']]['title'];
  }
  $product['cat_title'] = $current_product['cat'];
  $product['brand_title'] = $current_product['brand'];
  $products [] = $product;
}

$pageTitle = "Каталог товаров";

// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/shop/catalog.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";