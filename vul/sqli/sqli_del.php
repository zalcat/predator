<?php
$ROOT_DIR =  "../../";

include_once $ROOT_DIR . "inc/config.inc.php";
include_once $ROOT_DIR . "inc/function.php";
include_once $ROOT_DIR . "inc/mysql.inc.php";


$link=connect();
$html='';
if(array_key_exists("message",$_POST) && $_POST['message']!=null){
    //插入转义
    $message=escape($link, $_POST['message']);
    $query="insert into message(content,time) values('$message',now())";
    $result=execute($link, $query);
    if(mysqli_affected_rows($link)!=1){
        $html.="<p>出现异常，提交失败！</p>";
    }
}


// if(array_key_exists('id', $_GET) && is_numeric($_GET['id'])){
//没对传进来的id进行处理，导致DEL注入
if(array_key_exists('id', $_GET)){
    $query="delete from message where id={$_GET['id']}";
    $result=execute($link, $query);
    if(mysqli_affected_rows($link)==1){
        header("location:sqli_del.php");
    }else{
        $html.="<p style='color: red'>删除失败,检查下数据库连接！</p>";
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
    <span class="layui-badge layui-bg-blue">sqli</span>
    <span class="layui-badge-rim">delete注入</span>
</blockquote> 
</div>


<!-- 核心表单： -->
<div>
<fieldset class="layui-elem-field layui-field-title">
  <legend class="layui-bg-gray">一个不正经的留言板：</legend>
  <hr class="layui-bg-green">
  <button style="float:right" id="test5" class="layui-btn"> 点一下提示~</button>
  <blockquote class="layui-elem-quote layui-quote-nm">
    <div class="layui-field-box">
    <form method="post">
        <textarea class="layui-bg-black" name="message" placeholder="请输入内容" class="layui-textarea"></textarea>
        <input class="sqli_submit layui-bg-black layui-btn" type="submit" name="submit" value="submit" />
    </form>
</div>
</blockquote>
</fieldset>
</div>

    <?php echo $html;?><br />

<!-- 展示留言板内容 -->
    <div id="show_message">
<blockquote class='layui-elem-quote '>
        <p class="line">留言列表：</p>
        <?php
        $query="select * from message";
        $result=execute($link, $query);
        while($data=mysqli_fetch_assoc($result)){
            //输出转义，防XSS

            $content=htmlspecialchars($data['content'],ENT_QUOTES);
            echo "<p class='con'>{$content}</p><a href='sqli_del.php?id={$data['id']}'>删除</a></br>";
        }
        ?>
</blockquote>
    </div>
</div>


<!-- 点击提示 -->
<script>
  $('#test5').on('click', function(){
    layer.tips('<div  class="layui-bg-gray" style="color:#5FB878;border:8px solid #F0F0F0;"><p>不会吧,留言删除就完事了？</p></div>', '#test5');
  });</script>

</body>
</html>
