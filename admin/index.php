<?php
require_once('./../config.php');
require_once('./../db.php');
require_once ROOT . 'libs/resize-and-crop.php';

$_SESSION['errors'] = array();
$_SESSION['success'] = array();

session_start();

$uri = $_SERVER['REQUEST_URI'];
$uri = rtrim($uri, "/"); // Удаляем сивол / в конце строки
$uri = filter_var($uri, FILTER_SANITIZE_URL); // Удалем лишние сиволы из запроса
$uri = substr($uri, 1); //Удаляем первый символ (слэш) в запросе
$uri = explode('?', $uri);

if ( isset($uri[1])) {
  $uriGet = $uri[1];
}
// Запись выше можно сделать короче через тернарный оператор
// $uriGet = isset($uri[1]) ? $uri[1] : null;

$uriArray = explode('/', $uri[0]);
$uriModule = $uriArray[0];

// Роутер
switch ($uriModule) {

  case 'blog':
    require ROOT . "admin/modules/blog/index.php";
    break;

  case 'post-new':
    require ROOT . "admin/modules/post-new/index.php";
    break;

  case 'post-edit':
    require ROOT . "admin/modules/post-edit/index.php";
    break;

  case 'post-delete':
    require ROOT . "admin/modules/post-delete/index.php";
    break;
  
  // ::::::::::::: OTHER :::::::::::::::::::
  default: 
    echo "Main or 404";
    break;
}









