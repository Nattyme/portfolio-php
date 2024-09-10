<?php
// Категории товаров, отображающиеся в выпадающем меню "Магазин"
// $sqlQueryCatDB = 'SELECT 
//                   DISTINCT c.id, c.title 
//                   FROM `categories` AS c
//                   INNER JOIN `products` AS p
//                   ON c.id = p.cat';

// $category_shop = R::getAll($sqlQueryCatDB);

// Бренды, отображающиеся в выпадающем списке у каждой категории
$sqlQueryBrandsDB = 'SELECT 
                  c.id as cat_id, c.title as cat_title, 
                  p.id as product_id, p.title as product_title, p.cover_small as product_cover, p.price as product_price,
                  p.subcat,
                  b.id as brand_id, b.title as brand_title
                  FROM `categories` AS c 
                  INNER JOIN `products` AS p
                  ON c.id = p.cat
                  INNER JOIN `brands` AS b
                  ON b.id = p.brand
                  ORDER BY p.brand ASC';
$catsBrands = R::getAll($sqlQueryBrandsDB);
// print_r($catsBrands);
// die();
$catsArray = array();
$brandsArray = array();
$currentProductsArray = array();

foreach($catsBrands as $key => $value) {
  if (!array_key_exists($value['cat_id'], $catsArray) ) {
    $catsArray[$value['cat_id']] = ['cat_title' => $value['cat_title']];
    $brandsArray[$value['cat_id']] = [$value['brand_id'] => $value['brand_title']]; 
    $currentProductsArray[$value['cat_id']][$value['brand_id']][$value['product_id']] = ['title' => $value['product_title'], 
                                                'cover' => $value['product_cover'], 'price' => $value['product_price'], 
                                                'brand_title' => $value['brand_title']];
  } else {
    if (!array_key_exists($value['brand_id'], $brandsArray)) {
      $brandsArray[$value['cat_id']][$value['brand_id']] = $value['brand_title']; 
      $currentProductsArray[$value['cat_id']][$value['brand_id']][$value['product_id']] = ['title' => $value['product_title'], 
                                                'cover' => $value['product_cover'], 'price' => $value['product_price'],
                                                'brand_title' => $value['brand_title']];
    } 
  }
}

// Загружаем продукты выбранной категории и выбранного бренда

// $brandsArray = array();
// print_r($catsArray);
