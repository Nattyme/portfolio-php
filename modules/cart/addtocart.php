<?php
// Находим пользователя в БД по id
$user = R::load('users', $_SESSION['logged_user']['id']);

// Получаем корзину из БД
$cart = json_decode($user->cart, true);

// Добавляем товар в корзину
if(isset( $cart[$_GET['id']] )) {

  // Если товар уже есть в корзине - увеличиваем кол-во на 1
  $cart[$_GET['id']] = $cart[$_GET['id']] + 1; 
} else {

  // Формируем корзину в ассоциативный массив
  $cart[$_GET['id']] = 1;
}

// Превращаем корзину в json строку
$user->cart = json_encode($cart);

// Обноваляем пользователя в БД
R::store($user);

// Обновляем состояние корзины в сессии
$_SESSION['cart'] = $cart;

// Сообщение о добавлении товара
$_SESSION['success'][] = ['title' => 'Товар добавлен в корзину.'];

header('Location: ' . HOST . 'shop/' . $_GET['id']);