<?php

$ROOT_DIR =  "../../";
include_once $ROOT_DIR.'inc/function.php';
include_once $ROOT_DIR.'inc/mysql.inc.php';
include_once $ROOT_DIR.'inc/config.inc.php';


$link=connect();
$html='';
if(isset($_GET['submit'])){
    if($_GET['username']!=null && $_GET['password']!=null){
        $username=escape($link, $_GET['username']);
        $password=escape($link, $_GET['password']);



        $query="select * from member where username='$username' and pw=md5('$password')";
        $result=execute($link, $query);
        if(mysqli_num_rows($result)==1){
            $data=mysqli_fetch_assoc($result);
            setcookie('abc[uname]',$_GET['username'],time()+36000);
            setcookie('abc[pw]',md5($_GET['password']),time()+36000);
            //登录时，生成cookie,10个小时有效期，供其他页面判断
            header("location:abc.php");
        }else{
            $query_username = "select * from member where username='$username'";
            $res_user = execute($link,$query_username);
            if(mysqli_num_rows($res_user) == 1){
                $html.="<p>您输入的密码错误</p>";

            }else{
                $html.="<p>您输入的账号错误</p>";
            }

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
    <span class="layui-badge layui-bg-blue">敏感信息泄露</span>
    <span class="layui-badge-rim">find abc</span>

</blockquote> 
</div>

<div>
<!-- 填写账号密码表单： -->
    <fieldset class="layui-elem-field layui-field-title">
    <legend class="layui-bg-gray">Please Enter Your Information</legend>
        <hr class="layui-bg-green">
        <button style="float:right" id="test5" class="layui-btn"> 点一下提示~</button>
        <blockquote class="layui-elem-quote layui-quote-nm">
    <div class="layui-field-box">
        <form class="layui-form" method="get">
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

<!-- 点击提示 -->
<script>
  $('#test5').on('click', function(){
    layer.tips('<div  class="layui-bg-gray" style="color:#5FB878;border:8px solid #F0F0F0;"><p style="color:#2F4056;">找找看,很多地方都漏点了...</p></div>', '#test5');
  });</script>

<?php echo $html;?>


    
</body>
</html>

