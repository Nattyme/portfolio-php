<?php
require_once ROOT . './libs/functions.php';
// Сообщения
$messagesNewCounter = R::count('messages', ' status = ?', ['new']);

// Заказы
$ordersNewCounter = R::count('orders', ' status = ?', ['new']);

// Комментарии
$commentsNewCounter = R::count('comments', ' status = ?', ['new']);


