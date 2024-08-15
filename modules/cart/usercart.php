<?php
$cartCount = 0;

if( isset($_SESSION['cart']) ) {
  $cartCount = array_sum($_SESSION['cart']);
} elseif ( isset($_COOKIE['cart']) && !empty($_COOKIE['cart']) ) {
  $cartCount = array_sum(json_decode($_COOKIE['cart'], true));
}