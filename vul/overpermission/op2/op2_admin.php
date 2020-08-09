<?php
$ROOT_DIR =  "../../../";
include_once $ROOT_DIR.'inc/mysql.inc.php';
include_once $ROOT_DIR.'inc/function.php';
include_once $ROOT_DIR.'inc/config.inc.php';

$link=connect();
// 判断是否登录，没有登录不能访问
//如果没登录，或者level不等于1，都就干掉
if(!check_op2_login($link) || $_SESSION['op2']['level']!=1){
    header("location:op2_login.php");
    exit();
}

//删除
if(isset($_GET['id'])){
    $id=escape($link, $_GET['id']);//转义
    $query="delete from member where id={$id}";
    execute($link, $query);
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
    <span class="layui-badge-rim">op1 admin</span>

</blockquote> 
</div>

<!-- 核心表单 -->
<div> 
    <fieldset class="layui-elem-field layui-field-title">
    <legend>用户管理</legend>
    <blockquote class="layui-elem-quote layui-quote-nm">
    <div class="layui-field-box">
    <form class="msg1" method="get">
        <ul>
            <li><a style="color:#337ab7;" href="op2_admin.php">· 查看用户列表</a></li>
            <li><a style="color:#337ab7;" href="op2_admin_edit.php">· 添加用户</a></li>
        </ul>
    </blockquote>
    </div>
    </fieldset>



<div>
<blockquote class="layui-elem-quote "><h4 style="color:#2F4056;">Hi,<?php echo $_SESSION['op2']['username'];?>欢迎来到后台会员管理中心 | <a style="color:#337ab7;" href="op2_admin.php?logout=1">退出登录</a></h4>
</blockquote>
    <table class="layui-table">
        <tr>
            <td>用名</td>
            <td>性别</td>
            <td>手号</td>
            <td>邮箱</td>
            <td>地址</td>
            <td>操作</td>
        </tr>
        <?php
        $query="select * from member";
        $result=execute($link, $query);
        while ($data=mysqli_fetch_assoc($result)){
            $username=htmlspecialchars($data['username']);
            $sex=htmlspecialchars($data['sex']);
            $phonenum=htmlspecialchars($data['phonenum']);
            $email=htmlspecialchars($data['email']);
            $address=htmlspecialchars($data['address']);
            $html=<<<A
    <tr>
        <td>{$username}</td>
        <td>{$sex}</td>
        <td>{$phonenum}</td>
        <td>{$email}</td>
        <td>{$address}</td>
        <td><a href="op2_admin.php?id={$data['id']}">删除</a></td>
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
    layer.tips('<div  class="layui-bg-gray" style="color:#5FB878;border:8px solid #F0F0F0;"><p>想知道当超级boss是什么滋味吗</p></div>', '#test5');
  });</script>


</body>
</html>
