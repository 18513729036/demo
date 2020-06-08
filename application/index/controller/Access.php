<?php
namespace app\index\controller;

use think\Controller;
use app\common\controller\Backend;

/*
    权限展示
*/
class Access extends Backend{
    //获取权限列表
    function access_select(){
        echo "权限展示";
    }
}