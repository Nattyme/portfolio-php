<?php
if( isset($_SESSION['cart']) ) {
  $cartCount = array_sum($_SESSION['cart']);
} else {
  $cartCount = 0;
}