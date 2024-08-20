<?php 
if (isset($_POST['submit'])) {
  // Проверка если поля пустые
  if  ( empty(trim($_POST['name'])) ) {
    $_SESSION['errors'][] = ['title' => 'Поле "имя" мустое. Заполните данные для отправки.'];
  } 

  if ( empty(trim($_POST['surname'])) ) {
    $_SESSION['errors'][] = ['title' => 'Поле "фамилия" мустое. Заполните данные для отправки.'];
  }

  if ( empty(trim($_POST['email'])) ) {
    $_SESSION['errors'][] = ['title' => 'Поле "email" мустое. Заполните данные для отправки.'];
  }

  if ( empty(trim($_POST['phone'])) ) {
    $_SESSION['errors'][] = ['title' => 'Поле "телефон" мустое. Заполните данные для отправки.'];
  }

  if ( empty(trim($_POST['address'])) ) {
    $_SESSION['errors'][] = ['title' => 'Поле "адрес" мустое. Заполните данные для отправки.'];
  } 

  // Если массив ошибок пуст
  if ( empty($_SESSION['errors'])) {
    $order = R::dispense('orders');
    $order->name = htmlentities(trim($_POST['name']));
    $order->surname = htmlentities(trim($_POST['surname']));
    $order->email = filter_var(htmlentities(trim($_POST['email'])), FILTER_VALIDATE_EMAIL);
    $order->phone = trim($_POST['phone']);
    $order->address = htmlentities(trim($_POST['address']));
    $order->timestamp = time();
    $order->status = 'new';
    $order->paid = false;

    $order->cart = json_encode($cart);

    if ( isLoggedIn() ) { $order->user = $_SESSION['logged_user']; }

    $order_cart = array();
    $total_price = 0;

    foreach ($cart as $key => $value) {
      $current_item = array();

      $current_item['id'] = $key;
      $current_item['amount'] = $value;

      $product = R::load('products', $key); 
      $current_item['title'] = $product['title'];
      $current_item['price'] = $product['price'];
      
      $total_price = $total_price + ( $product['price'] * $value );

      $order_cart[] = $current_item;
    }

    $order->price = $total_price;
    $order->cart = json_encode($order_cart);
    // Сохраняем заказ
    $new_order_id = R::store($order);

    // Очищаем корзину
    if ( isLoggedIn() ) {
      $_SESSION['cart'] = array();
      $_SESSION['logged_user']->cart = '';

      R::store($_SESSION['logged_user']);

    } else {
      setcookie('cart', '', time() - 3600);
    }

    header('Location: ' . HOST . 'ordercreated?id=' . $new_order_id);
    exit();

  }
}

if ( !empty($cart) ) {

  $products = R::findLike ('products', ['id' => array_keys($cart)]); 
  // R::findLike('products', ['id' => ['5', '2']])
} else {
  $products = array();
}

// Общая стоимость товаров в корзине
$cartTotalPrice = 0;
foreach ( $cart as $index => $item) {
  $cartTotalPrice = $cartTotalPrice + $products[$index]['price'] * $item;
}

$pageTitle = "Оформление нового заказа";
// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/orders/new.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";