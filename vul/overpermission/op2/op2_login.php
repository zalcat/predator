<?php
$ROOT_DIR =  "../../../";
include_once $ROOT_DIR.'inc/mysql.inc.php';
include_once $ROOT_DIR.'inc/function.php';
include_once $ROOT_DIR.'inc/config.inc.php';
$link=connect();

$html="";
if(isset($_POST['submit'])){
    if($_POST['username']!=null && $_POST['password']!=null){
        $username=escape($link, $_POST['username']);
        $password=escape($link, $_POST['password']);//转义，防注入
        $query="select * from users where username='$username' and password=md5('$password')";
        $result=execute($link, $query);
        if(mysqli_num_rows($result)==1){
            $data=mysqli_fetch_assoc($result);
            if($data['level']==1){//如果级别是1，进入admin.php
                $_SESSION['op2']['username']=$username;
                $_SESSION['op2']['password']=sha1(md5($password));
                $_SESSION['op2']['level']=1;
                header("location:op2_admin.php");
            }
            if($data['level']==2){//如果级别是2，进入user.php
                $_SESSION['op2']['username']=$username;
                $_SESSION['op2']['password']=sha1(md5($password));
                $_SESSION['op2']['level']=2;
                header("location:op2_user.php");
            }

        }else{
            //查询不到，登录失败
            $html.="<p>登录失败,请重新登录</p>";

        }

    }

}

//只要退到这个界面就先清除登录状态，需要重新登录
//session_unset();
//session_destroy();
//setcookie(session_name(),'',time()-3600,'/');

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
    <span class="layui-badge-rim">op2 login</span>

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
    layer.tips('<div  class="layui-bg-gray" style="color:#5FB878;border:8px solid #F0F0F0;"><p>这里有两个用户admin/123456,jonathan/000000,admin是超级boss</p></div>', '#test5');
  });</script>

<?php echo $html;?>


    
</body>
</html>