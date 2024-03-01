<?php
include "vendor/autoload.php";
include_once "routes/Route.php";
include_once "database/Database.php";
include_once "application/Controllers/Error404Controller.php";

$db = new \Database();
$route = new Route();
$route->start();
?>