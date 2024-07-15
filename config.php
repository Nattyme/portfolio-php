<?php
// Хост сайта - используется для ссылок в браузере < href="..">
define('HOST', '//' . $_SERVER['HTTP_HOST'] . '/'); //  //project/

//Физический путь к корневой директории скрипта
define('ROOT', dirname(__FILE__) . '/');
echo HOST;
echo "<br>";
echo ROOT;

