<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model\Admin;
use think\captcha\Captcha;
class Login extends Controller
{

    public function initialize(){
        $this->adminModel = new Admin();
        $this->enableCaptcha = config('app.enable_captcha');
    }

    // 登录页面
    public function index()
    {
        $this->assign('enableCaptcha', $this->enableCaptcha);
        return $this->fetch('login/index');
    }

    public function verify()
    {
        $captchaConf = config('app.captcha_config');
        $captcha = new Captcha($captchaConf);
        return $captcha->entry();
    }

    // 登录逻辑处理
    public function login()
    {
        $data = $this->request->post();
        $captcha = $data['captcha'];
        if (!$data) {
            return $this->error('请登录');
        }
        if($this->enableCaptcha){
            if (!captcha_check($captcha)) {
                return $this->error('验证码有误!');
            };
        }
        $errorMsg = $this->validate($data, \app\admin\validate\Admin::class);
        if ($errorMsg !== true) {
            return $this->error('数据验证失败: ' . $errorMsg);
        }

        // 查询用户名密码
        $data['password'] = md5($data['password']); 
        $res = $this->adminModel
            ->where($data)
            ->field(['user_name','password','id','status'])
            ->find();
            
        if(!$res){
            return $this->error('该用户不存在!');
        }

        if($res['status'] !== 1){
            return $this->error('该用户已锁定,请联系管理员');
        }
        
        if($res){
            session('adminInfo',$res);
            $this->success('登录成功','/admin/index/index');
        }else{
            $this->error('用户名或者密码有误');
        }
    }


    // 注销逻辑处理
    public function logout()
    {
        if (!session('adminInfo')) {
            $this->error('请登录');
        }
        session('adminInfo', null);
        $this->success('注销成功');
    }
    
}
