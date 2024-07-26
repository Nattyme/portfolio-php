<?php

//Запрос постов в БД с сортировкой id по убыванию
$cats = R::find('categories', 'ORDER BY id DESC'); 

ob_start();
include ROOT . "admin/templates/categories/index.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";