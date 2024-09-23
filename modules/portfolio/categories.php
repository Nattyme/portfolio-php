<?php 
$category = R::load('categories', $uriGetParam);

if ($category) {
  $pageTitle = "Категория: {$category['title']}";

  $pagination = pagination(6, 'portfolio', ['cat = ? ', [$uriGetParam]]);

  $projectsDB = R::findLike('portfolio', ['cat' => [$uriGetParam]], 'ORDER BY id DESC ' . $pagination['sql_page_limit']); 

  $projects = array();
  foreach ( $projectsDB as $current_project) {
    // Получаем строки с категориями портфолио
    $categories = R::find('categories', ' section LIKE ? ', ['portfolio']);
    
    //Запрос технологий в БД с сортировкой id по убыванию
    $technologies = R::find('technologies', 'ORDER BY id DESC'); 

    $project['id'] = $current_project->id;
    $project['title'] = $current_project->title;

    $project['technology'] = json_decode($current_project->technology, true);

    if (count($project['technology']) > 3) {
     shuffle($project['technology']);
     $project['technology'] = array_slice($project['technology'], 1, 3);
    }

    $project['cat'] = $current_project->cat;
    $project['cat_id'] = $current_project->cat;
    $project['cover_small'] = $current_project->cover_small;
   
    if ($current_project['cat'] === $categories[$current_project['cat']]['id']) {
      $current_project['cat'] = $categories[$current_project['cat']]['title'];
    }

    // if ($current_product['brand'] === $brands[$current_product['brand']]['id']) {
    //   $current_product['brand'] = $brands[$current_product['brand']]['title'];
    // }
    $project['cat'] = $current_project['cat'];
    // $project['brand_title'] = $current_product['brand'];
    $projects [] = $project;
  }
} else {
  header('Location: ' . HOST . 'portfolio');
  exit();
}

// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/portfolio/all.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";