<?php

$pageTitle = "Восстановить пароль";

echo "<pre>";
print_r($_POST);
echo "</pre>";

// 1. Проверить, что форма отправлена. Принять данные
if ( isset($_POST['lost-password']) ) {
  // 2. Проверка на заполненный email
  if( trim($_POST['email']) == '') {
    $errors[] = ['title' => 'Введите email', 'desc' => '<p>Email обязателен для регистрации на сайте</p>'];
  } else if ( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
    $errors[] = ['title' => 'Введите корректный Email'];
  }

  if ( empty($errors)) {
    // 3. Проверить есть ли пользователь с такиv email в БД
    $user = R::findOne('users', 'email = ?', array($_POST['email']));

    if ( $user ) {
      // Генерируем секретный код
      function random_str($num = 30) {
        return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $num);
      }

      $recovery_code = random_str();
      echo $recovery_code;

    } else {
      // Email не найден
      $errors[] = ['title' => 'Пользователя с таким email не существует'];
    }

  }

}


// 4. Сгенерировать секретный код для сброса пароля

// 5. Запомнить секретный код. Записать в БД.
// Ограничим кол-во возможностей для восстановления пароля

//6. Присылаем пользователь спец ссылку с секреткным кодом 
//для установки нового пароля


//Сохраняем код ниже в буфер
ob_start();
include ROOT . 'templates/login/lost-password.tpl';

//Записываем вывод из буфера в пепеменную
$content = ob_get_contents();

//Окончание буфера, очищаем вывод
ob_end_clean();

include ROOT . 'templates/page-parts/_head.tpl';
include ROOT . 'templates/login/login-page.tpl';
include ROOT . 'templates/page-parts/_foot.tpl';