<?php

$pageTitle = "Регистрация";

// Если форма отправлена - делаем регистрацию
if ( isset($_POST['register']) ) {
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

  if( ! trim($_POST['password']) == "" && strlen(trim($_POST['password']) ) < 5) {
    $errors[] = ['title' => 'Неверный формат пароля', 'desc' => '<p>Пароль должен быть больше четырёх символов</p>'];
  }

  // Проверка на занятый email
  if ( R::count('users', 'email = ?', array($_POST['email'])) > 0 ) {
    $errors[] = [
      'title' => 'Пользователь с таким email уже существует', 
      'desc' => '<p>Используйте другой email адрес или воспользуйтесь <a href="'.HOST.'lost-password">восстановлением пароля.</a></p>'
    ];
  }

  //Если нет ошибок - Регистрируем пользователя
  if ( empty($errors) ) {
    $user = R::dispense('users');
    $user->email = $_POST['email'];
    $user->role = 'user';
    // Сохраняем пароль в зашифрованном виде функцией password_hash
    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $result = R::store($user);

    if ( is_int($result) ) {
      $success[] = ['title' => 'Регистрация прошла успешно', 'desc' => 'Вы можете <a href="'.HOST.'login">войти в профиль</a>'];
    } else {
      $errors[] = ['title' => 'Что-то пошло не так. Повторите действие заново.'];
    }
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