<?php
//Запрос постов в БД с сортировкой id по убыванию
$users = R::find('users', 'ORDER BY id DESC'); 
$pageTitle = "Пользователи - все записи";
$pageClass = "admin-page";

ob_start();
include ROOT . "admin/templates/users/all.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";