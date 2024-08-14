<?php
// Находим пользователя в БД по id
$user = R::load('users', $_SESSION['logged_user']['id']);

// Формируем корзину в ассоциативный массив
$cart = [$_GET['id'] => 1];

// Превращаем корзину в json строку
$user->cart = json_encode($cart);

// Обноваляем пользователя в БД
R::store($user);
header('Location: ' . HOST . 'shop/' . $_GET['id']);