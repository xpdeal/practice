<?php

use App\Http\Response;
use App\controller\Pages;

$obRouter->get('/', [
    function(){
        return new Response(200, Pages\homeController::actionHome());
    }
]);

$obRouter->get('/about', [
    function(){
        return new Response(200, Pages\aboutController::actionAbout());
    }
]);

$obRouter->get('/page/{idPage}/{action}', [
    function($idPage, $action){
        return new Response(200, 'Page10 '.$idPage.' - '.$action);
    }
]);