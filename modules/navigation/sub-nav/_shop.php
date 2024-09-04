<?php
// Категории товаров, отображающиеся в выпадающем меню "Магазин"
$sqlQueryCatDB = 'SELECT 
                  DISTINCT c.id, c.title 
                  FROM `categories_shop` AS c
                  INNER JOIN `products` AS p
                  ON c.id = p.cat';

$category_shop = R::getAll($sqlQueryCatDB);

// Бренды, отображающиеся в выпадающем списке у каждой категории
<<<<<<< HEAD
// $sqlQueryBrandsDB = 'SELECT 
//                   c.id as cat_id, c.title as cat_title, b.id as brand_id, b.title as brand_title
//                   FROM `categories_shop` AS c
//                   INNER JOIN `products` AS p
//                   ON c.id = p.cat
//                   INNER JOIN `brands` AS b
//                   ON b.id = p.brand
//                   ORDER BY p.brand ASC';
// $catsBrands = R::getAll($sqlQueryBrandsDB);
// $catsBrandsArray = array();

// foreach($catsBrands as $key => $value) {
//   if (!array_key_exists($value['cat_id'], $catsBrandsArray)) {
//     $catsBrandsArray[$value['cat_id']] = ['cat_title' => $value['cat_title'], 'cat_brands' => [$value['brand_id'] => $value['brand_title']]];
//   } else {
//     if (!in_array($value['brand_title'], $catsBrandsArray[$value['cat_id']]['cat_brands'])) {
//       // $catsBrandsArray[$value['cat_id']]['cat_brands'] = array_merge($catsBrandsArray[$value['cat_id']]['cat_brands'], [$value['brand_id'] => $value['brand_title']]);
//       $catsBrandsArray[$value['cat_id']]['cat_brands'][$value['brand_id']] = $value['brand_title'];
//     }
//   }

// }
// $brandsArray = array();

// foreach($catsBrandsArray as $key => $value) {
//   $brandsArray[$key] = $value['cat_brands'];
// }
=======
$sqlQueryBrandsDB = 'SELECT 
                  c.id as cat_id, c.title as cat_title, b.id as brand_id, b.title as brand_title
                  FROM `categories_shop` AS c
                  INNER JOIN `products` AS p
                  ON c.id = p.cat
                  INNER JOIN `brands` AS b
                  ON b.id = p.brand
                  ORDER BY p.brand ASC';
$catsBrands = R::getAll($sqlQueryBrandsDB);
$catsBrandsArray = array();

foreach($catsBrands as $key => $value) {
  if (!array_key_exists($value['cat_id'], $catsBrandsArray)) {
    $catsBrandsArray[$value['cat_id']] = ['cat_title' => $value['cat_title'], 'cat_brands' => [$value['brand_id'] => $value['brand_title']]];
  } else {
    if (!in_array($value['brand_title'], $catsBrandsArray[$value['cat_id']]['cat_brands'])) {
      // $catsBrandsArray[$value['cat_id']]['cat_brands'] = array_merge($catsBrandsArray[$value['cat_id']]['cat_brands'], [$value['brand_id'] => $value['brand_title']]);
      $catsBrandsArray[$value['cat_id']]['cat_brands'][$value['brand_id']] = $value['brand_title'];
    }
  }

}


$brandsArray = array();

foreach($catsBrandsArray as $key => $value) {
  $brandsArray[$key] = $value['cat_brands'];
}
>>>>>>> 4a02176d853c5b005c94930e85052a5dd998d251







