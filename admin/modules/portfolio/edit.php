<?php
$projects = R::find('categories', 'ORDER BY title ASC'); 

if( isset($_POST['postEdit'])) {
  // Проверка на заполненность названия
  if( trim($_POST['title']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Введите заголовок поста'];
  } 

  // Проверка на заполненность содержимого
  if( trim($_POST['about']) == '' ) {
    $_SESSION['errors'][] = ['title' => 'Заполните содержимое поста'];
  } 

  // Если нет ошибок
  if ( empty($_SESSION['errors'])) {
    $project = R::load('portfolio', $_GET['id']);
    $project->title = $_POST['title'];
    // $post->cat = $_POST['cat'];
    $project->about = $_POST['about'];
    $project->deadline = $_POST['deadline'];
    $project->pages = $_POST['pages'];
    $project->budget = $_POST['budget'];
    $project->tools = $_POST['tools'];
    $project->link = $_POST['link'];
    $project->editTime = time();

    // Если передано изображение - уменьшаем, сохраняем, записываем в БД
    if( isset($_FILES['cover']['name']) && $_FILES['cover']['tmp_name'] !== '') {
      //Если передано изображение - уменьшаем, сохраняем файлы в папку, получаем название файлов изображений
      $coverFileName = saveUploadedImg('cover', [600, 300], 12, 'portfolio', [1110, 460], [290, 230]);

      // Если новое изображение успешно загружено 
      if ($coverFileName) {
        $coverFolderLocation = ROOT . 'usercontent/portfolio/';
        // Если есть старое изображение - удаляем 
        if (file_exists($coverFolderLocation . $project->cover) && !empty($project->cover)) {
          unlink($coverFolderLocation . $project->cover);
        }

        // Если есть старое маленькое изображение - удаляем 
        if (file_exists($coverFolderLocation . $project->coverSmall) && !empty($project->coverSmall)) {
          unlink($coverFolderLocation . $project->coverSmall);
        }
          // Записываем имя файлов в БД
        $porject->cover = $coverFileName[0];
        $project->coverSmall = $coverFileName[1];
      }
    }

    // Удаление обложки
    if ( isset($_POST['delete-cover']) && $_POST['delete-cover'] == 'on') {
      $coverFolderLocation = ROOT . 'usercontent/portfolio/';

      // Если есть старое изображение - удаляем 
      if (file_exists($coverFolderLocation . $project->cover) && !empty($project->cover)) {
        unlink($coverFolderLocation . $project->cover);
      }

      // Если есть старое маленькое изображение - удаляем 
      if (file_exists($coverFolderLocation . $project->coverSmall) && !empty($project->coverSmall)) {
        unlink($coverFolderLocation . $project->coverSmall);
      }

      // Удалить записи файла в БД
      $project->cover = NULL;
      $project->coverSmall = NULL;
    }

    R::store($project);

    if ( empty($_SESSION['errors'])) {
      $_SESSION['success'][] = ['title' => 'Пост успешно обновлен.'];
    }
  }
}

$project = R::load('portfolio', $_GET['id']);

$pageTitle = "Блог. Редактировать пост {$project['title']}";
$pageClass = "admin-page";
// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/portfolio/edit.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";
