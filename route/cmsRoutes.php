<?php

use \think\Facade\Route;

Route::group('/cms', function(){
    Route::get('/', 'cms/index/index');
});