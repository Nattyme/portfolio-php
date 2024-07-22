<h1>template.tpl</h1>

<?php
include ROOT . "admin/templates/_page-parts/_head.tpl";
include ROOT . "admin/templates/_parts/_header.tpl";

include ROOT . "admin/templates/_parts/_sidebar.tpl";
echo $content;

include ROOT . "admin/templates/_parts/_footer.tpl";
include ROOT . "admin/templates/_page-parts/_foot.tpl";