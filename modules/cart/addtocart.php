<?php
// Находим пользователя в БД по id
$user = R::load('users', $_SESSION['logged_user']['id']);

// Получаем корзину из БД
$cart = json_decode($user->cart, true);

// Добавляем товар в корзину
if(isset( $cart[$_GET['id']] )) {

  // Есди товар уже есть в корзине - увеличиваем кол-во на 1
  $cart[$_GET['id']] = $cart[$_GET['id']] + 1; 
} else {

  // Формируем корзину в ассоциативный массив
  $cart = [$_GET['id'] => 1];
}
print_r($cart);
die();

// Превращаем корзину в json строку
$user->cart = json_encode($cart);

// Обноваляем пользователя в БД
R::store($user);
header('Location: ' . HOST . 'shop/' . $_GET['id']);