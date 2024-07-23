<?php 
$pageTitle = "Блог - все посты";

$posts = R::find('posts', 'ORDER BY id DESC'); 

ob_start();
include ROOT . "admin/templates/blog/index.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";

include ROOT . "templates/blog/index.tpl";

include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";