<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/Users/mac/Desktop/demo/tp5/public/../application/index/view/index/login.html";i:1591535048;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录页面</title>
</head>
<body>
    <form action="<?php echo url('index/users/handel_login'); ?>" method="post">
        用户名：<input type="text" name="username"><br />
        密码：<input type="text" name="password">
        <input type="submit" value="提交">
    </form>
</body>
</html>