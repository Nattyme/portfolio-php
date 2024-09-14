<?php
$pageTitle = 'Результат оплаты заказа';

// Импортируйте нужные классы
use YooKassa\Client;

// Создаем экземпляр объекта клиента
// Задаем идентификатор магазина и секретный ключ )
$client = new Client();
$client->setAuth(SHOP_ID, SECRET_KEY);

// Получение информации о магазине
try {
  $payment = $client->getPaymentInfo($_SESSION['payment']['yookassaid']);
} catch (\Exception $e) {
    $response = $e;
}

// Обновить информацию о платеже в БД
$paymentDB = R::load('payments', $_SESSION['payment']['id']); 
$paymentDB->status = $payment['status'];
R::store($paymentDB);


// Обновить информацию в заказе
$order = R::load('orders', $paymentDB['order_id']); 

switch($payment['status']) {
  case 'pending':
    $order->status = 'pending';
    $order->paid = false;
    break;

  case 'waiting_for_capture':
    $order->status = 'waiting';
    $order->paid = false;
    break;

  case 'succeeded':
    $order->status = 'succeeded';
    $order->paid = true;
    break;

  case 'canceled':
    $order->status = 'canceled';
    $order->paid = false;
    break;

  default:
    break;
}

R::store($order);

// Обновление страницы в ожидании платежа
if ($payment['status'] === 'pending' || $payment['status'] === 'waiting_for_capture') {
  header('Refresh: 5');
}

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