<?php
require_once "./../config.php";
require_once "./../db.php";
require_once ROOT . "libs/resize-and-crop.php";
require_once ROOT . "libs/functions.php";

$_SESSION['errors'] = array();
$_SESSION['success'] = array();
session_start();

// Проверка на права доступао
if ( !(isset($_SESSION['role']) && $_SESSION['role'] === 'admin')) {
  header('Location: ' . HOST . 'login');
} 

// Siderbar
require ROOT . "admin/modules/sidebar/sidebar.php";

/* ................................................
                  РОУТЕР - МАРШРУТ
................................................ */
$uriModule = getModuleNameForAdmin();
switch ($uriModule) {
  case '':
    require ROOT . "admin/modules/admin/index.php";
    break;
  // ::::::::::::: BLOG :::::::::::::::::::
  case 'blog':
    require ROOT . "admin/modules/blog/all.php";
    break;

  case 'post-new':
    require ROOT . "admin/modules/blog/new.php";
    break;

  case 'post-edit':
    require ROOT . "admin/modules/blog/edit.php";
    break;

  case 'post-delete':
    require ROOT . "admin/modules/blog/delete.php";
    break;
 // ::::::::::::: CATEGORIES :::::::::::::::::::
  case 'category':
    require ROOT . "admin/modules/categories/all.php";
    break;

  case 'category-new':
    require ROOT . "admin/modules/categories/new.php";
    break;

  case 'category-edit':
    require ROOT . "admin/modules/categories/edit.php";
    break;

  case 'category-delete':
    require ROOT . "admin/modules/categories/delete.php";
    break;
  // ::::::::::::: PORTFOLIO :::::::::::::::::::
  case 'portfolio':
    require ROOT . "admin/modules/portfolio/all.php";
    break;

  case 'project-new':
    require ROOT . "admin/modules/portfolio/new.php";
    break;

  case 'project-edit':
    require ROOT . "admin/modules/portfolio/edit.php";
    break;

  case 'project-delete':
    require ROOT . "admin/modules/portfolio/delete.php";
    break;

  // ::::::::::::: USERS :::::::::::::::::::
  case 'users':
    require ROOT . "admin/modules/users/all.php";
    break; 

  case 'user-edit':
    require ROOT . "admin/modules/users/edit.php";
    break; 

  case 'user-delete':
    require ROOT . "admin/modules/users/delete.php";
    break; 

  // ::::::::::::: SHOP :::::::::::::::::::
  case 'shop':
    require ROOT . "admin/modules/shop/all.php";
    break;

  case 'shop-new':
    require ROOT . "admin/modules/shop/new.php";
    break;

  case 'shop-edit':
    require ROOT . "admin/modules/shop/edit.php";
    break;

  case 'shop-delete':
    require ROOT . "admin/modules/shop/delete.php";
    break;

  // ::::::::::::: OTHER :::::::::::::::::::
  case 'main':
    require ROOT . "admin/modules/main/edit.php";
    break;

  case 'contacts':
    require ROOT . "admin/modules/contacts/edit.php";
    break;
  
  case 'messages':
    require ROOT . "admin/modules/messages/all.php";
    break;

  case 'message':
    require ROOT . "admin/modules/messages/single.php";
    break;

  case 'settings':
    require ROOT . "admin/modules/settings/settings.php";
    break;

  default: 
    require ROOT . "admin/modules/admin/index.php";
    break;
}









