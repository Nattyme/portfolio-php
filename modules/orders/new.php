<?php 
if ( !empty($cart) ) {

  $products = R::findLike ('products', ['id' => array_keys($cart)]); 
  // R::findLike('products', ['id' => ['5', '2']])
} else {
  $products = array();
}

// Общая стоимость товаров в корзине
$cartTotalPrice = 0;
foreach ( $cart as $index => $item) {
  $cartTotalPrice = $cartTotalPrice + $products[$index]['price'] * $item;
}

$pageTitle = "Оформление нового заказа";
// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/orders/new.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";