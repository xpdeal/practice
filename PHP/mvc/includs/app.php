<?php
require __DIR__ . "/../vendor/autoload.php";

use App\Http\Middleware\Maintenance;
use App\Http\Middleware\Queue;
use App\Utils\View;
use \WilliamCosta\DotEnv\Environment;
use \WilliamCosta\DatabaseManager\Database;

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
    'maintenance' => Maintenance::class
]);

Queue::setDefault([
    'maintenance' 
]);
