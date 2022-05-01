<?php

namespace app\api\controller;

use \app\admin\model\Permissions;
use app\common\controller\Api;

class Index extends Api
{

    public function __construct()
    {
        parent::__construct();
        $this->permsModel = new Permissions;
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $data = $this->permsModel->all();
        return $this->success($data, '数据获取成功');
    }

    // public function login()
    // {
    //     $data = [
    //         'id' => 191,
    //         'username' => 'admin',
    //         'email' => 'admin@qq.com'
    //     ];
    //     $data['token'] = $this->jwt($data); // jwt 算法
    //     return $this->success($data);
    // }

    // public function user_info()
    // {
    //     // ---------- 中间件 ----------
    //     $token = $this->request->header('token');
    //     if (isset($token)) { // 用jwt判断
    //         return $this->success($token, '登录成功');
    //     }
    //     // ---------- 中间件 ----------

    //     return $this->error(null, '请先登录');
    // }

    // public function jwt($data)
    // {
    //     return md5(json_encode($data)); // 32
    // }

}
