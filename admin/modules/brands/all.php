<?php
// Получаем  текущую секцию 
$currentSection = getCurrentSection ();
$_SESSION['currentSection'] = $currentSection;

//Запрос брендов в БД с сортировкой id по убыванию
$brands = R::find('brands', 'ORDER BY id DESC'); 

$pageTitle = "Бренды - все записи";
$pageClass = "admin-page";

ob_start();
include ROOT . "admin/templates/brands/all.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";