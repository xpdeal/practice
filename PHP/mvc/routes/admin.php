<?php

use App\Http\Response;
use App\controller\Admin\loginController;


$obRouter->get('/admin', [
    'middlewares' => [
        'required-admin-login'
    ],
    function () {
        return new Response(200, 'admi');
    }
]);

$obRouter->get('/admin/login', [
    'middlewares' => [
        'required-admin-logout'
    ],
    function ($request) {
        return new Response(200, loginController::actionLogin($request));
    }
]);

$obRouter->post('/admin/login', [
    'middlewares' => [
        'required-admin-logout'
    ],
    function ($request) {
        //echo password_hash('123123', PASSWORD_DEFAULT);        
        return new Response(200, (string) loginController::actionSetLogin($request));
    }
]);

$obRouter->get('/admin/logout', [   
    'middlewares' => [
        'required-admin-login'
    ],
    function ($request) {
        return new Response(200, loginController::actionSetLogout($request));
    }
]);
