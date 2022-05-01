<?php

namespace app\admin\model;

use think\Model;

class Role extends Model
{

    protected $autoWriteTimestamp = true;
    // public function admins(){
    //     return $this->belongsToMany(\app\admin\model\Admin::class, \app\admin\model\AdminRole::class, 'role_id', 'admin_id');
    // }

    /**
     * 多表联查
     */
    public function permissionss(){
        return $this->belongsToMany(\app\admin\model\Permissions::class, RolePermissions::class, 'permissions_id', 'role_id');
    }

    /**
     * 设置时间
     *
     * @param [type] $val
     */
    public function getCreateTimeArrt($val)
    {
        return date('Y-m-d H:i:s', $val);
    }
    
}
