<?php


use App\Http\Response;
use App\Controller\api\ApiController;

$obRouter->get('/api/v1', [
    'middlewares' => [
        'api'
    ],
    function ($request) {
        return new Response(200, ApiController::getDetails($request), 'aplication/json');
    }
]);
