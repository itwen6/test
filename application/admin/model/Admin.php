<?php
namespace app\admin\model;

use \think\Model;
use think\model\concern\SoftDelete;

class Admin extends Model {

    
    use SoftDelete;

    protected $deleteTime = 'delete_time';
    protected $defaultSoftDelete = null; // 告诉ThinkPHP你的默认值是什么, 如果不等于这个值, 就是删除状态
    protected $autoWriteTimestamp = true;
    /**
     *  设置加密密码
     *
     * @param [type] $value
     */
    public function setPasswordAttr($value)
    {
        return md5($value);
    }


    public function roles()
    {
        // belongsToMany(要关联的模型, 中间表模型, 要关联的模型在中间表的字段, 当前模型在中间表的字段)
        return $this->belongsToMany(Role::class, AdminRole::class, 'role_id', 'admin_id');
    }

    /**
     * 设置时间
     *
     * @param [type] $val
     */
    public function getCreateTimeArrt($val){
        return date('Y-m-d H:i:s',$val);
    }
}