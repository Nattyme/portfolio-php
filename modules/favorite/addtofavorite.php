<?php

// Ползователь выполнил вход в профиль
if ( isLoggedIn() ) {
  // Находим пользователя в БД по id
  $user = R::load('users', $_SESSION['logged_user']['id']);

  // Получаем избранное из БД
  $fav_list  = json_decode($user->fav_list , true);

  // Добавляем товар в избранное
  if(isset( $fav_list[$_GET['id']] )) {
    // Если товар уже есть в избранном - удаляем
    unset($fav_list[$_GET['id']]);

    // Превращаем избранное в json строку
    $user->fav_list = json_encode($fav_list);

    // Обноваляем пользователя в БД
    R::store($user);

    // Обновляем состояние корзины в сессии
    $_SESSION['fav_list'] = $fav_list;

  } else {

    // Формируем избранное в ассоциативный массив
    $fav_list[$_GET['id']] = 1;
  }

  // Превращаем избранное в json строку
  $user->fav_list = json_encode($fav_list);

  // Обновляем состояние избранного в сессии
  $_SESSION['fav_list'] = $fav_list;

  // Обноваляем пользователя в БД
  R::store($user);

}

// Пользователь НЕ вошел в профиль
if ( !isLoggedIn() ) {
  // 1. Проверить наличие избранных товаров пользователя
  // 2. Если избранное есть - работаем с ней, если нет - создаем 
  if (isset($_COOKIE['fav_list'])) {
    // Получаем корзину из COOKIE
    $fav_list = json_decode($_COOKIE['fav_list'], true);
  } else {
    $fav_list = array();
  }
 
  // 3. Добавляем товар в избранное
  // Добавляем товар в избранное
  if(isset( $fav_list[$_GET['id']] )) {

    // Если товар уже есть в избранном - удаляем товар из избранного
    unset($fav_list[$_GET['id']]);
  } else {

    // Формируем избранное в ассоциативный массив
    $fav_list[$_GET['id']] = 1;
  }

  // 4. Сохранение избранного в COOKIE
  setcookie('fav_list', json_encode($fav_list), time() + 60 * 60 * 24 * 30);
}

header('Location: ' . HOST . 'favorite');
exit();


