<?php

$orders = R::find('orders', "ORDER BY id DESC"); 

$pageTitle = "Заказы - все записи";
$pageClass = "admin-page";
// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/orders/all.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";