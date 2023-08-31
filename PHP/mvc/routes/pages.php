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

$obRouter->get('/depoimentos', [
    function(){
        return new Response(200, Pages\testmonyController::actionTestimonies());
    }
]); 

$obRouter->post('/depoimentos', [
    function($request){
        return new Response(200, Pages\testmonyController::actionInsert($request));
    }
]); 

// $obRouter->get('/page/{idPage}/{action}', [
//     function($idPage, $action){
//         return new Response(200, 'Page10 '.$idPage.' - '.$action);
//     }
// ]);