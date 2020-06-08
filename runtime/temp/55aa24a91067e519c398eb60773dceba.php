<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:77:"/Users/mac/Desktop/demo/tp5/public/../application/index/view/users/index.html";i:1591600702;s:62:"/Users/mac/Desktop/demo/tp5/application/index/view/layout.html";i:1591165379;s:69:"/Users/mac/Desktop/demo/tp5/application/index/view/public/header.html";i:1591601257;s:67:"/Users/mac/Desktop/demo/tp5/application/index/view/public/menu.html";i:1591509276;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>thead</title>
    <link href="/static/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="/static/js/bootstrap.min.js"></script>
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js">
</script>
<style>
    body {
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
      font-size: 14px;
      line-height: 1.428571429;
      color: #333333;
      background-color: #ffffff;
    }
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
    <div id="header">/static/js  
        <span id="usern">用户名：<a href="javascript:void" onclick="usercli()"><?php echo $user['username']; ?></a></span>
        <a href="<?php echo url('login_out'); ?>" id="loginout">退出</a>
    </div>
<script>
    function usercli(){
        alert("<?php echo $user['username']; ?>");
    }
</script>
<script src="js/bootstrap.min.js"></script> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title></title>
</head>
<body>
    <div id="content">
        用户展示列表
    <form>
        <table border='1px solid red' width='500px'>
            <th>用户名</th>
            <th>是否管理员</th>
            <th>密码</th>
            <th>修改</th>
            
            <?php foreach($userlist['data'] as $vo): ?>
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
<ul class="pagination">
  <li><a href="#">&laquo;</a></li>
  <li><a href="#">1</a></li>
  .......
</ul>
        <div id="page">

            <?php echo $userlist['data']->render(); ?>
            当前页数<br />
            每页显示条<input type="text" name="pageSize" id="pageSize" value="<?php echo $userlist['pageSize']; ?>" onblur="page()">条数据
        </div>
    </form>
    </div>
<script type="text/javascript">
    function updateId(id){
        // console.log(id);
        window.location.href="<?php echo url('users/user_update'); ?>?id="+id;
    }

    function page(){
        var pageSize = $('#pageSize').val();//每页多少条
        window.location.href="<?php echo url('users/index'); ?>?pageSize="+pageSize;
        alert(pageSize);
    }
    /**
     * 分页失去焦点的时候
     * @Author   王雪
     */
    /*$("#pageSize").blur(function(){
        var pageSize = $('#pageSize').val();//每页多少条
        //alert(pageSize);return;
        $.get(
            "<?php echo url('users/index'); ?>",
            {
                'page':3,
                'pageSize':pageSize
            },
            function(res){
                alert(res);
            }
        );
    });*/
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