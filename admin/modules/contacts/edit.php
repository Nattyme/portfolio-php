<?php
$contacts = R::load('contacts', 1);

if( isset($_POST['submit'])) {
  // Проверка на заполненность названия
  if( trim($_POST['contacts_title']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Введите заголовок контактов'];
  } 

  // Проверка на заполненность содержимого
  if( trim($_POST['contacts_text']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Заполните содержимое контактов'];
  } 

  // Если нет ошибок
  if ( empty($_SESSION['errors'])) {
    $contacts->about_title = $_POST['about_title'];
    $contacts->about_text = $_POST['about_text'];

    $contacts->services_title = $_POST['services_title'];
    $contacts->services_text = $_POST['services_text'];

    $contacts->contacts_title = $_POST['contacts_title'];
    $contacts->contacts_text = $_POST['contacts_text'];

    R::store($contacts);

    if ( empty($_SESSION['errors'])) {
      $_SESSION['success'][] = ['title' => 'Контакты успешно обновлен.'];
    }
  }
}

$pageTitle = "Контакты - редактирвание";
$pageClass = "admin-page";
// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/contacts/edit.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";
