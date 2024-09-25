<?php
// Получаем данные по продукту, бренду и категории. Совмещаем по id категории продукта и id бренда продукта с id категории и id бренда
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

// Формируем массив по sql запросу
$catsBrands = R::getAll($sqlQueryBrandsDB);

// Создаем массив категорий
$catsArray = array();

// Создаем массив брендов
$brandsArray = array();

// Обходим массив sql запроса с данными по продукту, категориям и брендам
foreach($catsBrands as $key => $value) {

  // Если в массиве категорий нет id категории продукта 
  if (!array_key_exists($value['cat_id'], $catsArray) ) {

    // В массив категорий записываем id и название текущей категории
    $catsArray[$value['cat_id']] = ['cat_title' => $value['cat_title']];

    // В массив брендов записываем id текущей категории, название бренда и значение subcat(id подкатегории)
    $brandsArray[$value['cat_id']] = [$value['brand_title'] => $value['subcat']]; 
  
  } else {
    // Если в массиве брендов нет id бренда текущего продукта 
    if (!array_key_exists($value['brand_title'], $brandsArray)) {

      // В массив брендов записываем id текущей категории, название бренда и значение subcat(id подкатегории)
      $brandsArray[$value['cat_id']][$value['brand_title']] = $value['subcat']; 
    } 
  }
}
