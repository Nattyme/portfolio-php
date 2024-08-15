<?php 
$pageTitle = "Корзина товаров";

// Получаем товары, которые соответствуют товарам в корзине
$products = R::findLike ('products', ['id' => array_keys($_SESSION['cart'])]); 
// R::findLike('products', ['id' => ['5', '2']])

// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/cart/cart.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";