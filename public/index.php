<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

/****************** DEBUG CODE ******************/
if (isset($_GET['debug_routes'])) {
    dd([
        'routes_api_exists' => file_exists(base_path('routes/api.php')),
        'loaded_providers' => $app->getLoadedProviders(),
        'route_collection' => Route::getRoutes()->getRoutes(),
        'bootstrap_status' => [
            'app' => file_exists($app->bootstrapPath('app.php')),
            'providers' => file_exists($app->bootstrapPath('providers.php')),
            'routes' => file_exists($app->bootstrapPath('routes.php'))
        ]
    ]);
}
/****************** END DEBUG ******************/

$app->handleRequest(Request::capture());