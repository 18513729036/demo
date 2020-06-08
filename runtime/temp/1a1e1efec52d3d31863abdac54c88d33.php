<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:83:"/Users/mac/Desktop/demo/tp5/public/../application/index/view/users/user_update.html";i:1591586479;s:62:"/Users/mac/Desktop/demo/tp5/application/index/view/layout.html";i:1591165379;s:69:"/Users/mac/Desktop/demo/tp5/application/index/view/public/header.html";i:1591509237;s:67:"/Users/mac/Desktop/demo/tp5/application/index/view/public/menu.html";i:1591509276;}*/ ?>
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
    <title>用户修改页面</title>
</head>

<body>
<div id="content">
    用户修改页面
    <form method="post" id="ff">
        <input type="hidden" value="<?php echo $data['id']; ?>" id="id" name="id">
        用户名：<input type="text" id="username" name="username"  value="<?php echo $data['username']; ?>">
        原密码<input type="password"  name="password" id="password" onblur="checkPwd(<?php echo $data['password']; ?>)" value=""><span id="tishi"></span>
        新密码<input type="password" name="new_password" id="new_password" value=""> <span id="tishi2"></span>
        <input type="submit" id="upd" value="提交">
    </form>
</div>
<script>
$("#ff").submit(function(){
    var tishi = $('#tishi').text();
    var tishi2 = $('#tishi2').text();
    if(tishi || tishi2){
        return false;
    } 
    $.post(
        "<?php echo url('users/do_update'); ?>",
        {
            'id':$('#id').val(),
            'username':$('#username').val(),
            'password':$('#new_password').val()
        },

        function(res){
            var data = JSON.parse(res);
            if(data.code=="200"){
                alert(data.message);
                window.location.href="<?php echo url('users/index'); ?>";
            }else{
                alert(data.message);
            }
        }
        );
});

    //检测密码是否正确
    function checkPwd(pwd){
        var pass = $('#password').val();
        if(pass && pass!=pwd){
            $('#tishi').html('输入密码错误');
        }else if(pwd==pass){
            $('#tishi').html('');
        }
    }
    $('#new_password').blur(function(){
        var newpwd = $(this).val();
        //var pass = $('#password').val();
        var pass = "<?php echo $data['password']; ?>";
        // alert(pass);
        // alert(newpwd);
        if(newpwd == pass){
            $('#tishi2').html('与原密码一致');
        }else{
            $('#tishi2').html('');
        }
    });


    //p
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