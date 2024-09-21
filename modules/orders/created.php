<?php 
$pageTitle = "Заказ оформлен!";
$new_order_id = $_GET['id'];

// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/orders/created.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";