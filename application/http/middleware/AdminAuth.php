<?php

namespace app\http\middleware;

class AdminAuth
{
    public function handle($request, \Closure $next)
    {
        if(!session('adminInfo')){
            return redirect('login/index');
        }
        // 请求 -> 前置中间 -> 控制器方法 -> 后置
        return $next($request);
    }
}
