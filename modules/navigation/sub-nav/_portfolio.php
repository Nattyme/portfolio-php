<?php
// Категории проектов, отображающиеся в выпадающем меню "Портфолио"
$category_projectDB = R::find('categories');

$sqlQuery = 'SELECT
                c.id, c.title,
                p.cat
             FROM `categories` AS c
             LEFT JOIN `portfolio` AS p ON c.id = p.cat
             WHERE c.id = ? LIMIT 1';

$category_project = array();
foreach ($category_projectDB as $category) {
  $categoryCurrent = R::getRow($sqlQuery, [$category['id']]);
  if (!empty($categoryCurrent['cat'])) {
    $category_project[] = ['id' => $categoryCurrent['cat'], 'title' => $categoryCurrent['title']];
  }
}