<?php 
  $pageTitle = "Профиль пользователя";
  $pageClass = "profile-page";
  
  function getUserComments($userId) {
    $sqlQuery = 'SELECT
                        comments.id, comments.text, comments.post, comments.user, comments.timestamp,
                        posts.title
                 FROM `comments`
                 LEFT JOIN `posts` ON comments.post = posts.id
                 WHERE comments.user = ?';
    return R::getAll($sqlQuery, [$userId]);
  }
  // Проверка есть ли в ссылке параметр с ID пользователя
  if ( isset($uriGet)) {
    // ID был передан. Находим пользоватея в БД. Загружаем данные пользователя из БД по его ID
    $user = R::load('users', $uriGet);
    // Загружаем комментарии пользователя
    $comments = getUserComments($uriGet);
  
  } else {
    // Дополнительного параметра не было. Проверка вошел пользователь или нет 
    if ( isset($_SESSION['login']) && $_SESSION['login'] === 1) {
      // Пользователь залогинен и показываем его профиль
      $user = R::load('users', $_SESSION['logged_user']['id']);
      // Загружаем комментарии пользователя
      $comments = getUserComments($_SESSION['logged_user']['id']);
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