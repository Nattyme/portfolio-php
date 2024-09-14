<?php
$pageTitle = 'Результат оплаты заказа';
/*
Страница возврата
- Страница возврата, шаблон
- Проверка оплаты на странице возврата
- Запись в БД статуса оплаты на странице возврата
- Шаблоны для статуса оплаты на странице возврата
*/

// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/payments/yookassareturn.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";