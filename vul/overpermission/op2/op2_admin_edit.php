<?php
$ROOT_DIR =  "../../../";
include_once $ROOT_DIR.'inc/mysql.inc.php';
include_once $ROOT_DIR.'inc/function.php';
include_once $ROOT_DIR.'inc/config.inc.php';

$link=connect();
// 判断是否登录，没有登录不能访问
//这里只是验证了登录状态，并没有验证级别，所以存在越权问题。
if(!check_op2_login($link)){
    header("location:op2_login.php");
    exit();
}
if(isset($_POST['submit'])){
    if($_POST['username']!=null && $_POST['password']!=null){//用户名密码必填
        $getdata=escape($link, $_POST);//转义
        $query="insert into member(username,pw,sex,phonenum,email,address) values('{$getdata['username']}',md5('{$getdata['password']}'),'{$getdata['sex']}','{$getdata['phonenum']}','{$getdata['email']}','{$getdata['address']}')";
        $result=execute($link, $query);
        if(mysqli_affected_rows($link)==1){//判断是否插入
            header("location:op2_admin.php");
        }else {
            $html.="<p>修改失败,请检查下数据库是不是还是活着的</p>";

        }
    }
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
    <span class="layui-badge-rim">op1 edit</span>

</blockquote> 
</div>

<!-- 核心表单 -->
<fieldset class="layui-elem-field layui-field-title">
  <legend><p>Hi,<?php if($_SESSION['op2']['username']){echo $_SESSION['op2']['username'];} ?>,欢迎来到后台管理中心 | <a style="color:#337ab7;" href="op2_admin_edit.php?logout=1">退出登录</a>|<a style="color:#337ab7"; href="op2_admin.php">回到admin</a></p></legend>
  <blockquote class="layui-elem-quote layui-quote-nm">
  <div class="layui-field-box">
  <form method="get">
  <div class="layui-form-item">
    <label class="layui-form-label">用户:</label>
    <div class="layui-input-inline"> 
    <input class="layui-input" type="text" name="username" placeholder="必填"/>
    </div></div> 

    <div class="layui-form-item"> 
  <label class="layui-form-label">密码:</label>
  <div class="layui-input-inline"> 
  <input class="layui-input" type="password" name="password" placeholder="必填"/>
  </div></div> 

  <div class="layui-form-item"> 
  <label class="layui-form-label">性别:</label>
  <div class="layui-input-inline">
  <input class="layui-input" type="text" name="sex" />
  </div></div>

  
  <div class="layui-form-item"> 
  <label class="layui-form-label">手机:</label>
  <div class="layui-input-inline">
  <input class="layui-input" type="text" name="phonenum" /> 
  </div></div> 

  <div class="layui-form-item"> 
  <label class="layui-form-label">邮箱:</label>
  <div class="layui-input-inline"> 
  <input class="layui-input" type="text" name="address" /></label>
  </div></div> 

  <div class="layui-form-item"> 
  <label class="layui-form-label">地址:</label>
  <div class="layui-input-inline"> 
  <input class="layui-input" type="text" name="address" />
  </div> </div> 

  <div class="layui-form-item"> 
  <label class="layui-form-label"></label>
  <div class="layui-input-inline"> 
  <input class="sub layui-bg-black layui-btn" type="submit" name="submit" value="创建"/>
  </div> </div> 

  </form>
  </div>
</blockquote>
</fieldset>

<!-- 点击提示 -->
<script>
  $('#test5').on('click', function(){
    layer.tips('<div  class="layui-bg-gray" style="color:#5FB878;border:8px solid #F0F0F0;"><p>想知道当超级boss是什么滋味吗</p></div>', '#test5');
  });</script>

<?php echo $html;?>


    
</body>
</html>
