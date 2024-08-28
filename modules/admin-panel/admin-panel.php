<?php
// Сообщения
$messagesNewCounter = R::count('messages', ' status = ? ', ['new']);
$messagesDisplayLimit = 99; 

// Заказы
$ordersNewCounter = R::count('orders', ' status = ?', ['new']);
$ordersDisplayLimit = 99; 

// Комментарии
$commentsNewCounter = R::count('comments', ' status = ?', ['new']);
$commentsDisplayLimit = 99; 

