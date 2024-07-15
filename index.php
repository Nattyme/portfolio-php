<?php

require_once('config.php');

echo "<h1>Index.php</h1>";

$uri = $_SERVER['REQUEST_URI'];
$uri = rtrim($uri, "/"); // Удаляем сивол / в конце строки
$uri = filter_var($uri, FILTER_SANITIZE_URL); // Удалем лишние сиволы из запроса
$uri = substr($uri, 1); //Удаляем первый символ (слэш) в запросе
$uri = explode('?', $uri);
print_r($uri);

switch ($uri[0]) {
  case '':
    echo "Main page";
    break;

  case 'about':
    echo "About me";
    break;

  case 'blog':
    echo "Blog";
    break;

  case 'contacts':
    echo "Contact page";
    break;

  default: 
    echo "Main or 404";
    break;
}









