<?php
// Находим пользователя в БД по id
$user = R::load('users', $_SESSION['logged_user']['id']);

// Получаем корзину из БД
$cart = json_decode($user->cart, true);

// Удаляем товар из корзины
unset($cart[$_GET['id']]);

// Превращаем корзину в json строку
$user->cart = json_encode($cart);

// Обноваляем пользователя в БД
R::store($user);

// Обновляем состояние корзины в сессии
$_SESSION['cart'] = $cart;

// Сообщение об удалении товара
$_SESSION['success'][] = ['title' => 'Товар был удалён из корзины.'];

header('Location: ' . HOST . 'cart');
exit();