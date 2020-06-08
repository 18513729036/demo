<?php
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// [ 后台入口文件 ]
// 使用此文件可以达到隐藏admin模块的效果
// 建议将admin.php改成其它任意的文件名，同时修改config.php中的'deny_module_list',把admin模块也添加进去
// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');

define('BIND_MODULE','admin');

// 加载框架引导文件
require __DIR__ . '/../thinkphp/base.php';

// 绑定到admin模块
\think\Route::bind('admin');

// 设置根url
\think\Url::root('');

// 执行应用
\think\App::run()->send();