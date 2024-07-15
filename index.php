<?php

require_once('config.php');

echo "<h1>Index.php</h1>";

$uri = $_SERVER['REQUEST_URI'];
$uri = rtrim($uri, "/"); // Удаляем сивол / в конце строки
$uri = filter_var($uri, FILTER_SANITIZE_URL); // Удалем лишние сиволы из запроса
$uri = substr($uri, 1); //Удаляем первый символ (слэш) в запросе
$uri = explode('?', $uri);

switch ($uri[0]) {
  case '':
    require ROOT . "modules/main/index.php";
    break;

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









