<?php 

  $pageTitle = "Профиль пользователя";
  $pageClass = "profile-page";

  // Проверка есть ли в ссылке параметр с ID пользователя
  if ( isset($uriArray[1])) {
    // ID был передан. Находим пользоватея в БД

    // Загружаем данные пользователя из БД по его ID
    $user = R::load('users', $uriArray[1]);

  } else {
    // Дополнительного параметра не было
    //Проверка вошел пользователь или нет 
    if ( isset($_SESSION['login']) && $_SESSION['login'] === 1) {
      // Пользователб залогинен и показываем его профиль
      $user = R::load('users', $_SESSION['logged_user']['id']);
      
    } else {
      // Пользователб не залогинен, показываем приглашение к регистрации 
      $userNotLoggedIn = true;
    }
  }

  include ROOT . 'templates/page-parts/_head.tpl';
  include ROOT . "templates/_parts/_header.tpl";
  include ROOT . "templates/profile/profile.tpl";
  include ROOT . "templates/_parts/_footer.tpl";
  include ROOT . 'templates/page-parts/_foot.tpl';