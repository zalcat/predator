<?php
$ROOT_DIR ="../../../";
include_once $ROOT_DIR.'inc/mysql.inc.php';
include_once $ROOT_DIR.'inc/function.php';
include_once $ROOT_DIR.'inc/config.inc.php';

$link=connect();
// 判断是否登录，没有登录不能访问
if(!check_op_login($link)){
    header("location:op1_login.php");
}
$html='';
if(isset($_GET['submit']) && $_GET['username']!=null){
    //没有使用session来校验,而是使用的传进来的值，权限校验出现问题,这里应该跟登录态关系进行绑定
    $username=escape($link, $_GET['username']);
    $query="select * from member where username='$username'";
    $result=execute($link, $query);
    if(mysqli_num_rows($result)==1){
        $data=mysqli_fetch_assoc($result);
        $uname=$data['username'];
        $sex=$data['sex'];
        $phonenum=$data['phonenum'];
        $add=$data['address'];
        $email=$data['email'];

        $html.=<<<A
         <hr class="layui-bg-black">
        <fieldset class="layui-elem-field">
<legend>hello,{$uname},你的具体信息如下：</legend>
<blockquote class="layui-elem-quote">
   <p>姓名:{$uname}</p>
   <p>性别:{$sex}</p>
   <p>手机:{$phonenum}</p>    
   <p>住址:{$add}</p> 
   <p>邮箱:{$email}</p> 
</blockquote>
</fieldset>
A;
    }
}


if(isset($_GET['logout']) && $_GET['logout'] == 1){
    session_unset();
    session_destroy();
    setcookie(session_name(),'',time()-3600,'/');
    header("location:op1_login.php");

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
    <span class="layui-badge-rim">op1 member</span>

</blockquote> 
</div>



</div>

<!-- 核心表单 -->
<fieldset class="layui-elem-field layui-field-title">
  <legend><p class="mem_title">欢迎来到个人信息中心  | <a style="color:#337ab7;" href="op1_mem.php?logout=1">退出登录</a></legend>
  <form class="msg1" method="get">
  <div class="layui-field-box">
  <div class="layui-input-inline">   
          <input class="submit layui-bg-black layui-btn" type="hidden" name="username" value="<?php echo $_SESSION['op']['username']; ?>" />
        <input class="submit layui-bg-black layui-btn" type="submit" name="submit" value="点击查看个人信息" /><br>
    </div>
  </div>
</fieldset>
<?php echo $html;?>


</body>
</html>
