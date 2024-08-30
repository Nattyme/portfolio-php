<?php
// Категории товаров, отображающиеся в выпадающем меню "Магазин"
$sqlQueryCatDB = 'SELECT 
                  DISTINCT c.id, c.title 
                  FROM `categories_shop` AS c
                  INNER JOIN `products` AS p
                  ON c.id = p.cat';

$category_shop = R::getAll($sqlQueryCatDB);

// Бренды, отображающиеся в выпадающем списке у каждой категории
$sqlQueryBrandsDB = 'SELECT 
                  c.id as cat_id, c.title as cat_title, b.id as brand_id, b.title as brand_title
                  FROM `categories_shop` AS c
                  INNER JOIN `products` AS p
                  ON c.id = p.cat
                  INNER JOIN `brands` AS b
                  ON b.id = p.brand';
$catsBrands = R::getAll($sqlQueryBrandsDB);
$catsBrandsArray = array();

foreach($catsBrands as $key => $value) {
 
  // $catBrands = $new[$value['cat_id']]['cat_brands'];
  if (!array_key_exists($value['cat_id'], $catsBrandsArray)) {
    $catsBrandsArray[$value['cat_id']] = ['cat_title' => $value['cat_title']];
    $catsBrandsArray[$value['cat_id']]['cat_brands'] = [$value['brand_title']];
  } else {
    if (!in_array($value['brand_title'], $catsBrandsArray[$value['cat_id']]['cat_brands'])) {
      array_push($catsBrandsArray[$value['cat_id']]['cat_brands'], $value['brand_title']);
    }
  }
}
// print_r($catsBrandsArray);
// die();
$brandsArray = array();

foreach($catsBrandsArray as $key => $value) {
  $brandsArray[$key] = $value['cat_brands'];
}





