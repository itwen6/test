<?php

use \think\Facade\Route;

// Route::get('/', 'admin/index/test');

Route::group('/admin', function () {
    // 登录
    Route::get('/login/index', 'admin/login/index');
    Route::post('/login/login', 'admin/login/login');
    Route::get('/login/verify', 'admin/login/verify');

    // 需要登录之后才能访问的路由
    Route::group('' , function(){
        Route::get('/login/logout','admin/login/logout');
        Route::get('/index/index','admin/index/index');

        Route::get('/admin/user_profile','admin/admin/userProfile');
        Route::get('/admin/getAddUser','admin/admin/getAddUser');
        Route::post('/admin/setAddUser','admin/admin/setAddUser');
        Route::get('/admin/getUpdateUser/:id','admin/admin/getUpdateUser');
        Route::post('/admin/setUpdateUser','admin/admin/setUpdateUser');
        Route::get('/admin/deleteUser/:id','admin/admin/deleteUser');
        Route::resource('role','admin/role');
        Route::resource('permission', 'admin/permission');
        
    })->middleware('AdminAuth');
});
