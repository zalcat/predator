<?php
$ROOT_DIR =  "../../../";

include_once $ROOT_DIR."inc/config.inc.php";
include_once $ROOT_DIR."inc/function.php";
include_once $ROOT_DIR."inc/mysql.inc.php";
$link=connect();

if(!check_csrf_login($link)){
//    echo "<script>alert('非授权实体无法查看，请先登入')</script>";
    header("location:csrf_get_login.php");
}

if(isset($_GET['logout']) && $_GET['logout'] == 1){
    session_unset();
    session_destroy();
    setcookie(session_name(),'',time()-3600,'/');
    header("location:csrf_get_login.php");
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
    
<div>

<div class="layui-bg-cyan">
<blockquote class="layui-elem-quote layui-quote-nm">
<span class="layui-badge-dot layui-bg-green"></span>
    <span class="layui-badge layui-bg-blue">CSRF</span>
    <span class="layui-badge-rim">CSRF(get) login</span>
</blockquote> 
</div>

<?php

$username=$_SESSION['csrf']['username'];
$query="select * from member where username='$username'";
$result=execute($link, $query);
$data=mysqli_fetch_array($result);
$name=$data['username'];
$sex=$data['sex'];
$phonenum=$data['phonenum'];
$add=$data['address'];
$email=$data['email'];

$html=<<<A
<fieldset class="layui-elem-field layui-field-title">
  <legend class="per_title">hello,{$name},欢迎来到个人会员中心 | <a class="layui-bg-green" href="csrf_get.php?logout=1">退出登录</a></legend>
  <hr class="layui-bg-green">
  <button style="float:right" id="test5" class="layui-btn"> 点一下提示~</button>

<script>
  $('#test5').on('click', function(){
    layer.tips('get提交'#test5');
  });</script>
  <div class="layui-field-box">
  <blockquote class="layui-elem-quote layui-quote-nm">
  <p>姓名:{$name}</p>
  <p>性别:{$sex}</p>
  <p>手机:{$phonenum}</p>
  <p>住址:{$add}</p> 
  <p>邮箱:{$email}</p> 
  <a class="layui-bg-green" href="csrf_get_edit.php">修改个人信息</a>
  </blockquote>
  </div>
</fieldset>
A;
            echo $html;
            ?>

</div>

</body>
</html>