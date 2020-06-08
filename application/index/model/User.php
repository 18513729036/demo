<?php

namespace app\index\model;

use think\Db;
use think\Model;

/*
用户管理model
 */
class User extends Model {

	public function getStatusAttr($val) {
		$is_admins = ['0' => '不是管理员', '1' => '是管理员'];
		return $is_admins[$val];
	}
	/*
		       获取所有用户信息
	*/
	public static function getUserList() {
		$user_list = Db::table('user')->select();
		return $user_list;
	}

	public static function getOneUser($uid) {
		$user = User::where(['id' => $uid])->find();
		return $user;
	}

	public static function is_login($username, $password) {
		//var_dump($username);die;
		$user = Db::table('user')->where(['username' => $username, 'password' => $password])->find();
		if (empty($user)) {
			return false;
		} else {
			return $user;
		}
	}

	public static function updateOne($id, $where) {
		return Db::table('user')->where('id', $id)->update($where);
	}

}