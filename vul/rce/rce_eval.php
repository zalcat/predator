<?php
$ROOT_DIR =  "../../";
include_once $ROOT_DIR . "inc/config.inc.php";
include_once $ROOT_DIR . "inc/function.php";
include_once $ROOT_DIR . "inc/mysql.inc.php";


$html='';
if(isset($_POST['submit']) && $_POST['name'] != null){
    if(@!eval($_POST['name'])){
        $html.="<p>你喜欢的字符还挺奇怪的!</p>";
        //phpinfo(); 
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
    <span class="layui-badge layui-bg-blue">rce</span>
    <span class="layui-badge-rim">exec "eval"</span>
</blockquote> 
</div>


<!-- phpinfo(); -->
<!-- 核心表单： -->
<div>
    <fieldset class="layui-elem-field">
  <legend class=>你喜欢什么字符串？</legend>
  <hr class="layui-bg-green">
  <button style="float:right" id="test5" class="layui-btn"> 点一下提示~</button>
  <blockquote class="layui-elem-quote layui-quote-nm">
    <div class="layui-field-box">
    <form method="post">
    <input class="sqli_submit layui-bg-black layui-btn" type="text" name="name" />
    <input class="sqli_submit layui-bg-black layui-btn" type="submit" name="submit" value="提交" />
</form>
</div>
</blockquote>
</fieldset>
    <?php echo $html;?>
</div>


<!-- 点击提示 -->
<script>
  $('#test5').on('click', function(){
    layer.tips('<div  class="layui-bg-gray" style="color:#5FB878;border:8px solid #F0F0F0;"><p>要不先看看可怕的"eval()"函数叭</p></div>', '#test5');
  });</script>

</body>
</html>