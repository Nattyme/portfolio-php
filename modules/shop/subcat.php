<?php
echo 'hey';
// $pagination = pagination($settings['card_on_page_shop'], 'products');
// $productsDB = R::find('products', 'ORDER BY id DESC ' . $pagination['sql_page_limit']);

$products = array();
// Бренды, отображающиеся в выпадающем списке у каждой категории
$sqlQueryBrandsDB = 'SELECT 
                  c.id as cat_id, c.title as cat_title, 
                  p.subcat, p.id as product_id, p.title as product_title, p.cover_small as product_cover, p.price as product_price,
                  b.id as brand_id, b.title as brand_title
                  FROM `categories` AS c 
                  INNER JOIN `products` AS p
                  ON c.id = p.cat
                  INNER JOIN `brands` AS b
                  ON b.id = p.brand
                  ORDER BY p.brand ASC';
$catsBrands = R::getAll($sqlQueryBrandsDB);

$catsArray = array();
$brandsArray = array();
$currentProductsArray = array();

foreach($catsBrands as $key => $value) {
  if (!array_key_exists($value['cat_id'], $catsArray) ) {
    $catsArray[$value['cat_id']] = ['cat_title' => $value['cat_title']];
    $brandsArray[$value['cat_id']] = [$value['brand_id'] => $value['brand_title']]; 
    $currentProductsArray[$value['cat_id']][$value['brand_id']][$value['product_id']] = ['subcat' => $value['subcat'], 'title' => $value['product_title'], 
                                                'cover' => $value['product_cover'], 'price' => $value['product_price'], 
                                                'brand_title' => $value['brand_title']];
  } else {
    if (!array_key_exists($value['brand_id'], $brandsArray)) {
      $brandsArray[$value['cat_id']][$value['brand_id']] = $value['brand_title']; 
      $currentProductsArray[$value['cat_id']][$value['brand_id']][$value['product_id']] = ['title' => $value['product_title'], 
                                                'cover' => $value['product_cover'], 'price' => $value['product_price'],
                                                'subcat' => $value['subcat'],
                                                'brand_title' => $value['brand_title']];
    } 
  }

}

$pageTitle = "Каталог товаров";

// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/shop/catalog.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";