<?php

// Импортируйте нужные классы
use YooKassa\Client;

// Создаем экземпляр объекта клиента
// Задаем идентификатор магазина и секретный ключ )
$client = new Client();
$client->setAuth(SHOP_ID, SECRET_KEY);

// Получение информации о магазине
try {
  $payment = $client->createPayment(
    array(
        'amount' => array(
            'value' => $_SESSION['order']['price'],
            'currency' => 'RUB',
        ),
        'confirmation' => array(
            'type' => 'redirect',
            'return_url' => HOST . 'shop',
        ),
        'capture' => true,
        'description' => 'Заказ №' . $_SESSION['order']['id'],
    ),
    uniqid('', true)
  );

  // Получаем confirmation url
  $confirmationUrl = $payment->getConfirmation()->getConfirmationUrl();
} catch (\Exception $e) {
    $response = $e;
}

// var_dump($payment);
// Перенаправляем пользователя на форму оплаты
header('Location: ' .  $confirmationUrl);
exit();