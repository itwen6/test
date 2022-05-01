<?php
namespace app\cms\behavior;

class Test 
{
    public function run($params)
    {
        session('___key1', '行为行为执行了');
    }
}