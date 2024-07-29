<?php 
require_once ROOT . "./libs/functions.php";

//Одиночный пост, показываем отдельную страницу блога
$sqlQuery = 'SELECT
                posts.id, posts.title, posts.content, posts.cover, posts.timestamp, posts.edit_time, posts.cat,
                categories.title AS cat_title
             FROM `posts`
             LEFT JOIN `categories` ON posts.cat = categories.id
             WHERE posts.id = ? LIMIT 1';

$post = R::getRow($sqlQuery, [$uriGet]);

// Кнопки назад и вперед
$postsId = R::getCol('SELECT id FROM posts');
foreach ($postsId as $index => $value) {
  if ( $post['id'] == $value ) {
    $prevId = array_key_exists($index + 1, $postsId) ? $postsId[$index + 1] : NULL;
    $nextId = array_key_exists($index - 1, $postsId) ? $postsId[$index - 1] : NULL;
  }
}

// Комментарии
$sqlQueryComments = 'SELECT 
                        comments.text, comments.user, comments.timestamp,
                        users.id, users.name, users.surname, users.avatar_small
                     FROM `comments`
                     LEFT JOIN `users` ON comments.user = users.id
                     WHERE comments.post = ?';

$comments = R::getAll( $sqlQueryComments, [$post['id']] );

// Вывод похожих постов
// Разбиваем заголовок на слова, записваем массив в переменую
$wordsArray = explode(' ', $post['title']);
$wordsArray = array_unique($wordsArray);
$pageTitle = "Блог - все записи";

// Массив со стоп словами (предлоги, союзы, и др. "общие" слова)
$stopWords = ['и', 'на', 'в', 'а', 'под', 'если', 'за', 'что', '-', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

// Новый обработанный массив
$newWordsArray = array();
foreach ($wordsArray as $word) {
  // Перевод в нижний регистр
  $word = mb_strtolower($word);

  // Удаление кавычек и лишних символов
  $word = str_replace('"', "", $word);
  $word = str_replace("'", "", $word);
  $word = str_replace('«', "", $word);
  $word = str_replace('»', "", $word);
  $word = str_replace(',', "", $word);
  $word = str_replace('.', "", $word);
  $word = str_replace(':', "", $word);
  $word = str_replace('(', "", $word);
  $word = str_replace(')', "", $word);

  // Проверка наличия слова в стоп списке
  if ( !in_array($word, $stopWords) ) {

    // Обрезаем окончания
    if (mb_strlen($word) > 4 ) {
      $word = mb_substr($word, 0, -2);
    } else if (mb_strlen($word) > 3) {
      $word = mb_substr($word, 0, -1);
    }

    // Добавляем символ шаблона
    $word = '%' . $word . '%';

    // Добавляем слова в новыц массив
    $newWordsArray[] = $word;
  }
}

// Фрмируем sql запрос
$sqlQuery = 'SELECT * FROM `posts` WHERE ';

for ($i = 0; $i < count($newWordsArray); $i++) {
  if ($i + 1 == count($newWordsArray)) {
    // Последний цикл
    $sqlQuery .= 'title LIKE ?';
  } else {
    $sqlQuery .= 'title LIKE ? OR ';
  }
}

$sqlQuery .= 'order by RAND() LIMIT 3';

$relatedPosts = R::getAll($sqlQuery, $newWordsArray);
print_r($relatedPosts);
die();

// Подключение шаблонов страницы
ob_start();
include ROOT . "templates/blog/single-post.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";

include ROOT . "templates/blog/index.tpl";

include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/page-parts/_foot.tpl";