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

$obRouter->get('/admin/testimonies/new', [
    'middlewares' => [
        'required-admin-login'
    ],
    function ($request) {
        return new Response(200, TestimoniesController::getTestimony($request));
    }
]);

$obRouter->post('/admin/testimonies/new', [
    'middlewares' => [
        'required-admin-login'
    ],
    function ($request) {
        return new Response(200, TestimoniesController::setTestimony($request));
    }
]);

$obRouter->get('/admin/testimonies/{id}/edit', [
    'middlewares' => [
        'required-admin-login'
    ],
    function ($request, $id) {
        return new Response(200, TestimoniesController::getEditTestimony($request, $id));
    }
]);

$obRouter->post('/admin/testimonies/{id}/edit', [
    'middlewares' => [
        'required-admin-login'
    ],
    function ($request, $id) {
        return new Response(200, TestimoniesController::setEditTestimony($request, $id));
    }
]);

$obRouter->get('/admin/testimonies/{id}/delete', [
    'middlewares' => [
        'required-admin-login'
    ],
    function ($request, $id) {
        return new Response(200, TestimoniesController::getDeleteTestimony($request, $id));
    }
]);

$obRouter->post('/admin/testimonies/{id}/delete', [
    'middlewares' => [
        'required-admin-login'
    ],
    function ($request, $id) {
        return new Response(200, TestimoniesController::setDeleteTestimony($request, $id));
    }
]);