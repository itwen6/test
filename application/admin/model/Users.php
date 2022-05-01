<?php

namespace app\admin\model;

use think\Model;

class Users extends Model
{
    public function address() {
        return $this->hasMany(\app\admin\model\Address::class,'user_id','id');
    }
}
