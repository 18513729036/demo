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
	/**
	 *分页获取所有用户列表
	 * @Author   王雪
	 * @DateTime 2020-06-08T11:37:37+0800
	 * @return   [type]                   [description]
	 */
	public static function getUserList($pageSize = 2) {
		/*$userlist = model('User')
					->where("name like '%{$name}%'")
					->paginate(
						12,
						false,
						['query' => request()->param(),]
		);*/
		$data['data'] = User::paginate($pageSize);
		$data['pageSize'] = $pageSize;
		//var_dump($data->render());
		//$page = $news->render();
		return $data;
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