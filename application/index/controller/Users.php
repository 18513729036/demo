<?php
namespace app\index\controller;

use app\common\controller\Backend;
use app\index\model\User;
use think\Controller;
use think\Session;

/*
用户展示
 */
class Users extends Backend {

	//获取该用户的下面的人
	function index() {
		//调用无限极函数
		$userlist = User::getUserList(Session::get('id'));
		//var_dump($userlist);
		//查询用户页面
		$this->assign('userlist', $userlist);

		//var_dump($userlist);
		return $this->fetch();
	}

	//修改用户展示页面
	public function user_update() {
		$uid = input('get.id');
		//获取该修改用户的信息
		$data = User::getOneUser($uid);
		$this->assign('data', $data);
		return $this->fetch("user_update");
	}

	/**
	 * 用户修改处理页面
	 * @Author   王雪
	 * @DateTime 2020-06-07T22:00:32+0800
	 * @return   [type]                   [description]
	 */
	public function do_update() {
		$id = input('post.id');
		$user['username'] = input('post.username');
		$user['password'] = input('post.password');
		//var_dump($user);die;
		$res = User::updateOne($id, $user);
		if ($res) {
			return ReturnJsonData('200', '用户修改成功', true);
			//return $this->fetch('index/index');
		} else {
			return ReturnJsonData('201', '用户修改失败', false);
			//return $this->redirect('users/index');
		}
	}

	/**
	 * 用户登录验证
	 * @Author   王雪
	 * @DateTime 2020-06-07T21:42:09+0800
	 * @return   登录成功跳转主页面，失败返回登录页面
	 */
	public function handel_login() {
		$username = input('post.username');
		$password = input('post.password');
		$user = $this->do_login($username, $password);
		$this->assign('user', $user);
		if ($user) {
			ReturnJsonData('200', '用户登录成功', true);
			return $this->redirect('index/index');
		} else {
			return $this->redirect('index/login');
		}
		//echo $username . $password;
	}

	/**
	 * 用户删除展示页面
	 * @Author   王雪
	 * @DateTime 2020-06-07T21:42:54+0800
	 * @return   [type]                   [description]
	 */
	public function user_del() {
		$this->index();
		return $this->fetch('users/index');
	}

	/**
	 * 用户删除处理页面
	 * @Author   王雪
	 * @DateTime 2020-06-07T21:56:55+0800
	 * @return   删除成功跳转回来
	 */
	public function handel_user_del() {
		//$id =
	}
}