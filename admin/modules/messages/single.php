<?php
// Получаем сообщение
$message = R::load('messages', $_GET['id']); 

if ($message['status'] === 'new') {
  $message->status = NULL;
  R::store($message);
  $messagesNewCounter = R::count('messages', ' status = ?', ['new']);
}

if( isset($_POST['block-user'])) {
  $userBlocked = R::dispense('blockedusers');
  $userBlocked->email = $message['email'];

  $userBlocked->user_id = !empty($message['user_id']) ? $message['user_id'] : NULL;
  
  // Сохраняем пользователя в блок лист
  R::store($userBlocked);

   // Удаляем пользователя из таблицы users
   if (!empty($message['user_id'])) {
    R::trash($userBlocked['user_id']);
  }

  // Находим сообщения пользователя в таблице сообщений
  if (!empty($message['user_id'])) {
    $messagesToDelete = R::find('messages', ' user_id LIKE ?', [$userBlocked['user_id']]);
  } else {
    $messagesToDelete = R::find('messages', ' email LIKE ?', [$userBlocked['email']]);
  }

  // Обходим массив сообщений и удаляем 
  foreach ($messagesToDelete as $message) {
    R::trash($message);
  }
  
  $_SESSION['success'][] = ['title' => 'Пользователь заблокирован. Все его сообщения успешно удалены. '];
  header('Location: ' . HOST . 'admin/messages');
  exit();
}

$pageTitle = "Сообщение";
$pageClass = "admin-page";
ob_start();
include ROOT . "admin/templates/messages/single.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";