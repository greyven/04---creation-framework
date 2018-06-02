<?php
namespace App;
use App\Framework\Autoloader;
use App\Framework\Router;
require('Framework/Autoloader.php');

Autoloader::register();
$router = new Router();
$router->routeRequest();