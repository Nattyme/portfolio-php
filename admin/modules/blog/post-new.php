<h1>Admin - Blog - New Post</h1>

<?php

//central part

// head
ob_start();
include ROOT . "admin/templates/blog/post-new.tpl";
$content = ob_get_contents();
ob_end_clean();

//template 
include ROOT . "admin/templates/template.tpl";

//foot