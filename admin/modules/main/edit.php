<?php
$settingsMain = R::find('settings', ' section LIKE ? ', ['main']); // Получаем массив с нужными настройками

$main = []; // Создаем массив кот. наполним

foreach ($settingsMain as $key => $value) {
  $main[$value['name']] = $value['value'];
}

$pageTitle = "Главная - редактирвание";
$pageClass = "admin-page";
//Шаблон страницы
ob_start();
include ROOT . "admin/templates/main/edit.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";
