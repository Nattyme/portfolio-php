<?php
$pageTitle = "Вход на сайт";
$pageClass = "authorization-page";

//1. Проверяем массив POST
if( isset($_POST['login']) ) {
  //2. Заполненность полей. Проверка на заполненность
  if( trim($_POST['email']) == '' ) {
    // Ошибка - email пуст. Добавляем массив этой ошибки в массив $errors 
    $_SESSION['errors'][] = ['title' => 'Введите email', 'desc' => '<p>Email обязателен для регистрации на сайте</p>'];
  } else if ( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
    $_SESSION['errors'][] = ['title' => 'Введите корректный Email'];
  }

  if( trim($_POST['password']) == "") {
    // Ошибка - пароль пуст. Добавляем массив этой ошибки в массив $errors 
    $_SESSION['errors'][] = ['title' => 'Введите пароль'];
  }

  // Если ошибок нет
  if( empty($_SESSION['errors']) ) {
    //3. Ищем нужного пользоваетля в базе данных
    $user = R::findOne('users', 'email = ?', array($_POST['email']));

    if ( $user ) {
      // Проверить пароль
      if( password_verify($_POST['password'], $user->password ) ) {
        // Пароль верен, вход на сайт 
        // Автологин пользователя после регистрации
        $_SESSION['logged_user'] = $user;
        $_SESSION['login'] = 1;
        $_SESSION['role'] = $user->role;

        $_SESSION['cart'] = json_decode($_SESSION['logged_user']['cart'], true);

        if ( isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])) {
          $cartTemp = json_decode($_COOKIE['cart'], true);
          foreach ($cartTemp as $key => $value) {
            if (isset($_SESSION['cart'][$key])) {
              $_SESSION['cart'][$key] += $value;
            } else {
              $_SESSION['cart'][$key] = $value;
            }
          }
          // Очищаем корзину COOKIE
          setcookie('cart', '', time() - 3600);
        }

        $_SESSION['success'][] = ['title' => 'Вы успешно вошли на сайт. Рады снова видеть вас'];

        header('Location: ' . HOST . 'profile');
        exit();
      } else {
        // Пароль не верен
        $_SESSION['errors'][] = ['title' => 'Неверный пароль'];
      }
    } else {
      // Email не найден
      $_SESSION['errors'][] = ['title' => 'Неверный email'];
    }
  }
}

//Сохраняем код ниже в буфер
ob_start();
include ROOT . 'templates/login/form-login.tpl';
//Записываем вывод из буфера в пепеменную
$content = ob_get_contents();
//Окончание буфера, очищаем вывод
ob_end_clean();

include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/login/login-page.tpl";
include ROOT . "templates/page-parts/_foot.tpl";