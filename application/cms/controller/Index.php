<?php

namespace app\cms\controller;

use think\Controller;

class Index extends Controller
{
    public function initialize()
    {
        // add
        // \think\facade\Hook::add('app_init', 'app\\cms\\behavior\\Test');
    }

    public function index()
    {
        \think\facade\Hook::listen('app_init');
        $data = session('___key1');
        dd($data);
    }
}
