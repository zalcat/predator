<?php

$ROOT_DIR =  "../../";
include_once $ROOT_DIR.'inc/config.inc.php';
include_once $ROOT_DIR.'inc/mysql.inc.php';
$link=connect();
$html="";

//典型的问题,没有验证码,没有其他控制措施,可以暴力破解
if(isset($_POST['submit']) && $_POST['username'] && $_POST['password']){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "select * from users where username=? and password=md5(?)";
    $line_pre = $link->prepare($sql);


    $line_pre->bind_param('ss',$username,$password);

    if($line_pre->execute()){
        $line_pre->store_result();
        if($line_pre->num_rows>0){
            $html.= '<p> login success</p>';

        } else{
            $html.= '<p> username or password is not exists～</p>';
        }

    } else{
        $html.= '<p>执行错误:'.$line_pre->errno.'错误信息:'.$line_pre->error.'</p>';
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

<!-- 顶部 -->
<div class="layui-bg-cyan">
<blockquote class="layui-elem-quote layui-quote-nm">
<span class="layui-badge-dot layui-bg-green"></span>
    <span class="layui-badge layui-bg-blue">暴力破解</span>
    <span class="layui-badge-rim">基于表单的暴力破解</span>

</blockquote> 
</div>

<!-- 核心表单 -->
<fieldset class="layui-elem-field layui-field-title">
  <legend class="layui-bg-gray">Please Enter Your Information</legend>
  <hr class="layui-bg-green">
  <button style="float:right" id="test5" class="layui-btn"> 点一下提示~</button>
  <blockquote class="layui-elem-quote layui-quote-nm">
  <div class="layui-field-box">
  <form class="layui-form" id="bf_client" method="post" action="bf_form.php" onsubmit="return validate();">
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

<!-- 点击提示 -->
<script>
  $('#test5').on('click', function(){
    layer.tips('<div  class="layui-bg-gray" style="color:#5FB878;border:8px solid #F0F0F0;"><p style="color:#2F4056;">这里一共有三个用户：<br>admin/123456<br>jonathan/000000<br>test/abc123</p></div>', '#test5');
  });</script>

<?php echo $html;?>


    
</body>
</html>
