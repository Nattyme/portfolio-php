<?php
// Определяем избранное
$fav_list = array();

// Если пользователь вошел в профиль и в сессии есть изьранные товары
if ( isLoggedIn() && isset($_SESSION['fav_list'])) {

  // Записываем избранные товары из сессии в переменную
  $fav_list = $_SESSION['fav_list'];
} else if ( isset($_COOKIE['fav_list']) && !empty($_COOKIE['fav_list']) ) {

  // Записываем избранные товары из cookies в переменную
  $fav_list = json_decode($_COOKIE['fav_list'], true);
}

// Определяем счетчик товаров в избранном
$fav_listCount = array_sum($fav_list);


