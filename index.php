<?php

require_once('config.php');
require_once('db.php');

$errors = array();
$success = array();

$uri = $_SERVER['REQUEST_URI'];
$uri = rtrim($uri, "/"); // Удаляем сивол / в конце строки
$uri = filter_var($uri, FILTER_SANITIZE_URL); // Удалем лишние сиволы из запроса
$uri = substr($uri, 1); //Удаляем первый символ (слэш) в запросе
$uri = explode('?', $uri);

// Роутер
switch ($uri[0]) {
  case '':
    require ROOT . "modules/main/index.php";
    break;

  // ::::::::::::: USERS :::::::::::::::::::
  case 'login':
    require ROOT . "modules/login/login.php";
    break;

  case 'registration':
    require ROOT . "modules/login/registration.php";
    break;

  case 'logout':
    require ROOT . "modules/login/logout.php";
    break;

  case 'lost-password':
    require ROOT . "modules/login/lost-password.php";
    break;

  case 'set-new-password':
    require ROOT . "modules/login/set-new-password.php";
    break;

  case 'profile-edit':
    require ROOT . "modules/profile/edit.php";
    break;

  // ::::::::::::: OTHER :::::::::::::::::::

  case 'about':
    require ROOT . "modules/about/index.php";
    break;

  case 'blog':
    require ROOT . "modules/blog/index.php";
    break;

  case 'contacts':
    require ROOT . "modules/contacts/index.php";
    break;

  default: 
    echo "Main or 404";
    break;
}









