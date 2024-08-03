<?php
$meddagesNewCounter = R::count('messages', ' status = ? ', ['new']);