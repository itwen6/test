<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Role as RoleModel;
class Role extends Controller
{

    public function initialize()
    {
        $this->roleModel = new RoleModel();
    }
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {   
        $datas  = $this->roleModel->with('permissionss')->select()->toArray();
        
        foreach($datas as $key => &$val){
            $permissionss = '';
            foreach($val['permissionss'] as $k => $v){
                $permissionss .= $v['permissions_name'] . ',';
            }
            $datas[$key]['permissions_name'] = rtrim($permissionss, ',');
        }
        $this->assign('dataRole',$datas);
        $this->assign('title', '角色列表');
        return $this->fetch('index');
    }

    public function read($id)
    {
        dd($id);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $this->assign('title', '添加角色');
        return $this->fetch('create');
    }

    /**
     * 保存新建的资源
     */
    public function save()
    {
        $data = $this->request->post();
        $where = ['role_name' => $data['role_name']];
        $result = $this->validate($data,\app\admin\validate\Role::class);
        if(true !== $result){
            return $this->error($result);
        }
        $role = $this->roleModel->where($where)->find();
        if($role){
            return $this->error('该角色名已存在,请重新输入!!');
        }

        $res = $this->roleModel->allowField(true)->save($data);
        if($res){
            return $this->success('添加角色成功!', '/admin/role');
        }else{
            return $this->error('添加角色失败!');
        }
    }
    
    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $id = $this->request->param('id');
        if(!$id){
            return $this->error('请选择需要编辑的角色!');
        }
        $role = $this->roleModel->where('id',$id)->find();
        if(!$role){
            return $this->error('该角色已不存在!!');
        }
        $this->assign('title', '编辑角色');
        $this->assign("role",$role);
        return $this->fetch('edit');
    }

    /**
     * 保存更新的资源
     */
    public function update($id)
    {
        $data = $this->request->post();

        $role = $this->roleModel->get($id);

        if($data['role_name']){
            $role->role_name = $data['role_name'];
        }
        if($data['describe']){
            $role->describe = $data['describe'];
        }
        $res = $role->allowField(true)->save();

        if($res){
            return $this->success('编辑角色成功!','/admin/role');
        }else{
            return $this->error('编辑失败');
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        if(!$id){
            return $this->error('该选择删除的角色!!');
        }
        $res = $this->roleModel->where('id',$id)->delete();

        if($res){
            return $this->success('删除成功', '/admin/role');
        }else{
            return $this->error('删除失败');
        }
    }
}
