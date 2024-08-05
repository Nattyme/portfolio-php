<?php
require_once "config.php";
require_once "db.php";
require_once ROOT . "./libs/resize-and-crop.php";
require_once ROOT . "./libs/functions.php";

$_SESSION['errors'] = array();
$_SESSION['success'] = array();

session_start();

require ROOT . "modules/settings/settings.php";
require ROOT . "modules/admin-panel/admin-panel.php";

$uriModule = getModuleName();
$uriGet = getUriGet();
$uriGetParam = getUriGetParam();

// Роутер
switch ($uriModule) {
  case '':
    require ROOT . "modules/main/index.php";
    break;

  // ::::::::::::: USERS :::::::::::::::::::
  case 'login':
    require ROOT . "modules/login/login.php";
    break;

  case 'registration':
    require ROOT . "modules/login/registration.php";
    break;

  case 'logout':
    require ROOT . "modules/login/logout.php";
    break;

  case 'lost-password':
    require ROOT . "modules/login/lost-password.php";
    break;

  case 'set-new-password':
    require ROOT . "modules/login/set-new-password.php";
    break;

  case 'profile':
    require ROOT . "modules/profile/profile.php";
    break;

  case 'profile-edit':
    require ROOT . "modules/profile/profile-edit.php";
    break;

  // ::::::::::::: OTHER :::::::::::::::::::
  case 'main':
    require ROOT . "modules/main/index.php";
    break;

  case 'portfolio':
    if ( isset($uriGet) ) {
      require ROOT . "modules/portfolio/single.php";
    } else {
      require ROOT . "modules/portfolio/all.php";
    }
    break

   // ::::::::::::: BLOG :::::::::::::::::::
   case 'blog':
    if ( isset($uriGet) && $uriGet === 'cat' && !empty($uriGetParam) ) {
      require ROOT . "modules/blog/categories.php";
    } else if ( isset($uriGet) ) {
      require ROOT . "modules/blog/single-post.php";
    } else {
      require ROOT . "modules/blog/all.php";
    }
    break;

  case 'add-comment':
    require ROOT . "modules/blog/add-comment.php";
    break;

   // ::::::::::::: SHOP :::::::::::::::::::
   case 'shop':
    if ( isset($uriGet) && $uriGet === 'cat' && !empty($uriGetParam) ) {
      require ROOT . "modules/shop/categories.php";
    } else if ( isset($uriGet) ) {
      require ROOT . "modules/shop/product.php";
    } else {
      require ROOT . "modules/shop/catalog.php";
    }
    break;

  case 'contacts':
    require ROOT . "modules/contacts/index.php";
    break;

  default: 
    require ROOT . "modules/main/index.php";
    break;
}









