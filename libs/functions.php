<?php
// Поиск названия модуля для Админки 
function getModuleNameForAdmin () {
  $uri = $_SERVER['REQUEST_URI'];
  $uriArr = explode('?', $uri); // Разбиваем запрос по сиволу '?', чтобы отсечь GET запрос
  $uri = $uriArr[0]; //  /admin/blog?id=15 => /admin/blog
  $uri = rtrim($uri, "/"); // Обрезаем сивол '/' в конце /admin/blog/ => /admin/blog
  $uri = substr($uri, 1); //Удаляем первый символ (слэш) в запросе admin/blog
  $uri = filter_var($uri, FILTER_SANITIZE_URL); // Удалем лишние сиволы из запроса

  // Еще раз разбиваем строку запроса по символу "/",  получаем массив 
  $moduleNameArr = explode('/', $uri); // admin/blog => ['admin, 'blog']
  $uriModule = $moduleNameArr[1]; // Достаем имя модуля кот нужно запустить  admin/blog => blog
  return $uriModule; // blog Какой модуль запускаем
}

// Поиск названия модуля
function getModuleName () {
  $uri = $_SERVER['REQUEST_URI'];
  $uriArr = explode('?', $uri); // Разбиваем запрос по сиволу '?', чтобы отсечь GET запрос
  $uri = $uriArr[0]; //  /admin/blog?id=15 => /admin/blog
  $uri = rtrim($uri, "/"); // Обрезаем сивол '/' в конце /admin/blog/ => /admin/blog
  $uri = substr($uri, 1); //Удаляем первый символ (слэш) в запросе admin/blog
  $uri = filter_var($uri, FILTER_SANITIZE_URL); // Удалем лишние сиволы из запроса

  // Еще раз разбиваем строку запроса по символу "/",  получаем массив 
  $moduleNameArr = explode('/', $uri); // admin/blog => ['admin, 'blog']
  $uriModule = $moduleNameArr[0]; // Достаем имя модуля кот нужно запустить  admin/blog => blog
  return $uriModule; // blog Какой модуль запускаем
}

// Аналог get запроса из URI
function getUriGet () {
  $uri = $_SERVER['REQUEST_URI'];
  $uri = rtrim($uri, "/"); // Удаляем сивол / в конце строки
  $uri = filter_var($uri, FILTER_SANITIZE_URL); // Удалем лишние сиволы из запроса
  $uri = substr($uri, 1); //Удаляем первый символ (слэш) в запросе
  $uri = explode('?', $uri);
  $uri = $uri[0];
  $uriArr = explode('/', $uri);

  if ( isset($uri[1])) {
    $uriGet = $uri[1];
    return $uriGet;
  }
  // Запись выше можно сделать короче через тернарный оператор
  // $uriGet = isset($uri[1]) ? $uri[1] : null;
}