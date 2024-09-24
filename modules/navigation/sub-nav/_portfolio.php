<?php
// Категории проектов, отображающиеся в выпадающем меню "Портфолио"
$category_projectDB = R::find('categories');

// Запрашиваем данные по категориям и сопостоваляем с проектами по ID категории
$sqlQuery = 'SELECT
                c.id, c.title,
                p.cat
             FROM `categories` AS c
             LEFT JOIN `portfolio` AS p ON c.id = p.cat
             WHERE c.id = ? LIMIT 1';

$category_project = array();

// Обходим все категории из БД. 
foreach ($category_projectDB as $category) {

  // Получаем данные по текущей категории и проекту из sql запроса
  $categoryCurrent = R::getRow($sqlQuery, [$category['id']]);

  // Если у проекта задана категория
  if (!empty($categoryCurrent['cat'])) {

    // В массив текущих проектов записываем id и название текущей категории
    $category_project[] = ['id' => $categoryCurrent['cat'], 'title' => $categoryCurrent['title']];
  }
}