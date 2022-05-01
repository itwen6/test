<?php

namespace app\admin\controller;

use think\Controller;
use \app\admin\model\Admin as AdminModel;


class Admin extends Controller
{
    public function initialize()
    {
        $this->adminModel = new AdminModel();
    }

    // 用户管理
    public function userProfile()
    {   
        $userName = $this->request->request('username');
        $query = $this->adminModel->with('roles');
        if($userName){
            $query = $query->where('user_name','like',"%{$userName}%");
        }
        $datas = $query->select()->toArray();
        foreach($datas as $k => &$val){
            $val['role_name'] = '';
            foreach($val['roles'] as $v){
                $val['role_name'] .= $v['role_name'] . ',';
            }
            $val['role_name'] = rtrim($val['role_name'],",");
        }    
        
        $this->assign('dataAdmin',$datas);
        $this->assign('title', '用户列表');
        return $this->fetch('user_profile');
    }

    // 添加用户
    public  function getAddUser()
    {
        $this->assign('title','添加用户');
        return $this->fetch('getAddUser');
    }

    // 添加用户逻辑处理
    public function setAddUser()
    {
        $data = $this->request->post();
        $where = [ 'user_name' => $data['user_name'] ];
        $findUser = $this->adminModel->withTrashed()->where( $where )->find();
        if($findUser){
           return $this->error('添加失败,该用户已存在');
        }
        $errorMsg = $this->validate($data,\app\admin\validate\Admin::class);
        if($errorMsg != true){
            return $this->error($errorMsg);
        }
        $res = $this->adminModel->allowField(true)->save($data);
        if($res){
            return $this->success('添加成功','user_profile');
        }else{
            return $this->error('添加失败');
        }
    }


    // 编辑用户
    public function getUpdateUser()
    {
        $userId = $this->request->route('id');
        $data = $this->adminModel->where('id',$userId)->find();
        $this->assign('data',$data);
        $this->assign('title', '编辑用户');
        return $this->fetch('getUpdateUser');
    }

    
    // 修改用户逻辑处理
    public function setUpdateUser(){
        $data = $this->request->post();
        $user = $this->adminModel->get($data['id']);
        if (!$user) {
            return $this->error('该用户不存在');
        }
        if ($data['user_name']) {
            $user->user_name = $data['user_name'];
        }
        if ($data['password']) {
            $user->password = $data['password'];
        }

        $res = $user->save();
        if($res){
            return $this->success('修改成功','user_profile');
        }else{
            return $this->error('修改失败');
        }
    }

    // 删除用户
    public function deleteUser()
    {
        $id = $this->request->route('id');
        $force = $this->request->get('force') ? true : false;
        $res = $this->adminModel->destroy($id, $force);
        if($res){
            return $this->success('删除成功','user_profile'); 
        }else{
            return $this->error('删除成功');
        }
    }
}
