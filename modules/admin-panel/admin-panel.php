<?php
$messagesNewCounter = R::count('messages', ' status = ? ', ['new']);
$ordersNewCounter = R::count('orders', ' status = ?', ['new']);

