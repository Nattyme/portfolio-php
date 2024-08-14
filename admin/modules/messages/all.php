<?php
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id']) ) {
   // Проверка запроса на удаление
  // admin/messages?action=delete&id=7
  $message = R::load('messages', $_GET['id']);
  
  // Удаление файла
  if ( !empty($message['file_name_src']) ) {

    // Удадить файлы с сервера
    $fileFolderLocation = ROOT . 'usercontent/contact-form/';
    unlink($fileFolderLocation . $message->file_name_src);
    
    $_SESSION['success'][] = ['title' => 'Сообщение было успешно удалено.'];
  }

  R::trash($message);
}

// Запрос постов в БД с сортировкой id по убыванию
$messages = R::find('messages', 'ORDER BY id DESC'); 

$pageTitle = "Сообщения - все записи";
$pageClass = "admin-page";

// Шаблон страницы
ob_start();
include ROOT . "admin/templates/messages/all.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";