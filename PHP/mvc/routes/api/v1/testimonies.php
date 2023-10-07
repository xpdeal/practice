<?php

use App\Http\Response;
use App\Controller\api\ApiTestimoniesController;


$obRouter->get('/api/v1/testimonies', [
    'middlewares' => [
        'api'
    ],
    function ($request) {
        return new Response(200, ApiTestimoniesController::getTestmimonies($request), 'aplication/json');
    }
]);

$obRouter->get('/api/v1/testimonies/{id}', [
    'middlewares' => [
        'api'
    ],
    function ($request, $id) {
        return new Response(200, ApiTestimoniesController::getTestmimony($request, $id), 'aplication/json');
    }
]);
