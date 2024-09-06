<?php
// Получаем товары, которые соответствуют товарам в избранном
if ( !empty($fav_list ) ) {
  $products = R::findLike ('products', ['id' => array_keys($fav_list)]); 
  // R::findLike('products', ['id' => ['5', '2']])
} else {
  $products = array();
}

$pageTitle = "Избранные товары";
// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/favorite/favorite.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";