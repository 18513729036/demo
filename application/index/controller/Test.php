<?php
namespace app\index\controller; 

use think\Controller; 

class Test extends Controller 
{ 
    protected $beforeActionList = [ 
        'first'=>'', 
        'second' => ['except'=>'hello'], 
        'three' => ['only'=>'hello,data'],
    ];
    protected function first() { 
        echo 'first<br/>'; 
    }

    protected function second() { 
        echo 'second<br/>'; 
    }

    protected function three() { 
        echo 'three<br/>'; 
    }

    public function hello($page) { //first three hello
        return 'hello'.$page;
    }

    public function data() { //first second three data
        return 'data'; 
    } 
}