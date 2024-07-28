<?php
// DB SETTINGS
define('DB_HOST', 'localhost');
define('DB_NAME', 'project');
define('DB_USER', 'root');
define('DB_PASS', '');

if( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
  $protocol = 'https://';
} else {
  $protocol = 'http://';
}
// Хост сайта - используется для ссылок в браузере < href="..">
define('HOST', $protocol . $_SERVER['HTTP_HOST'] . '/'); //  //project/

//Физический путь к корневой директории скрипта
define('ROOT', dirname(__FILE__) . '/');

// Доп настройки
define('SITE_NAME', 'Сайт Digital Nomand');
define('SITE_EMAIL', 'info@project.com'); //email обяз-но домена, где расположен сайт, чтобы не поло в спам


