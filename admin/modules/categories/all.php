<?php
//Запрос брендов в БД с сортировкой id по убыванию
$catsArray = R::find('categories', ' section LIKE ? ', ['blog']);

$cats = [];
foreach ($catsArray as $key => $value) {
  $cats[] = ['id' => $value['id'], 'title' => $value['title']];
}

$cats = R::find('categories', 'ORDER BY id DESC'); 


$pageTitle = "Категории - все записи";

ob_start();
include ROOT . "admin/templates/categories/all.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";