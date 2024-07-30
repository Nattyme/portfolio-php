<?php
//Запрос постов в БД с сортировкой id по убыванию
$messages = R::find('messages', 'ORDER BY id DESC'); 

$pageTitle = "Сообщения - все записи";
$pageClass = "admin-page";

ob_start();
include ROOT . "admin/templates/messages/all.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";