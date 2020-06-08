<?php
namespace app\index\controller;

use app\common\controller\Backend;

class Index extends Backend {
	/**
	 * [index description]
	 * @Author                            boby
	 * @DateTime:2020-06-07T17:00:43+0800
	 * @return                            [type] [description]
	 */
	public function index() {
		return $this->view->fetch();
	}
	/**
	 * [登录]
	 * @Author   王雪
	 * @DateTime 2020-06-07T17:20:44+0800
	 * @return   [type][description]
	 */
	public function login() {
		//$this->view->engine->layout(false);
		return $this->fetch();
	}

	public function do_update() {
		$data = User::updateOne();
		var_dump($data);

	}
}
