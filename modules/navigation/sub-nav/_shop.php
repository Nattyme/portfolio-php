<?php
// Категории товаров, отображающиеся в выпадающем меню "Магазин"
$sqlQueryCatDB = 'SELECT 
                  DISTINCT c.id, c.title 
                  FROM `categories_shop` AS c
                  INNER JOIN `products` AS p
                  ON c.id = p.cat';

$category_shop = R::getAll($sqlQueryCatDB);
// $cats_brands = R::getAll($sqlQueryCatDB, [3]);



// Бренды, отображающиеся в выпадающем списке у каждой категории
