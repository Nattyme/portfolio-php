<?php

$pageTitle = "Вход на сайт";

//Сохраняем код ниже в буфер
ob_start();
include ROOT . 'templates/login/form-login.tpl';

//Записываем вывод из буфера в пепеменную
$content = ob_get_contents();

//Окончание буфера, очищаем вывод
ob_end_clean();

include ROOT . 'templates/page-parts/_head.tpl';
include ROOT . 'templates/login/login-page.tpl';
include ROOT . 'templates/page-parts/_foot.tpl';