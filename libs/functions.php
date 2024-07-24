<?php
// Поиск названия модуля для Админки 
function getModuleNameForAdmin() {
  $uri = $_SERVER['REQUEST_URI'];
  $uriArr = explode('?', $uri); // Разбиваем запрос по сиволу '?', чтобы отсечь GET запрос
  $uri = $uriArr[0]; //  /admin/blog?id=15 => /admin/blog
  $uri = rtrim($uri, "/"); // Обрезаем сивол '/' в конце /admin/blog/ => /admin/blog
  $uri = substr($uri, 1); //Удаляем первый символ (слэш) в запросе admin/blog
  $uri = filter_var($uri, FILTER_SANITIZE_URL); // Удалем лишние сиволы из запроса

  // Еще раз разбиваем строку запроса по символу "/",  получаем массив 
  // admin/blog => ['admin, 'blog']
  $moduleNameArr = explode('/', $uri);
  $uriModule = isset($moduleNameArr[1]) ? $moduleNameArr[1] : null; // Достаем имя модуля кот нужно запустить  admin/blog => blog
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
  $uriGet = isset($uriArr[1]) ? $uriArr[1] : null;
  return $uriGet;
  // Запись выше можно сделать короче через тернарный оператор
  // $uriGet = isset($uri[1]) ? $uri[1] : null;
}

function rus_date () {
  // Перевод
  $translate = array(
		"am" => "дп",
		"pm" => "пп",
		"AM" => "ДП",
		"PM" => "ПП",
		"Monday" => "Понедельник",
		"Mon" => "Пн",
		"Tuesday" => "Вторник",
		"Tue" => "Вт",
		"Wednesday" => "Среда",
		"Wed" => "Ср",
		"Thursday" => "Четверг",
		"Thu" => "Чт",
		"Friday" => "Пятница",
		"Fri" => "Пт",
		"Saturday" => "Суббота",
		"Sat" => "Сб",
		"Sunday" => "Воскресенье",
		"Sun" => "Вс",
		"January" => "Января",
		"Jan" => "Янв",
		"February" => "Февраля",
		"Feb" => "Фев",
		"March" => "Марта",
		"Mar" => "Мар",
		"April" => "Апреля",
		"Apr" => "Апр",
		"May" => "Мая",
		"May" => "Мая",
		"June" => "Июня",
		"Jun" => "Июн",
		"July" => "Июля",
		"Jul" => "Июл",
		"August" => "Августа",
		"Aug" => "Авг",
		"September" => "Сентября",
		"Sep" => "Сен",
		"October" => "Октября",
		"Oct" => "Окт",
		"November" => "Ноября",
		"Nov" => "Ноя",
		"December" => "Декабря",
		"Dec" => "Дек",
		"st" => "ое",
		"nd" => "ое",
		"rd" => "е",
		"th" => "ое"
  );
  // если передали дату, то переводим её
  if ( func_num_args() > 1 ) {
      return strtr(date(func_get_arg(0), func_get_arg(1)), $translate);
  } 
  // Иначе генерируем текущее время по шаблону
  else {
      return strtr(date(func_get_arg(0)), $translate);
  }
}

