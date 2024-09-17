<?php 
require_once ROOT . "./libs/functions.php";
$pagination = pagination($settings['card_on_page_portfolio'], 'portfolio');
// $projects = R::find('portfolio', "ORDER BY id DESC {$pagination['sql_page_limit']}");

$projectsDB = R::find('portfolio', 'ORDER BY id DESC ' . $pagination['sql_page_limit']);

$projects = array();
foreach ($projectsDB as $current_project) {
    // Получаем  текущую секцию для записи в БД
    $currentSection = $uriModule;

    // Узнаем категорию по GET запросу
    $categories = R::find('categories', ' section LIKE ? ', [$currentSection]);
    
    // $brands = R::find('brands');
    
    // Заполняем массив project даными о нужном продукте
    $project['id'] = $current_project->id;
    $project['title'] = $current_project->title;
    // $project['brand'] = $current_project->brand;
    $project['cat'] = $current_project->cat;
    $project['tools'] = $current_project->tools;
    $project['cover_small'] = $current_project->cover_small;
    // $project['price'] =$current_project->price;

    // Получаем название категории текущего продука по ID категории
    if (isset($current_project['cat']) && !empty($current_project['cat']) && $current_project['cat'] === $categories[$current_project['cat']]['id']) {
      $current_project['cat'] = $categories[$current_project['cat']]['title'];
    }

    // Получчаем название бренда текущего продука по ID бренда
    // if (  isset($current_product['brand']) 
    //       && !empty($current_product['brand']) && $current_product['brand'] === $brands[$current_product['brand']]['id']) {
    //   $current_product['brand'] = $brands[$current_product['brand']]['title'];
    // }
    $project['cat'] = $current_project['cat'];
    // $product['brand_title'] = $current_product['brand'];
    $projects [] = $project;
}


$pageTitle = "Портфолио - все записи";
// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";

include ROOT . "templates/portfolio/all.tpl";

include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";