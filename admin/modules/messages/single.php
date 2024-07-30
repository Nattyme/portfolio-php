<?php
$message = R::load('messages', $_GET['id']); 

$pageTitle = "Сообщение";
$pageClass = "admin-page";
ob_start();
include ROOT . "admin/templates/messages/single.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";