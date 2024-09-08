<?php
// Категории товаров, отображающиеся в выпадающем меню "Магазин"
$sqlQueryCatDB = 'SELECT 
                  DISTINCT c.id, c.title 
                  FROM `categories` AS c
                  INNER JOIN `products` AS p
                  ON c.id = p.cat';

$category_shop = R::getAll($sqlQueryCatDB);

// Бренды, отображающиеся в выпадающем списке у каждой категории
$sqlQueryBrandsDB = 'SELECT 
                  c.id as cat_id, c.title as cat_title, b.id as brand_id, b.title as brand_title
                  FROM `categories` AS c 
                  INNER JOIN `products` AS p
                  ON c.id = p.cat
                  INNER JOIN `brands` AS b
                  ON b.id = p.brand
                  ORDER BY p.brand ASC';
$catsBrands = R::getAll($sqlQueryBrandsDB);

$catsArray = array();
$brandsArray = array();

foreach($catsBrands as $key => $value) {
  if (!array_key_exists($value['cat_id'], $catsArray) ) {
    $catsArray[$value['cat_id']] = ['cat_title' => $value['cat_title']];
    $brandsArray[$value['cat_id']] = [$value['brand_id'] => $value['brand_title']]; 
  } else {
    if (!array_key_exists($value['brand_id'], $brandsArray)) {
      $brandsArray[$value['cat_id']][$value['brand_id']] = $value['brand_title']; 
    } 
  }
}
// $brandsArray = array();
// print_r($catsArray);
// print_r($brandsArray);
// die();







