<?php
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

$catsArray = array();
$brandsArray = array();
// $subcat = array();

foreach($catsBrands as $key => $value) {
  if (!array_key_exists($value['cat_id'], $catsArray) ) {
    $catsArray[$value['cat_id']] = ['cat_title' =>  $value['cat_title']];
    $brandsArray[$value['cat_id']] = [$value['brand_title'] => $value['subcat']]; 
  
  } else {
    if (!array_key_exists($value['brand_title'], $brandsArray)) {
      $brandsArray[$value['cat_id']][$value['brand_title']] = $value['subcat']; 
    } 
  }
}
