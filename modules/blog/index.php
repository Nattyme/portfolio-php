<?php 
$pageTitle = "Блог - все записи";

if (isset($uriGet)) {
  // Показываем отдельную страницу блога
  $post = R::load('posts', $uriGet); 
  ob_start();
  include ROOT . "templates/blog/single-post.tpl";
  $content = ob_get_contents();
  ob_end_clean();
} else {
  // Кол-во постов на странице
  $results_per_page = 3;

  // Определяем текущий номер запрашиваемой страницы 
  if ( !isset($_GET['page'])) {
    $page_number = 1;
  } else {
    $page_number = $_GET['page']; // 2ая стр. пагинации
  }

  // Определяем с какого поста начать вывод
  $starting_limit_number = ($page_number-1) * $results_per_page; // (2-1) * 6 = 6;

  // Считаем кол-во страниц пагинации
  $number_of_results = R::count('posts'); // Вернет кол-во постов
  $number_of_pages = ceil($number_of_results / $results_per_page); // ceil округляет число в бол. сторону

  // Делаем запрос в БД для получения постов
  $posts = R::find('posts', "ORDER BY id DESC LIMIT {$starting_limit_number}, {$results_per_page}");

  ob_start();
  include ROOT . "templates/blog/all-posts.tpl";
  $content = ob_get_contents();
  ob_end_clean();
} 


include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";

include ROOT . "templates/blog/index.tpl";

include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";