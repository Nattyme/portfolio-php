<?php
// Категории постов, отображающиеся в выпадающем меню "Блог"
$category_postDB = R::find('categories');

// Запрашиваем данные по категориям и сопостоваляем с постами по ID категории
$sqlQuery = 'SELECT
                c.id, c.title,
                p.cat
             FROM `categories` AS c
             LEFT JOIN `posts` AS p ON c.id = p.cat
             WHERE c.id = ? LIMIT 1';

// Формируем массив по sql запросу
$category_post = array();

// Обходим все категории из БД
foreach ($category_postDB as $category) {

  // Получаем данные по текущей категории и посту из sql запроса
  $categoryCurrent = R::getRow($sqlQuery, [$category['id']]);

  // Если у поста задана категория
  if (!empty($categoryCurrent['cat'])) {

    // В массив текущих постов записываем id и название текущей категории
    $category_post[] = ['id' => $categoryCurrent['cat'], 'title' => $categoryCurrent['title']];
  }
}
