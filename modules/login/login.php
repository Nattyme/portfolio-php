<?php

$pageTitle = "Вход на сайт";

echo "<pre>";
print_r($_POST);
echo "</pre>";

//1. Проверяем массив POST
if( isset($_POST['login']) ) {

  //2. Заполненность полей
  //Проверка на заполненность
  if( trim($_POST['email']) == "" ) {
  // Ошибка - email пуст. Добавляем массив этой ошибки в массив $errors 
    $errors[] = ['title' => 'Введите email', 'desc' => '<p>Email обязателен для регистрации на сайте</p>'];
  } else if ( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
    $errors[] = ['title' => 'Введите корректный Email'];
  }

  if( trim($_POST['password']) == "") {
    // Ошибка - пароль пуст. Добавляем массив этой ошибки в массив $errors 
    $errors[] = ['title' => 'Введите пароль'];
  }

  // Если ошибок нет
  if( empty($errors) ) {
    //3. Ищем нужного пользоваетля в базе данных
    $user = R::findOne('users', 'email = ?', array($_POST['email']));

    if ( $user ) {
      // Проверить пароль
      if( password_verify($_POST['password'], $user->password ) ) {
        // Пароль верен, вход на сайт 
        $success[] = ['title' => 'Верный пароль'];
      } else {
        // Пароль не верен
        $errors[] = ['title' => 'Неверный пароль'];
      }
    } else {
      // Email не найден
      $errors[] = ['title' => 'Неверный email'];
    }
  }
}

//4. Если нашли пользователя, то с равниваем пароль с БД
//5. Если пароль верноый - вход пользователя на сайт

//Сохраняем код ниже в буфер
ob_start();
include ROOT . 'templates/login/form-login.tpl';

//Записываем вывод из буфера в пепеменную
$content = ob_get_contents();

//Окончание буфера, очищаем вывод
ob_end_clean();

include ROOT . 'templates/page-parts/_head.tpl';
include ROOT . 'templates/login/login-page.tpl';
include ROOT . 'templates/page-parts/_foot.tpl';