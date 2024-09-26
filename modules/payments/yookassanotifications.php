<?php
echo 'hey';

try {
  $source = file_get_contents('php://input');
  $data = json_decode($source, true);

   // Создание объекта для обработки полученной информации
   $factory = new \YooKassa\Model\Notification\NotificationFactory();
   $notificationObject = $factory->factory($data);
   $responseObject = $notificationObject->getObject();

  // Записываем полученные данные в файл для отладки
  $file = "yookassanotify.txt";
  $res = date(' [Y-n-d H:i:s] ') . PHP_EOL;

  // $res .=  $data['object']['id'] . PHP_EOL;
  // $res .=  $data['object']['status'] . PHP_EOL;
  // $res .=  '-----------------' . PHP_EOL;
  // $res .=  $responseObject->getId() . PHP_EOL;
  // $res .=  $responseObject->getStatus() . PHP_EOL;


  $res .= $source . PHP_EOL . PHP_EOL;
  $res .= "\r\n \r\n";
  file_put_contents($file, $res, FILE_APPEND | LOCK_EX);

  
  // Проверка подлинности ответа по списку доыеренных IP адресов
  $client = new \YooKassa\Client();

  if (!$client->isNotificationIPTrusted($_SERVER['REMOTE_ADDR'])) {
      header('HTTP/1.1 400 Something went wrong');
      exit();
  }

  // Загрузка данных из БД по платежу и заказу
  $id =  $responseObject->getId();
  $status = $responseObject->getStatus();

  $payment = R::findOne('payments', ' payment = ?', [$id]);
  $order = R::load('orders', $payment['order_id']);

  // Обновление статуса Платежа
  $payment->status = $status;

  if ($notificationObject->getEvent() === \YooKassa\Model\Notification\NotificationEventType::PAYMENT_SUCCEEDED) {

      $order->status = 'paid';
      $order->paid = true;
  } elseif ($notificationObject->getEvent() === \YooKassa\Model\Notification\NotificationEventType::PAYMENT_WAITING_FOR_CAPTURE) {
      $order->status = 'waiting';
      $order->paid = false;
  } elseif ($notificationObject->getEvent() === \YooKassa\Model\Notification\NotificationEventType::PAYMENT_CANCELED) {
      $order->status = 'canceled';
      $order->paid = false;
  } elseif ($notificationObject->getEvent() === \YooKassa\Model\Notification\NotificationEventType::REFUND_SUCCEEDED) {
      $order->status = 'refund succeeded';
      $order->paid = false;
  } else {
      header('HTTP/1.1 400 Something went wrong');
      exit();
  }

  // Сохранение обновленного Платежа и Заказа
  R::store($payment);
  R::store($order);
  
} catch (Exception $e) {
  header('HTTP/1.1 400 Something went wrong');
  exit();
}