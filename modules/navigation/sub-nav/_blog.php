<?php
// Категории постов, отображающиеся в выпадающем меню "Блог"
$category_postDB = R::find('categories');

$sqlQuery = 'SELECT
                c.id, c.title,
                p.cat
             FROM `categories` AS c
             LEFT JOIN `posts` AS p ON c.id = p.cat
             WHERE c.id = ? LIMIT 1';

$category_post = array();
foreach ($category_postDB as $category) {
  $categoryCurrent = R::getRow($sqlQuery, [$category['id']]);
  if (!empty($categoryCurrent['cat'])) {
    $category_post[] = ['id' => $categoryCurrent['cat'], 'title' => $categoryCurrent['title']];
  }
}
