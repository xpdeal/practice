<?php

require __DIR__ . "/vendor/autoload.php";

use App\Http\Router;
use App\Utils\View;

const URL = "http://localhost:3000/PHP/mvc";

View::init([
   'URL' => URL
]);

$obRouter = new Router(URL);

include __DIR__ . '/routes/pages.php';
$obRouter->run()
   ->sendResponse();
