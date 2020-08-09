<?php

$ROOT_DIR =  "../../../";

include_once $ROOT_DIR."inc/config.inc.php";
include_once $ROOT_DIR."inc/function.php";
include_once $ROOT_DIR."inc/mysql.inc.php";

$link=connect();

//判断是是否登录，如果已经登录，点击时，直接进入会员中心
if(check_csrf_login($link)){
    header("location:token_get.php");
}

$html='';
if(isset($_GET['submit'])){
    if($_GET['username']!=null && $_GET['password']!=null){
        //转义，防注入
        $username=escape($link, $_GET['username']);
        $password=escape($link, $_GET['password']);
        $query="select * from member where username='$username' and pw=md5('$password')";
        $result=execute($link, $query);
        if(mysqli_num_rows($result)==1){
            $data=mysqli_fetch_assoc($result);
            $_SESSION['csrf']['username']=$username;
            $_SESSION['csrf']['password']=sha1(md5($password));
            header("location:token_get.php");
        }else{
            $html.="<p>登录失败,请重新登录</p>";
        }

    }

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
    
<!-- 内容信息 -->
<div class="layui-bg-cyan">
<blockquote class="layui-elem-quote layui-quote-nm">
<span class="layui-badge-dot layui-bg-green"></span>
    <span class="layui-badge layui-bg-blue">CSRF</span>
    <span class="layui-badge-rim">CSRF Token Login</span>
</blockquote> 
</div>

<!-- 填写账号密码表单： -->
<fieldset class="layui-elem-field layui-field-title">
  <legend class="layui-bg-gray">Please Enter Your Information</legend>
  <hr class="layui-bg-green">
  <button style="float:right" id="test5" class="layui-btn"> 点一下提示~</button>
  <blockquote class="layui-elem-quote layui-quote-nm">
  <div class="layui-field-box">
  <form class="layui-form" method="get" action="token_get_login.php">
<div class="layui-form-item">
    <div class="layui-input-inline">   
    <input type="text" name="username" required  lay-verify="required" placeholder="Username" autocomplete="off" class="layui-input">
<br>
<input type="password" name="password" required lay-verify="required" placeholder="******" autocomplete="off" class="layui-input">
<br>
      <input class="submit layui-bg-black layui-btn" name="submit" type="submit" value="Login" /> 
    </div>

</div>
</form>
</div>
</blockquote>
</fieldset>
 
</div>

    <?php echo $html;?>
</div>

<!-- 点击提示 -->
<script>
  $('#test5').on('click', function(){
    layer.tips('<div  class="layui-bg-gray" style="color:#5FB878;border:8px solid #F0F0F0;"><p>这里一共有这么些用户lucy/brown/clark/denny/jerry/mark/lili,密码全部是123456</p></div>', '#test5');
  });</script>

</body>
</html>