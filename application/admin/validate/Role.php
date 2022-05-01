<?php

namespace app\admin\validate;

use think\Validate;

class Role extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'role_name|角色'    => 'require|max:10',
        'describe|角色描述'  => 'require|max:30',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'role_name.require' => '角色名必须填',
        'role_name.max'     => '角色名长度只能10字符',
        'describe.require'  => '角色描述必须填写',
        'describe.max'      => '角色描述长度只能30字符',

    ];
}
