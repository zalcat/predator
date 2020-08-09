<?php
$ROOT_DIR ="../../";

class S{
    var $test = "pikachu";
    function __construct(){
        echo $this->test;
    }
}


//O:1:"S":1:{s:4:"test";s:29:"<script>alert('xss')</script>";}
$html='';
if(isset($_POST['o'])){
    $s = $_POST['o'];
    if(!@$unser = unserialize($s)){
        $html.="<blockquote class='layui-elem-quote'>大兄弟,来点劲爆点儿的!</blockquote>
        ";
    }else{
        $html.="<blockquote class='layui-elem-quote layui-quote-nm'>{$unser->test}</blockquote>";
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
    <span class="layui-badge layui-bg-blue">PHP反序列化</span>
    <span class="layui-badge-rim">概述</span>

</blockquote> 
</div>

<!-- 核心表单 -->
<div>

    <fieldset class="layui-elem-field layui-field-title">
    <legend class="layui-bg-gray">这是一个接受序列化数据的api:</legend>
        <hr class="layui-bg-green">
        <button style="float:right" id="test5" class="layui-btn"> 点一下提示~</button>
        <blockquote class="layui-elem-quote layui-quote-nm">
    <div class="layui-field-box">
    <form class="layui-form" method="post">
        <div class="layui-form-item">
        <div class="layui-input-inline">   
            <input class="layui-input" type="text" name="o" />
            <input class="layui-bg-black layui-btn" name="submit" type="submit" value="提交">
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
    layer.tips('<div  class="layui-bg-gray" style="color:#5FB878;border:8px solid #F0F0F0;"><p style="color:#2F4056;">先把PHP序列化和反序列化搞懂了在来玩</p></div>', '#test5');
  });</script>

<?php echo $html;?>


    
</body>
</html>