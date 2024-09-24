<?php
// Получаем  текущую секцию и записываем в сессию
$currentSection = getCurrentSection ();
$_SESSION['currentSection'] = $currentSection;

// Получаем  текущую секцию 
$currentSection = getCurrentSection();

// Получаем строки с категориями текущей секции 
// Проблема - не получается применить ограничение по пагинации sql_limit и сортировку по убыванию
// $catsArray = R::find('categories', ' section LIKE ? ', [$currentSection]);
$catsArray = R::find('categories', ' section LIKE ? ', [$currentSection]);

// Подключаем пагинацию
// Проблема - при переходе на другую страницу текущая секция в сессии перезаписывается на page= , пагинация не работает
$pagination = pagination(5, 'categories', [' section LIKE ? ', [$currentSection]]);


// Составляем массив категории блога
foreach ($catsArray as $key => $value) {
  $cats[] = ['id' => $value['id'], 'title' => $value['title'], 'section' => $value['section']];
}  

$cats = R::find('categories', ' section LIKE ? ', [$currentSection]); 


$pageTitle = "Категории - все записи";
$pageClass = "admin-page";

ob_start();
include ROOT . "admin/templates/categories/all.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";