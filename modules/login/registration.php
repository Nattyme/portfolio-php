<?php

$pageTitle = "Регистрация";

// Если форма отправлена - делаем регистрацию
if ( isset($_POST['register']) ) {
  //Проверка на заполненность
  if( $_POST['email'] == "") {
    // Ошибка - email пуст. Добавляем массив этой ошибки в массив $errors 
    $errors[] = ['title' => 'Введите email', 'desc' => '<p>Email обязателен для регистрации на сайте</p>'];
  }

  if( $_POST['password'] == "") {
    // Ошибка - пароль пуст. Добавляем массив этой ошибки в массив $errors 
    $errors[] = ['title' => 'Введите пароль'];
  }

  if( ! $_POST['password'] == "" && strlen($_POST['password']) <= 4) {
    $errors[] = ['title' => 'Введите корректный пароль', 'desc' => '<p>Длина пароля должна быть более 4-ёх символов</p>'];
  }
}

//Сохраняем код ниже в буфер
ob_start();
include ROOT . 'templates/login/form-registration.tpl';

//Записываем вывод из буфера в пепеменную
$content = ob_get_contents();

//Окончание буфера, очищаем вывод
ob_end_clean();

include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/login/login-page.tpl";
include ROOT . "templates/page-parts/_foot.tpl";