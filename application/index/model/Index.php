<?php
namespace app\index\model;

use think\Db;
use think\Model;
use think\Validate;
use think\Cache;

class Index extends Model
{
    public function index($user_id){
        $res = Db::table('user_role')
                ->field('role_id')
                ->where('user_id',$user_id)
                ->find();
        //根据用户角色查询权限
        $data = Db::table('role_access r')
                    ->field('access_name,a.id,url')
                    ->join('access a','r.access_id = a.id')
                    ->where('role_id','in',$res['role_id'])
                    ->select();
        //var_dump($data);
        return json_encode($data);
        
    }
}