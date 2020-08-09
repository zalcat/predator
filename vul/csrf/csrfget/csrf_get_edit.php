<?php
$ROOT_DIR =  "../../../";

include_once $ROOT_DIR."inc/config.inc.php";
include_once $ROOT_DIR."inc/function.php";
include_once $ROOT_DIR."inc/mysql.inc.php";
$link=connect();
// 判断是否登录，没有登录不能访问
if(!check_csrf_login($link)){
//    echo "<script>alert('非授权实体无法查看，请先登入')</script>";
    header("location:csrf_get_login.php");
}

$html1='';
if(isset($_GET['submit'])){
    if($_GET['sex']!=null && $_GET['phonenum']!=null && $_GET['add']!=null && $_GET['email']!=null){
        $getdata=escape($link, $_GET);
        $query="update member set sex='{$getdata['sex']}',phonenum='{$getdata['phonenum']}',address='{$getdata['add']}',email='{$getdata['email']}' where username='{$_SESSION['csrf']['username']}'";
        $result=execute($link, $query);
        if(mysqli_affected_rows($link)==1 || mysqli_affected_rows($link)==0){
            header("location:csrf_get.php");
        }else {
            $html1.='修改失败，请重试';

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
    
<div class="layui-bg-cyan">
<blockquote class="layui-elem-quote layui-quote-nm">
<span class="layui-badge-dot layui-bg-green"></span>
    <span class="layui-badge layui-bg-blue">CSRF</span>
    <span class="layui-badge-rim">CSRF(get) login</span>
</blockquote> 
</div>

<div>

    <?php
    //通过当前session-name到数据库查询，并显示其对应信息
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
  <legend>hello,{$name},欢迎来到个人中心 | <a style="color:bule;" href="csrf_get.php?logout=1">退出登录</a></legend>
  <div class="layui-field-box">
  <form method="get">
  <div class="layui-form-item">
    <label class="layui-form-label">姓名:</label>
    <div class="layui-input-inline"> 
    <input class="layui-input" type="text" name="phonenum" required  lay-verify="required"   value="{$name}"  disabled/> 
    </div></div> 

    <div class="layui-form-item"> 
  <label class="layui-form-label">性别:</label>
  <div class="layui-input-inline"> 
  <input type="text" name="sex" required  lay-verify="required"  class="layui-input" value="{$sex}"/>
  </div></div> 

  <div class="layui-form-item"> 
  <label class="layui-form-label">手机:</label>
  <div class="layui-input-inline">
  <input class="phonenum layui-input" type="text" name="phonenum" required  lay-verify="required"   value="{$phonenum}"/> 
  </div></div> 

  <div class="layui-form-item"> 
  <label class="layui-form-label">住址:</label>
  <div class="layui-input-inline"> 
  <input class="add layui-input" type="text" name="add" required  lay-verify="required"   value="{$add}"/>
  </div></div> 

  <div class="layui-form-item"> 
  <label class="layui-form-label">邮箱:</label>
  <div class="layui-input-inline"> 
  <input class="email layui-input" type="text" name="email" required  lay-verify="required"   value="{$email}"/>
  </div> </div> 

  <div class="layui-form-item"> 
  <label class="layui-form-label"></label>
  <div class="layui-input-inline"> 
  <input class="sub layui-bg-black layui-btn" type="submit" name="submit" value="submit"/>
  </div> </div> 

  </form>
  </div>
</fieldset>
A;
    echo $html;
    echo $html1;

?>
</div>


</body>
</html>
