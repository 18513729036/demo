<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
        echo "这里是后台";
    }

    public function info()
    {
        echo "heelo";
    }
}
