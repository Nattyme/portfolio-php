<?php 
  $settingsMain = R::find('settings', ' section LIKE ? ', ['main']); 

  $main = [];
  foreach ($settingsMain as $key => $value) {
    $main[$value['name']] = $value['value'];
  }

  // Делаем запрос в БД для получения постов
  $posts = R::find('posts', "ORDER BY timestamp DESC LIMIT 0, 3");
  // Делаем запрос в БД для получения проектов
  $projects = R::find('portfolio', "ORDER BY timestamp DESC LIMIT 0, 4");

  $pageTitle = "Главная страница";
  $pageClass = "main-page";

  include ROOT . "templates/page-parts/_head.tpl";
  include ROOT . "templates/_parts/_header.tpl";
  include ROOT . "templates/main/main.tpl";
  include ROOT . "templates/_parts/_footer.tpl";
  include ROOT . "templates/page-parts/_foot.tpl";