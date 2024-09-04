<?php
require_once ROOT . './libs/functions.php';
// Сообщения
$messagesNewCounter = R::count('messages', ' status = ?', ['new']);

// Заказы
$ordersNewCounter = R::count('orders', ' status = ?', ['new']);

// Комментарии
$commentsNewCounter = R::count('comments', ' status = ?', ['new']);

// Текущая категория
$uri = $_SERVER['REQUEST_URI'];
$uriArr = explode('?', $uri); // Разбиваем запрос по сиволу '?', чтобы получить GET запрос
$uri = $uriArr[1]; //  /admin/blog?id=15 => /admin/blog
$currentCat = $uri;
