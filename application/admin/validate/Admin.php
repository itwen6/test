<?php
namespace app\admin\validate;

use think\Validate;


class Admin extends Validate 
{

    protected $rule = [
        'user_name|用户名' => 'require|max:25',
        'password|用户密码'  => 'require'
    ];

    protected $message = [
        'user_name.require' => '用户名必须填',
        'user_name.max'     => '用户名最长不能超过25个字符',
        'password.require'  => '密码必须填'
    ];
}
