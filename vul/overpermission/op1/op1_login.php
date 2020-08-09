<?php
$ROOT_DIR =  "../../../";
include_once $ROOT_DIR.'inc/mysql.inc.php';
include_once $ROOT_DIR.'inc/function.php';
include_once $ROOT_DIR.'inc/config.inc.php';

$link=connect();

//判断是是否登录，如果已经登录，点击时，直接进入会员中心
if(check_op_login($link)){
    header("location:op1_mem.php");
}


$html='';
if(isset($_POST['submit'])){
    if($_POST['username']!=null && $_POST['password']!=null){
        $username=escape($link, $_POST['username']);
        $password=escape($link, $_POST['password']);//转义，防注入
        $query="select * from member where username='$username' and pw=md5('$password')";
        $result=execute($link, $query);
        if(mysqli_num_rows($result)==1){
            $data=mysqli_fetch_assoc($result);
            $_SESSION['op']['username']=$username;
            $_SESSION['op']['password']=sha1(md5($password));
            header("location:op1_mem.php");
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

<!-- 顶部 -->
<div class="layui-bg-cyan">
<blockquote class="layui-elem-quote layui-quote-nm">
<span class="layui-badge-dot layui-bg-green"></span>
    <span class="layui-badge layui-bg-blue">Over Permission</span>
    <span class="layui-badge-rim">op1 login</span>

</blockquote> 
</div>

<!-- 填写账号密码表单： -->

<fieldset class="layui-elem-field layui-field-title">
  <legend class="layui-bg-gray">Please Enter Your Information</legend>
  <hr class="layui-bg-green">
  <button style="float:right" id="test5" class="layui-btn"> 点一下提示~</button>
  <blockquote class="layui-elem-quote layui-quote-nm">
  <div class="layui-field-box">
  <form class="layui-form" method="post">
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
    layer.tips('<div  class="layui-bg-gray" style="color:#5FB878;border:8px solid #F0F0F0;"><p>lucy/123456,lili/123456,clark/123456</p></div>', '#test5');
  });</script>

<?php echo $html;?>


    
</body>
</html>

