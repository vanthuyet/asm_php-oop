<?php

//      GET     -> USER/INDEX   -> INDEX    -> Danh sách
//      GET     -> USER/CREATE  -> CREATE   -> HIỂN THỊ FORM THÊM MỚI
//      POST    -> USER/STORE   -> STORE    -> LƯU DỮ LIỆU TỪ FORM THÊM MỚI VÀO DB
//      GET     -> USER/ID      -> SHOW ($id)     -> XEM CHI TIẾT
//      GET     -> USER/ID/EDIT -> EDIT ($id)     -> HIỂN THỊ FORM CẬP NHẬT
//      PUT     -> USER/ID      -> UPDATE ($id)   -> LƯU DỮ LIỆU TỪ FORM CẬP NHẬT VÀO DB
//      DELETE  -> USER/ID      -> DELETE ($id)   -> XÓA BẢn ghi    

use Admin\Xuongoop\Controllers\Admin\AuthController;
use Admin\Xuongoop\Controllers\Admin\DashboardController;
use Admin\Xuongoop\Controllers\Admin\UserController;
use Admin\Xuongoop\Controllers\Admin\TagController;
use Admin\Xuongoop\Controllers\Admin\PostController;

$router->before('GET|POST', '/admin/*.*', function() {
    if (!isset($_SESSION['user']) ) {
        header('location:'. url('login') );
        exit();
    }

    if (!is_admin() ) {
        header('location:'. url() );
        exit();
    }
});







$router->mount('/admin', function () use ($router) {

    $router->get('/',                    DashboardController::class . '@dashboard');

    $router->mount('/users', function () use ($router) {

        $router->get('/',                UserController::class . '@index');

        $router->get('/create',          UserController::class . '@create');
        $router->post('/store',          UserController::class . '@store');
        $router->get('/{id}/show',       UserController::class . '@show');

        $router->get('/{id}/edit',       UserController::class . '@edit');
        $router->post('/{id}/update',    UserController::class . '@update');

        $router->get('/{id}/delete',     UserController::class . '@delete');
    });  

    $router->mount('/tags', function () use ($router) {

        $router->get('/',                TagController::class . '@index');

        $router->get('/create',          TagController::class . '@create');
        $router->post('/store',          TagController::class . '@store');
        $router->get('/{id}/show',       TagController::class . '@show');

        $router->get('/{id}/edit',       TagController::class . '@edit');
        $router->post('/{id}/update',    TagController::class . '@update');

        $router->get('/{id}/delete',     TagController::class . '@delete');
    });  

    $router->mount('/posts', function () use ($router) {

        $router->get('/',                PostController::class . '@index');

        $router->get('/create',          PostController::class . '@create');
        $router->post('/store',          PostController::class . '@store');
        $router->get('/{id}/show',       PostController::class . '@show');

        $router->get('/{id}/edit',       PostController::class . '@edit');
        $router->post('/{id}/update',    PostController::class . '@update');

        $router->get('/{id}/delete',     PostController::class . '@delete');
    });  

    $router->mount('/authors', function () use ($router) {

        $router->get('/',                AuthController::class . '@index');

        $router->get('/create',          AuthController::class . '@create');
        $router->post('/store',          AuthController::class . '@store');
        $router->get('/{id}/show',       AuthController::class . '@show');

        $router->get('/{id}/edit',       AuthController::class . '@edit');
        $router->post('/{id}/update',    AuthController::class . '@update');

        $router->get('/{id}/delete',     AuthController::class . '@delete');
    });  
});
