<?php

use App\Http\Response;
use App\controller\Admin\HomeController;
use App\Controller\Admin\TestimoniesController;

$obRouter->get('/admin/testimonies', [
    'middlewares' => [
        'required-admin-login'
    ],
    function ($request) {
        return new Response(200, TestimoniesController::actionIndex($request));
    }
]);
