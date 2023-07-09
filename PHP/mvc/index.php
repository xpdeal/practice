<?php

use App\HTTP\Request;
use App\HTTP\Response;
use App\controller\page\homeController;
use App\Http\Router;

const URL = "http://localhost:3000/PHP/mvc";

require __DIR__."/vendor/autoload.php";

$ob = new Router(URL); 
$ob->get('/a', [
    function(){
        return new Response(200, homeController::actionHome());
    }

]);

$ob->run()->sendResponse();

// echo "<pre>";
// var_dump($ob);exit();

// $resp =  new Response(500, 'ola');
// $resp->sendResponse();

//  $req =  new Request();
// echo "<pre>";
// var_dump($req);exit();

// echo homeController::actionHome();