<?php

use \think\Facade\Route;

Route::group('/api', function () {
    Route::get('/index/index', 'api/index/index');
    Route::get('/index/login', 'api/index/login');
    Route::get('/index/user_info', 'api/index/user_info');
});
