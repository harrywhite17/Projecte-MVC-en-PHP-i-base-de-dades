<?php
require '../vendor/autoload.php';

use Core\App;
use Core\Route;

require '../Core/bootstrap.php';

if (!App::has('route')) {
    $appRoute = new Route();
    App::bind('route', $appRoute);
}

App::get('route')->redirect($_SERVER['REQUEST_URI']);

error_reporting(E_ALL);
ini_set('display_errors', 1);

