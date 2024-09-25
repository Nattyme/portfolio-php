<?php

$pageTitle = 'Выбор способа оплаты заказа';

$orderId = $_GET['id'];

// Получаем данные о заказе из БД
$order = R::load('orders', $orderId); 

// Записать данные о заказе в сессию
$_SESSION['order'] = array(
  'id' => $order['id'],
  'price' => $order['price'],
);

// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/orders/selectpayment.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";