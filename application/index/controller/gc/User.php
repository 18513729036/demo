<?php
namespace app\index\controller\gc;

// use app\common\controller\Backend;

class User
{
    public function index()
    {

        return 'index';
    }

    public function read($id)
    {
        echo $id;
    }
}