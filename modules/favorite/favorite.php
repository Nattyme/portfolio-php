<?php
// Если лист "избранного" не пустой 
if ( !empty($fav_list ) ) {

  // Получаем товары, которые соответствуют товарам в избранном
  $products = R::findLike ('products', ['id' => array_keys($fav_list)]); 
} else {

  // Создаем массив
  $products = array();
}

$pageTitle = "Избранные товары";

// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/favorite/favorite.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";