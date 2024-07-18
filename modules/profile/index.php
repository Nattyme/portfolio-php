<?php 
  $pageTitle = "Профиль пользователя";

  // Загружаем данные пользователя из БД по его ID
  $user = R::load('users', $uriArray[1]);

  include ROOT . 'templates/page-parts/_head.tpl';
  include ROOT . "templates/_parts/_header.tpl";

  include ROOT . "templates/profile/profile.tpl";

  include ROOT . "templates/_parts/_footer.tpl";
  include ROOT . 'templates/page-parts/_foot.tpl';