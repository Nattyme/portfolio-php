<?php
$project = R::load('portfolio', $_GET['id']); 

if( isset($_POST['postDelete']) ) {
  // Удаление обложки
  if ( !empty($project['cover']) ) {
    // Удадить файлы обложки с сервера
    $coverFolderLocation = ROOT . 'usercontent/portfolio/';
    unlink($coverFolderLocation . $project->cover);
    unlink($coverFolderLocation . $project->coverSmall);
  }

  R::trash($project);
  
  $_SESSION['success'][] = ['title' => 'Проект был успешно удалён.'];
  header('Location: ' . HOST . 'admin/portfolio');
  exit();
}

$pageTitle = "Портфолио - удалить проект";
$pageClass = "admin-page";
// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/portfolio/delete.tpl";
$content = ob_get_contents();
ob_end_clean();

//Шаблон страницы
include ROOT . "admin/templates/template.tpl";
