<?php
$_SESSION['logged_user'] = $user;
$_SESSION['login'] = 1;
$_SESSION['role'] = $user->role;

unset($_SESSION['logged_user']);
unset($_SESSION['login']);
unset($_SESSION['role']);
session_destroy();
setcookie(session_name(), '', time() - 60);

header("Location: " . HOST);