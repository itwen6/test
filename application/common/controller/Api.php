<?php

namespace app\common\controller;

class Api
{
    public function __construct()
    {
        $this->request = request();
        $this->response = response();
    }

    public function success($data, $msg = "成功")
    {
        return $this->result(0,  $msg, $data);
    }

    public function error($data, $msg = "失败")
    {
        return $this->result(1, $msg, $data);
    }

    // showdoc.com
    protected function result($code, $msg, $data = null)
    {
        return json([
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ]);
    }
}
