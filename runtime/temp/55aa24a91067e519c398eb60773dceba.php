<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:77:"/Users/mac/Desktop/demo/tp5/public/../application/index/view/users/index.html";i:1591548582;s:62:"/Users/mac/Desktop/demo/tp5/application/index/view/layout.html";i:1591165379;s:69:"/Users/mac/Desktop/demo/tp5/application/index/view/public/header.html";i:1591509237;s:67:"/Users/mac/Desktop/demo/tp5/application/index/view/public/menu.html";i:1591509276;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>thead</title>
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js">
</script>
<style>
    #header{
        width: 100%;
        height: 100px;
        border: 1px solid red;
        text-align: center;
        line-height: 100px;
    }
    #menu{
        width: 20%;
        height: 900px;
        border: 1px solid red;
    }
    #content{
        width: 70%;
        height: 900px;
        border: 1px solid red;
        position: absolute;
        left: 300px;
        top: 120px;
    }
    #loginout{
        /* display: inline-block; */
        position: absolute;
        right: 30px;
    }
    #usern{
        position: absolute;
        left: 20px;
    }
</style>

</head>
<body>
    <div id="header">
        <span id="usern">用户名：<a href="javascript:void" onclick="usercli()"><?php echo $user['username']; ?></a></span>
        <a href="<?php echo url('login_out'); ?>" id="loginout">退出</a>
    </div>
<script>
    function usercli(){
        alert("<?php echo $user['username']; ?>");
    }
</script> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <div id="content">
        用户展示列表
    
        <table border='1px solid red' width='500px'>
            <th>用户名</th>
            <th>是否管理员</th>
            <th>密码</th>
            <th>修改</th>
            
            <?php foreach($userlist as $vo): ?>
            <tr>
                <td><?php echo $vo['username']; ?> </td>
                <td><?php echo $vo['is_admin']; ?> </td>
                <td><?php echo $vo['password']; ?> </td>
                <td> 
                    <input type="button" onClick="updateId(<?php echo $vo['id']; ?>)" value="修改">
                    <input type="button" value="删除">
                </td>
                
            </tr>
            <?php endforeach; ?>    
        </table>
    </div>
<script type="text/javascript">
    function updateId(id){
        // console.log(id);
        window.location.href="<?php echo url('users/user_update'); ?>?id="+id;
    }
</script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>菜单栏</title>
</head>
<body>
    <div id="menu">
    <?php foreach($urlnames as $vo): ?>
       <a href="<?php echo url($vo['url']); ?>"><?php echo $vo['access_name']; ?></a><br />
    
    <?php endforeach; ?>
    </div>
</body>
</html>