<?php
$user = R::load('users', $_GET['id']); 

if( isset($_POST['postDelete']) ) {
  // Удаление обложки
  if ( !empty($user['avatar']) ) {
    // Удадить файлы обложки с сервера
    $avatarFolderLocation = ROOT . 'usercontent/avatars/';
    unlink($avatarFolderLocation . $user->avatar);
    unlink($avatarFolderLocation . $user->avatarSmall);
  }

  // Удаляем пользователя
  R::trash($user);
  
  $_SESSION['success'][] = ['title' => 'Пользователь был успешно удалён.'];
  header('Location: ' . HOST . 'admin/users');
  exit();
}

$pageTitle = "Блог - удалить пользователя";
$pageClass = "admin-page";
// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/users/delete.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";
