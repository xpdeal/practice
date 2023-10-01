<?php

use App\Http\Response;
use App\Controller\Admin\UsersController;


$obRouter->get('/admin/users', [
    'middlewares' => [
        'required-admin-login'
    ],
    function ($request) {
        return new Response(200, UsersController::actionIndex($request));
    }
]);

$obRouter->get('/admin/users/new', [
    'middlewares' => [
        'required-admin-login'
    ],
    function ($request) {
        return new Response(200, UsersController::getUser($request));
    }
]);

$obRouter->post('/admin/users/new', [
    'middlewares' => [
        'required-admin-login'
    ],
    function ($request) {
        return new Response(200, UsersController::setUser($request));
    }
]);

$obRouter->get('/admin/users/{id}/edit', [
    'middlewares' => [
        'required-admin-login'
    ],
    function ($request, $id) {
        return new Response(200, UsersController::getEditUser($request, $id));
    }
]);

$obRouter->post('/admin/users/{id}/edit', [
    'middlewares' => [
        'required-admin-login'
    ],
    function ($request, $id) {
        return new Response(200, UsersController::setEditUser($request, $id));
    }
]);

$obRouter->get('/admin/users/{id}/delete', [
    'middlewares' => [
        'required-admin-login'
    ],
    function ($request, $id) {
        return new Response(200, UsersController::getDeleteUser($request, $id));
    }
]);

$obRouter->post('/admin/users/{id}/delete', [
    'middlewares' => [
        'required-admin-login'
    ],
    function ($request, $id) {
        return new Response(200, UsersController::setDeleteUser($request, $id));
    }
]);