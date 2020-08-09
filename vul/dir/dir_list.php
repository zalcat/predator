<?php
$ROOT_DIR =  "../../";
$html='';
if(isset($_GET['title'])){
    $filename=$_GET['title'];
    //这里直接把传进来的内容进行了require(),造成问题
    require "dir/$filename";
//    echo $html;
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
    <span class="layui-badge layui-bg-blue">目录遍历</span>

</blockquote> 
</div>

<!-- 内容信息 -->

<fieldset class="layui-elem-field">
  <legend>(1) Tortoise and rabbit race</legend>
  <div class="layui-field-box">
  <a style="color:#337ab7;" href="dir_list.php?title=info1.php">Tortoise and rabbit race</a>
  </div>
</fieldset><br>

<fieldset class="layui-elem-field ">
  <legend>(2) Pigeons and ants</legend>
  <div class="layui-field-box">
  <a style="color:#337ab7;" href="dir_list.php?title=info2.php">Pigeons and ants</a>
</div>
</fieldset>


<!-- 点击提示 -->
<script>
  $('#test5').on('click', function(){
    layer.tips('<div  class="layui-bg-gray" style="color:#5FB878;border:8px solid #F0F0F0;"><p style="color:#2F4056;">多读书,量变到达质变~</p></div>', '#test5');
  });</script>

<?php echo $html;?>


    
</body>
</html>

