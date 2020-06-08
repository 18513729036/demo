<?php

namespace app\index\model;

use think\Model;
use think\Db;
class RoleAccess extends Model{

    //权限列表
    public static function getAcessList($role_id=''){
        $res = Db::table('role_access')->where(['role_id'=>$role_id])->select();
        return $res;
    }
}