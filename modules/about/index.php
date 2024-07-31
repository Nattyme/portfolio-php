<?php 
$settingsAbout = R::find('settings', ' section LIKE ? ', ['about']); 

$about[];
foreach ($settingsAbout as $key => $value) {
  $about[$value['name']] = $value['value'];
}

$page_name = "О сайте";
$page_text = "Текст главной страницы";

$pageTitle = "Обо мне";
// Шаблон страницы
include ROOT . 'templates/page-parts/_head.tpl';
include ROOT . 'templates/_parts/_header.tpl';

include ROOT . 'templates/about/about.tpl';

include ROOT . 'templates/_parts/_footer.tpl';
include ROOT . 'templates/page-parts/_foot.tpl';
    