<?php 
require_once ROOT . "./libs/functions.php";
$pagination = pagination($settings['card_on_page_portfolio'], 'portfolio');

$projectsDB = R::find('portfolio', 'ORDER BY id DESC ' . $pagination['sql_page_limit']);

$projects = array();
foreach ($projectsDB as $current_project) {
    // Получаем  текущую секцию для записи в БД
    $currentSection = $uriModule;

    // Узнаем категорию по GET запросу
    $categories = R::find('categories', ' section LIKE ? ', [$currentSection]);
    
    //Запрос технологий в БД с сортировкой id по убыванию
    $technologies = R::find('technologies', 'ORDER BY id DESC'); 
    
    // Заполняем массив project даными о нужном продукте
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
    // $project['price'] =$current_project->price
    // print_r($project['technology']);
    // die();
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
    // print_r($project);
    // die();
    $projects [] = $project;
}

$pageTitle = "Портфолио - все записи";
// Подключение шаблонов страницы
include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";

include ROOT . "templates/portfolio/all.tpl";

include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";