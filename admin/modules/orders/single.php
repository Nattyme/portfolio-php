<?php

// Получаем заказ
$order = R::load('orders', $_GET['id']); 

// Получаем массив продуктов из JSON формата
$products = json_decode($order['cart'], true);

// Создаем массив из id всех товаров корзины
foreach ($products as $product) { $ids[] = $product['id'];}
print_r($ids);

// Получаем продукты с id из массива $ids из БД 
$productsDB = R::findLike('products', ['id' => $ids]);

$pageTitle = "Заказ N{$order['id']}";
$pageClass = "admin-page";
// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/orders/single.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";