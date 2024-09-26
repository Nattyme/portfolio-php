<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title><?php echo $pageTitle; ?></title>
	<meta name="keywords" />
	<meta name="description" />
	<link rel="stylesheet" href="<?php echo HOST; ?>static/css/main.css">

  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo HOST;?>static/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo HOST;?>static/img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo HOST;?>static/img/favicons/favicon-16x16.png">
  <link rel="manifest" href="<?php echo HOST;?>static/img/favicons/site.webmanifest">
  <link rel="shortcut icon" href="<?php echo HOST;?>static/img/favicons/favicon.ico">
  <meta name="msapplication-TileColor" content="#ffc40d">
  <meta name="msapplication-config" content="<?php echo HOST;?>static/img/favicons/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">
</head>

<?php if ( isset($pageClass) && $pageClass === 'authorization-page') : ?>
  <body class="authorization-page">
<?php else : ?>
  <body class="sticky-footer <?php echo isset($pageClass) ? $pageClass : ''; ?>">
<?php endif;