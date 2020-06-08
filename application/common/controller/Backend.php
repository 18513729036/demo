<?php

namespace app\common\controller;

use app\index\model\Access;
use app\index\model\RoleAccess;
use app\index\model\User;
use app\index\model\UserRole;
use think\Controller;
use think\Exception;
use think\Session;

/**
 * 后台控制器基类
 */
class Backend extends Controller {
	protected $noNeedLogin = ['login', 'login_out'];

	//前置方法，校验
	public function _initialize() {
		$this->is_layout();
		$allow_urls = ['index/Index/login', 'index/Users/handel_login', 'index/Index/login_out'];
		$user = Session::get('user');
		try {
			$method = $this->request->module() . '/' . $this->request->controller() . '/' . $this->request->action();
			if (in_array($method, $allow_urls)) {
				return;
			}
			$urls = $this->checkRole($user, $method); //获取角色
			$urlnames = Access::getUrlnames($urls);
			$this->checkUser($user); //检测用户登录状态
			$this->assign("user", $user);
			$this->assign("urls", $urls);
			$this->assign("urlnames", $urlnames);

		} catch (Exception $e) {
			return $this->returnJson($code = 201, $message = $e->getMessage());
		}
	}

	/**
	检验用户是否登录
	 */
	public function checkUser($user) {
		if (empty($user)) {
			throw new Exception("用户未登录，请先登录");
		}
	}

	//检测用户是否有权限访问
	public function checkRole($user = '', $method = '') {
		$uid = $user['id'];
		if ($user['is_admin'] == '1') {
			$roles = UserRole::getRoles();
		} else {
			$roles = UserRole::getRoles($uid);
		}
		//var_dump($roles);exit;
		$access_ids = [];
		foreach ($roles as $key => $value) {
			//通过role_id 获取所有角色对应的权限 role_access
			$role_id = $value['role_id'];
			//通过role_id拿到权限列表
			$roleAccess = RoleAccess::getAcessList($role_id);
			foreach ($roleAccess as $k => $val) {
				$access_ids[] = $val['access_id'];
			}
		}
		$urls = Access::getUrls($access_ids);
		//判断是不是管理员登录，是的话不验证

		// if (!in_array($method, $urls)) {
		// 	throw new Exception("无权限访问此接口，请联系管理员");
		// }
		return $urls;
	}

	public function returnJson($code = 0, $message = "", $data = []) {
		return $this->result($data, $code = $code, $msg = $message, $type = 'json');
	}

	//判断登录
	public function do_login($username, $password) {

		$user = User::is_login($username, $password);
		if (!empty($user)) {
			Session::set("user", $user);
			return true;
		}
		return false;
	}

	/**
	 * 登出
	 * @Author   王雪
	 * @DateTime 2020-06-08T08:39:20+0800
	 */
	public function login_out() {
		// $this->view->engine->layout(false);
		Session::set('user', '');
		return $this->fetch('index/login');
	}

	/**
	 *关闭layout
	 * @Author   王雪
	 * @DateTime 2020-06-08T09:33:31+0800
	 * @return   void
	 */
	public function is_layout() {
		//var_dump($this->request->action());
		if (in_array($this->request->action(), $this->noNeedLogin)) {
			$this->view->engine->layout(false);
		}
	}
}