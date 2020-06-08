<?php

namespace app\index\model;
use \think\Model;
use \think\Db;
class UserRole extends Model
{

    //通过用户id获取角色id
    public static function getRoles($uid='')
    {
        if(!empty($uid)){
            $roles =Db::table('user_role')->where('user_id',$uid)->select();
        }else{
             $roles =Db::table('user_role')->select();
            
        }
        return $roles;
    }
}