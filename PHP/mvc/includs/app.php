<?php
require __DIR__ . "/../vendor/autoload.php";

use App\Utils\View;
use App\Http\Middleware\Queue;
use App\Http\Middleware\Maintenance;
use \WilliamCosta\DotEnv\Environment;
use App\Http\Middleware\ApiMiddleware;
use \WilliamCosta\DatabaseManager\Database;
use App\Http\Middleware\RequiredAdminLogin;
use App\Http\Middleware\RequiredAdminLogout;
use App\Http\Middleware\UserBasicAuthMiddleware;

Environment::load(__DIR__ . '/../');

Database::config(
    getenv('DB_HOST'),
    getenv('DB_NAME'),
    getenv('DB_USER'),
    getenv('DB_PASS'),
    getenv('DB_PORT'),
);

define('URL', getenv('URL'));

View::init([
    'URL' => URL
]);

Queue::setMap([
    'maintenance' => Maintenance::class,
    'required-admin-logout' => RequiredAdminLogout::class,
    'required-admin-login' => RequiredAdminLogin::class,
    'api' => ApiMiddleware::class,
    'user-basic-auth' => UserBasicAuthMiddleware::class
]);

Queue::setDefault([
    'maintenance' 
]);
