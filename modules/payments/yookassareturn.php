<?php
$pageTitle = 'Результат оплаты заказа';

// Yookassa ID платежа
$paymentId = $_SESSION['payment']['yookassaid'];

// Импортируйте нужные классы
use YooKassa\Client;

// Создаем экземпляр объекта клиента
// Задаем идентификатор магазина и секретный ключ )
$client = new Client();
$client->setAuth(SHOP_ID, SECRET_KEY);

// Получение информации о магазине
try {
  $payment = $client->getPaymentInfo($paymentId);
} catch (\Exception $e) {
    $response = $e;
}

// Обновить информацию о платеже в БД
$paymentDB = R::load('payments', $_SESSION['payment']['id']); 
$paymentDB->status = $payment['status'];
R::store($paymentDB);

/*
Страница возврата
+ Страница возврата, шаблон
+ Проверка оплаты на странице возврата
+ Запись статуса оплаты в БД 
- Шаблоны для статуса оплаты на странице возврата
*/

// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/payments/yookassareturn.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";