<?php

namespace app\admin\controller;

use \think\Controller;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch('index');
    }



    /**
     * 获得树形结构的数据
     * @param array $data
     * @param int $pid
     * @return array
     */
    static function getTree($data = [], $rootId = 0)
    {
        $tree = [];
        foreach ($data as $item) {
            if ($item['pid'] == $rootId) {
                $item['children'] = self::getTree($data, $item['id']);
                array_push($tree, $item);
            }
        }
        return $tree;
    }


    public function test()
    {
        $str = '[{"id":1,"desc":"用户管理","path":"","level":0,"pid":0},{"id":2,"desc":"用户列表","path":"/users","level":1,"pid":1},{"id":12,"desc":"用户信息","path":"/users/index","level":1,"pid":1},{"id":3,"desc":"权限管理","path":null,"level":0,"pid":0},{"id":4,"desc":"角色管理","path":"/roles","level":1,"pid":3},{"id":5,"desc":"权限管理","path":"/permissions","level":1,"pid":3},{"id":6,"desc":"测试管理","path":"/test","level":2,"pid":5}]';
        $arr = json_decode($str, true);
        $tree = $this->getTree($arr);
        dd($tree);
    }
}
