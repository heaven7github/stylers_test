<?php

include_once "data/config.php";
include_once "application/Autoload.php";
Autoload::register();


define('BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']). '/');
$app = new App();
$app->run();