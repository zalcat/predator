<?php
$ROOT_DIR =  "../../";
include_once $ROOT_DIR . "inc/config.inc.php";
include_once $ROOT_DIR . "inc/function.php";
include_once $ROOT_DIR . "inc/mysql.inc.php";

$link=connect();

$html='';

if(isset($_GET['submit']) && $_GET['name']!=null){
    $name=$_GET['name'];//这里没有做任何处理，直接拼到select里面去了
    $query="select id,email from member where username='$name'";//这里的变量是字符型，需要考虑闭合
    $result=mysqli_query($link, $query);//mysqi_query不打印错误描述
//     $result=execute($link, $query);
//    $html.="<p class='notice'>i don't care who you are!</p>";
    if($result && mysqli_num_rows($result)==1){
        while($data=mysqli_fetch_assoc($result)){
            $id=$data['id'];
            $email=$data['email'];
            //这里不管输入啥,返回的都是一样的信息,所以更加不好判断
            $html.="<p>i don't care who you are!</p>";
        }
    }else{

        $html.="<p>i don't care who you are!</p>";
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
    <span class="layui-badge-rim">基于时间的盲注</span>
</blockquote> 
</div>


<!-- 核心表单： -->
<div>
    <fieldset class="layui-elem-field layui-field-title">
  <legend class="layui-bg-gray">what's your username?</legend>
  <hr class="layui-bg-green">
  <button style="float:right" id="test5" class="layui-btn"> 点一下提示~</button>
  <blockquote class="layui-elem-quote layui-quote-nm">
    <div class="layui-field-box">
    <form method="get">
    <input class="sqli_submit layui-bg-black layui-btn" type="text" name="name" />
    <input class="sqli_submit layui-bg-black layui-btn" type="submit" name="submit" value="查询" />
</form>
</div>
</blockquote>
</fieldset>
    <?php echo $html;?>
</div>



<!-- 点击提示 -->
<script>
  $('#test5').on('click', function(){
    layer.tips('<div  class="layui-bg-gray" style="color:#5FB878;border:8px solid #F0F0F0;"><p>admin/123456</p></div>', '#test5');
  });</script>

</body>
</html>