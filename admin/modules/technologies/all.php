<?php
//Запрос брендов в БД с сортировкой id по убыванию
$technologies = R::find('technologies', 'ORDER BY id DESC'); 

$pageTitle = "Технологии - все записи";
$pageClass = "admin-page";

ob_start();
include ROOT . "admin/templates/technologies/all.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";