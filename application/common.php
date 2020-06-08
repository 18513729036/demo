<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 *封装json返回格式
 * @Author   王雪
 * @DateTime 2020-06-07T22:32:14+0800
 * @param    [type]                   $code    [返回码]
 * @param    [type]                   $message [返回信息]
 * @param    [type]                   $success [是否成功]
 * @param    [type]                   $data    [返回json字符串]
 */
function ReturnJsonData($code = null, $message = null, $success = false, $data = null) {
	if ($data == null) {
		$data = [
			'code' => $code,
			'message' => $message,
			'success' => $success,
		];
	} else {
		$data = [
			'code' => $code,
			'message' => $message,
			'success' => $success,
			'data' => ($data),
		];
	}
	return json_encode($data, JSON_UNESCAPED_UNICODE);
}

/*function returnJson($code = 0, $message = "", $data = []) {
return $this->result($data, $code = $code, $msg = $message, $type = 'json');
}*/
