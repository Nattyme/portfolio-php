<?php 
  $settingsMain = R::find('settings', ' section LIKE ? ', ['main']); 

  $main = [];
  foreach ($settingsMain as $key => $value) {
    $main[$value['name']] = $value['value'];
  }
  $pageTitle = "Главная страница";
  $pageClass = "main-page";

  include ROOT . "templates/page-parts/_head.tpl";
  include ROOT . "templates/_parts/_header.tpl";
  include ROOT . "templates/main/main.tpl";
  include ROOT . "templates/_parts/_footer.tpl";
  include ROOT . "templates/page-parts/_foot.tpl";