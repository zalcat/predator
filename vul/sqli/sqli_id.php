<?php
$ROOT_DIR =  "../../";
include_once $ROOT_DIR."inc/config.inc.php";
include_once $ROOT_DIR."inc/function.php";
include_once $ROOT_DIR."inc/mysql.inc.php";

$link=connect();
$html='';

if(isset($_POST['submit']) && $_POST['id']!=null){
    //这里没有做任何处理，直接拼到select里面去了,形成Sql注入
    $id=$_POST['id'];
    $query="select username,email from member where id=$id";
    $result=execute($link, $query);
    //这里如果用==1,会严格一点
    if(mysqli_num_rows($result)>=1){
        while($data=mysqli_fetch_assoc($result)){
            $username=$data['username'];
            $email=$data['email'];
            $html.="<p class='notice'>hello,{$username} <br />your email is: {$email}</p>";
        }
    }else{
        $html.="<p class='notice'>您输入的user id不存在，请重新输入！</p>";
    }
}



?>

<!DOCTYPE html>
<html>
<head>
    
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
    <span class="layui-badge layui-bg-blue">SQL-Inject</span>
    <span class="layui-badge-rim">数字型注入</span>

</div>


    

<fieldset class="layui-elem-field layui-field-title">
  <legend class="layui-bg-gray">city select</legend>
  <hr class="layui-bg-green">
  <button style="float:right" id="test5" class="layui-btn"> 点一下提示~</button>
  <blockquote class="layui-elem-quote layui-quote-nm">
    <div class="layui-field-box">
    <form class="sqli_id_form" method="post">
    <div class="layui-form-item">
        <select name="id" lay-verify="required">
            <option value="1">上海</option>
            <option value="2">广州</option>
            <option value="3">深圳</option>
            <option value="4">杭州</option>
            <option value="5">赣州</option>
            <option value="6">北京</option>
        </select>

    </div>
    <input class="sqli_submit layui-bg-black layui-btn" type="submit" name="submit" value="查询" />
</form>
</div>
</blockquote>
</fieldset>
 
<?php echo $html;?>

<!-- 点击提示 -->
<script>
  $('#test5').on('click', function(){
    layer.tips('<div  class="layui-bg-gray" style="color:#5FB878;border:8px solid #F0F0F0;"><p>不会吧，这也要看提示T_T、</p></div>', '#test5');
  });</script>

<body>
</html>


