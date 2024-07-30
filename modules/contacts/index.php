<?php 
  $contacts = R::load('contacts', 1); 
  $pageTitle = "Контакты";

  if (isset($_POST['submit'])) {
      // Проверка на email
      if ( empty(trim($_POST['email'])) ) {
        $_SESSION['errors'][] = ['title' => 'Введите email'];
      }
  
      // Проверка на текст 
      if ( empty(trim($_POST['message'])) || mb_strlen(trim($_POST['comment'])) < 10) {
        $_SESSION['errors'][] = ['title' => 'Текст сообщения слишком короткий'];
      }

      $message = R::dispense('messages');
      $message->email = htmlentities(trim($_POST['email']));
      $message->name = htmlentities(trim($_POST['name']));
      $message->text = htmlentities(trim($_POST['message']));
      $message->time = time();
      R::store($message);

      $_SESSION['success'][] = ['title' => 'Сообщение отправлено успешно'];
  }

  include ROOT . 'templates/page-parts/_head.tpl';
  include ROOT . 'templates/_parts/_header.tpl';

  include ROOT . 'templates/contacts/contacts.tpl';

  include ROOT . 'templates/_parts/_footer.tpl';
  include ROOT . 'templates/page-parts/_foot.tpl';