<?php

use App\controller\Admin\HomeController;
use App\Http\Response;
use App\controller\Admin\loginController;

$obRouter->get('/admin', [
    'middlewares' => [
        'required-admin-login'
    ],
    function ($request) {
        return new Response(200, HomeController::actionHome($request));
    }
]);