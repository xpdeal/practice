<?php

use App\HTTP\Request;
use App\HTTP\Response;
use App\controller\page\homeController;

require __DIR__."/vendor/autoload.php";

$resp =  new Response(500, 'ola');
$resp->sendResponse();
//  $req =  new Request();

// echo "<pre>";

// var_dump($req);exit();
// echo homeController::actionHome();