<?php 
$pageTitle = "Блог - все записи";

if (isset($uriGet)) {

  // Если зарпос постов из определенной категории
  if ($uriGet === 'cat') {
    if (!empty($uriGetParam)) {
      $pagination = pagination(6, 'posts');
      $pagination (6, 'posts', [' cat = ? ', [4] ]);

      // $posts = R::find('posts', 'cat = ' . $uriGetParam); 
      $posts = R::findLike('posts', ['cat' => [$uriGetParam]], 'ORDER BY id DESC ' . $pagination['sql_page_limit']); 
    
      ob_start();
      include ROOT . "templates/blog/all-posts.tpl";
      $content = ob_get_contents();
      ob_end_clean();
    }
    
  } else {
    //Одиночный пост
    // Показываем отдельную страницу блога
    $sqlQuery = 'SELECT
                  posts.id, posts.title, posts.content, posts.cover, posts.timestamp, posts.edit_time, posts.cat,
                  categories.cat_title
                FROM `posts`
                LEFT JOIN `categories` ON posts.cat = categories.id
                WHERE posts.id = ' . $uriGet . ' LIMIT 1';

    $post = R::getrow($sqlQuery);

    ob_start();
    include ROOT . "templates/blog/single-post.tpl";
    $content = ob_get_contents();
    ob_end_clean();
  }
 
} else {
  $pagination = pagination(6, 'posts');
 
  // Делаем запрос в БД для получения постов
  $posts = R::find('posts', "ORDER BY id DESC {$pagination['sql_page_limit']}");

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