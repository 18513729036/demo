<?php

namespace app\index\model;

use think\Model;
use think\Db;

class Access extends Model{
    //通过access_ids获取权限列表
    public static function getUrls($ids=[]){
        $res = Db::table('access')->field('url')->where('id','in',$ids)->select();
        $urls = [];
        foreach ($res as $key => $value) {
            $urls[] =$value['url'];
        }
        return $urls;
    }

    //通过access_ids获取权限列表
    public static function getUrlnames($ids=[]){    
        $res = Db::table('access')->where('url','in',$ids)->select();
        //var_dump($res);die;
        return $res;
    }
}