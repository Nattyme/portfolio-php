<?php
$pageTitle = "Установить новый пароль";
$pageClass = "authorization-page";

// 1. Пришли по секретной ссыке с email
  if( !empty($_GET['email']) && !empty($_GET['code'])) {
    // 2. Найти пользователя по email в БД
    $user = R::findOne('users', 'email = ?', array($_GET['email'])); 

    if (!$user) {
      header("Location: " . HOST . "lost-password");
    } 

  } else if ( !empty($_POST['set-new-password'])) {
    // Найти пользователя по email в БД
    $user = R::findOne('users', 'email = ?', array($_POST['email'])); 
    if( $user ) {
      // Проверить секретный код на верность
      if( $user->recovery_code === $_POST['resetCode'] && $user->recovery_code != '' && $user->recovery_code != null) {

        // Смена пароля. Сохраняем пароль в зашифрованном виде функцией password_hash
        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user->recovery_code = '';
        R::store($user);
      
        $success[] = ['title' => 'Пароль был успешно изменён'];

        $newPasswordReady = true;
      } else {
        $errors[] = ['title' => 'Неверный код'];
      }
    }
  }
  
  else {
    // Если не понятно как, но попал на страницу
    header("Location: " . HOST . "lost-password");
    die();
  }
// 2. Найти пользователя по email в БД
// 3. Проверить секретный код на верность
// 4. Показать ошибку. если емаил или код не верен
// 5. Если отправлена форма с новым паролем 
// 6. Найти по емаил в БД
// 7. Проверить секретный код на верность 
// 8. Смена пароля
// 9. Сообщение об успехе пароль изменен и вход на сайт
//10. Сохраняем код ниже в буфер
//11. Если форма не была отправлена, пользователб перешел по ссылке случайно - перенаправляем на страницу lost passwordГ
ob_start();
include ROOT . 'templates/login/set-new-password.tpl';

//Записываем вывод из буфера в пепеменную
$content = ob_get_contents();

//Окончание буфера, очищаем вывод
ob_end_clean();

include ROOT . 'templates/page-parts/_head.tpl';
include ROOT . 'templates/login/login-page.tpl';
include ROOT . 'templates/page-parts/_foot.tpl';