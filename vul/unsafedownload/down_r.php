<?php
$ROOT_DIR =  "../../";
?>

<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" href="<?php echo $ROOT_DIR;?>layui/css/layui.css" />
    <script src="<?php echo $ROOT_DIR;?>layui/layui.js"></script>
    <script src="<?php echo $ROOT_DIR;?>layui/layer/layer.js"></script>
    <script src="<?php echo $ROOT_DIR;?>layui/jquery-3.2.1/jquery-3.2.1.js"></script>
    <style>
    img{
        height:108px;
        width:192px;
    }
    </style>
</head>
<body>

<!-- 顶部 -->
<div class="">
<blockquote class="layui-elem-quote layui-quote-nm">
<span class="layui-badge-dot layui-bg-green"></span>
    <span class="layui-badge layui-bg-blue">unsafe filedownload</span>
    <span class="layui-badge-rim">不安全的文件下载</span>
</blockquote> 

<div>
    <fieldset class="layui-elem-field layui-field-title">
  <legend>找找看，有喜欢的图片吗</legend>
  <hr class="layui-bg-green">
  <button style="float:right" id="test5" class="layui-btn"> 点一下提示~</button>
  <blockquote class="layui-elem-quote layui-quote-nm">
  <p class="mes" style="color: #1d6fa6;">Notice:点击dload即可免费下载图片！</p>
  </blockquote>
    <div class="layui-field-box">
    <div  style="width: 600px;">
         <div style="float: left">
            <img src="download/1.jpg" /><br />
            <a href="execdownload.php?filename=1.jpg" >dload</a>
        </div>

        <div style="float: left">
            <img src="download/2.jpg" /><br />
             <a href="execdownload.php?filename=2.jpg" >dload</a>
            </div>

        <div style="float: left">
            <img src="download/3.jpg" /><br />
            <a href="execdownload.php?filename=3.jpg" >dload</a>
        </div>

        <div style="float: left">
            <img src="download/4.jpg" /><br />
            <a href="execdownload.php?filename=4.jpg" >dload</a>
        </div>


        <div style="float: left">
            <img src="download/5.jpg" /><br />
            <a href="execdownload.php?filename=5.jpg" >dload</a>
        </div>

        <div style="float: left">
         <img src="download/6.jpg" /><br />
            <a href="execdownload.php?filename=6.jpg" >dload</a>
        </div>

        <div style="float: left">
            <img src="download/7.jpg" /><br />
            <a href="execdownload.php?filename=pj.png" >dload</a>
        </div>

        <div style="float: left">
            <img src="download/8.jpg" /><br />
            <a href="execdownload.php?filename=8.jpg" >dload</a>
        </div>

        <div style="float: left">
            <img src="download/9.jpg" /><br />
            <a href="execdownload.php?filename=9.jpg" >dload</a>
        </div>

        <div style="float: left">
            <img src="download/10.jpg" /><br />
            <a href="execdownload.php?filename=10.jpg" >dload</a>
        </div>

        <div style="float: left">
            <img src="download/11.jpg" /><br />
            <a href="execdownload.php?filename=11.jp" >dload</a>
        </div>

        <div style="float: left">
            <img src="download/12.jpg" /><br />
            <a href="execdownload.php?filename=12.jpg" >dload</a>
        </div>
        </div>
</div>
</fieldset>
</div>


    <!-- 点击提示 -->
<script>
  $('#test5').on('click', function(){
    layer.tips('<div  class="layui-bg-gray" style="color:#5FB878;border:8px solid #F0F0F0;"><p>都不喜欢吗？听说有第十三张图片，不过要下载得靠你自己</p></div>', '#test5');
  });</script>

</body>
</html>
