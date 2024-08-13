<?php
$user = R::load('users', $_SESSION['logged_user']['id']);
$user->cart = $_GET['id'];
R::store($user);
header('Location: ' . HOST . 'shop/' . $_GET['id']);