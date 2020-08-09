<?php
$ROOT_DIR =  "../../../";
include_once $ROOT_DIR.'inc/mysql.inc.php';
include_once $ROOT_DIR.'inc/function.php';
include_once $ROOT_DIR.'inc/config.inc.php';

$link=connect();
// 判断是否登录，没有登录不能访问
if(!check_op2_login($link)){
    header("location:op2_login.php");
}

if(isset($_GET['logout']) && $_GET['logout'] == 1){
    session_unset();
    session_destroy();
    setcookie(session_name(),'',time()-3600,'/');
    header("location:op2_login.php");

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="<?php echo $ROOT_DIR;?>layui/css/layui.css" />
<script src="<?php echo $ROOT_DIR;?>layui/layui.js"></script>
<script src="<?php echo $ROOT_DIR;?>layui/layer/layer.js"></script>
<script src="<?php echo $ROOT_DIR;?>layui/jquery-3.2.1/jquery-3.2.1.js"></script>

</head>
<body>


<!-- 顶部 -->
<div class="layui-bg-cyan">
<blockquote class="layui-elem-quote layui-quote-nm">
<span class="layui-badge-dot layui-bg-green"></span>
    <span class="layui-badge layui-bg-blue">Over Permission</span>
    <span class="layui-badge-rim">op1 user</span>

</blockquote> 
</div>




<!-- 核心表单 -->
<div> 
    <fieldset class="layui-elem-field layui-field-title">
    <legend><p>欢迎来到个人信息中心  | <a style="color:bule;" href="op1_mem.php?logout=1">退出登录</a></legend>
    <form class="msg1" method="get">
    <div class="layui-field-box">
    <div class="layui-input-inline">   
            <input class="submit layui-bg-black layui-btn" type="hidden" name="username" value="<?php echo $_SESSION['op']['username']; ?>" />
            <input class="submit layui-bg-black layui-btn" type="submit" name="submit" value="点击查看个人信息" /><br>
        </div>
    </div>
    </fieldset>
        <p class="admin_title">欢迎来到后台管理中心,您只有查看权限! | <a style="color:#337ab7;" href="op2_user.php?logout=1">退出登录</a></p>
    <table class="table table-bordered table-striped">
        <tr>
            <td>用名</td>
            <td>性别</td>
            <td>手机</td>
            <td>邮箱</td>
            <td>地址</td>
        </tr>
        <?php
        $query="select * from member";
        $result=execute($link, $query);
        while ($data=mysqli_fetch_assoc($result)){
            $html=<<<A
    <tr>
        <td>{$data['username']}</td>
        <td>{$data['sex']}</td>
        <td>{$data['phonenum']}</td>
        <td>{$data['email']}</td>
        <td>{$data['address']}</td>
    </tr>
A;

    echo $html;
        }
    ?>

        </table>
</div>


<!-- 点击提示 -->
<script>
  $('#test5').on('click', function(){
    layer.tips('<div  class="layui-bg-gray" style="color:#5FB878;border:8px solid #F0F0F0;"><p>想知道当超级boss是什么滋味吗6</p></div>', '#test5');
  });</script>

<?php echo $html;?>


    
</body>
</html>
