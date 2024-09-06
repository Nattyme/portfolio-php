<?php
// Определяем избранное
$fav_list = array();
if ( isLoggedIn() && isset($_SESSION['fav_list'])) {
  $fav_list = $_SESSION['fav_list'];
} else if ( isset($_COOKIE['fav_list']) && !empty($_COOKIE['fav_list']) ) {
  $fav_list = json_decode($_COOKIE['fav_list'], true);
}


// Определяем счетчик товаров в избранном
$fav_listCount = array_sum($fav_list);


