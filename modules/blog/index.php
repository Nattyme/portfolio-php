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
  //Показываем все страницы блога
  $posts = R::find('posts', 'ORDER BY id DESC');

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