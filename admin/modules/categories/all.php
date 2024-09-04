<?php
// Получаем  текущую секцию для записи в БД
$currentSection = getCurrentSection ();

// Узнаем категорию по GET запросу
$catsArray = R::find('categories', ' section LIKE ? ', [$currentSection]);

// Составляем массив категории блога
foreach ($catsArray as $key => $value) {
  $cats[] = ['id' => $value['id'], 'title' => $value['title']];
}  

$cats = R::find('categories', ' section LIKE ? ', [$currentSection]); 

$pageTitle = "Категории - все записи";

ob_start();
include ROOT . "admin/templates/categories/all.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";