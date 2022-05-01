<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use \app\admin\model\Permissions;

class Permission extends Controller
{

    public function initialize()
    {
        $this->permsModel = new Permissions();
    }
    /**
     * 
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $size = $this->request->request('size');
        $page = $this->request->request('page');
        (int)$size = $size ? $size : 5;
        (int)$page = $page ? $page : 1;
        if ($page < 1) {
            $page = 1;
        }
        $count = $this->permsModel->count();
        $offset = $size * ($page - 1);
        $pageCount = ceil($count / $size); // 计算页数/向上取整
        if ($page >= $pageCount) {
            $page = $pageCount;
        }
        $res  = $this->permsModel->limit($offset, $size)->select();

        $this->assign('title', '权限列表');
        $this->assign('datas', [
            'data' => $res,
            'page' => $page,
            'size' => $size,
            'count' => $count,
            'pageCount' => $pageCount
        ]);
        return $this->fetch('index');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
