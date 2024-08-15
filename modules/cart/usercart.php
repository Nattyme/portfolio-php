<?php

// Определяем корзину
$cart = 0;
if ( isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  $cart = json_decode($_SESSION['cart'], true);
} elseif ( isset($_COOKIE['cart']) && !empty($_COOKIE['cart']) ) {
  $cart = json_decode($_COOKIE['cart'], true);
}

// Определяем счетчик товаров в корзине
$cartCount = array_sum($cart);


