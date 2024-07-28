<?php 
  $pageTitle = "Профиль пользователя";
  $pageClass = "profile-page";
  
  // Проверка есть ли в ссылке параметр с ID пользователя
  if ( isset($uriGet)) {
    // ID был передан. Находим пользоватея в БД. Загружаем данные пользователя из БД по его ID
    $user = R::load('users', $uriGet);
    // $sqlUserAllComments = 'SELECT
    //                       users.id, users.name, users.surname, users.avatar_small,
    //                       comments.user, comments.text, comments.timestamp
    //                       FROM `users`
    //                       LEFT JOIN `comments` ON users.id = comments.user
    //                       WHERE users.id = ?';
    // $userAllComments = R::getAll($sqlUserAllComments, [$user['id']]);
    // print_r($userAllComments);
    $comments = R::find('comments', 'user LIKE ? ', [$uriGet]); 
  
  } else {
    // Дополнительного параметра не было. Проверка вошел пользователь или нет 
    if ( isset($_SESSION['login']) && $_SESSION['login'] === 1) {
      // Пользователь залогинен и показываем его профиль
      $user = R::load('users', $_SESSION['logged_user']['id']);
      $comments = R::find('comments', 'user LIKE ? ', [$_SESSION['logged_user']['id']]); 
    } else {
      // Пользователб не залогинен, показываем приглашение к регистрации 
      $userNotLoggedIn = true;
    }
  }

  include ROOT . 'templates/page-parts/_head.tpl';
  include ROOT . 'templates/_parts/_header.tpl';
  include ROOT . 'templates/profile/profile.tpl';
  include ROOT . 'templates/_parts/_footer.tpl';
  include ROOT . 'templates/page-parts/_foot.tpl';