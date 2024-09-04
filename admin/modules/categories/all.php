<?php
//Запрос брендов в БД с сортировкой id по убыванию
<<<<<<< HEAD
$catsArray = R::find('categories', ' section LIKE ? ', ['blog']);

$cats = [];
foreach ($catsArray as $key => $value) {
  $cats[] = ['id' => $value['id'], 'title' => $value['title']];
}

=======
$cats = R::find('categories', 'ORDER BY id DESC'); 
>>>>>>> 4a02176d853c5b005c94930e85052a5dd998d251

$pageTitle = "Категории - все записи";

ob_start();
include ROOT . "admin/templates/categories/all.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";