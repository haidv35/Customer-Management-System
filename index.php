<?php
error_reporting(E_ALL);
// require_once getcwd() . '/vendor/autoload.php';
require_once getcwd() . '/routes.php';

$route = new Route();
$route->index();
