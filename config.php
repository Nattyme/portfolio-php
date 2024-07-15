<?php

if( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
  $protocol = 'https://';
} else {
  $protocol = 'http://';
}
// Хост сайта - используется для ссылок в браузере < href="..">
define('HOST', $protocol . $_SERVER['HTTP_HOST'] . '/'); //  //project/

//Физический путь к корневой директории скрипта
define('ROOT', dirname(__FILE__) . '/');


