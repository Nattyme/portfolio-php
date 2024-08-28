<?php
// Категории постов, отображающиеся в выпадающем меню "Блог"
$category_postDB = R::find('categories');

$sqlQuery = 'SELECT
                categories.id, categories.title,
                posts.cat
             FROM `categories`
             LEFT JOIN `posts` ON categories.id = posts.cat
             WHERE categories.id = ? LIMIT 1';

$category_post = array();
foreach ($category_postDB as $category) {
  $categoryCurrent = R::getRow($sqlQuery, [$category['id']]);
  if (!empty($categoryCurrent['cat'])) {
    $category_post[] = ['id' => $categoryCurrent['cat'], 'title' => $categoryCurrent['title']];
  }
}
