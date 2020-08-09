<?php
$ROOT_DIR =  "../../";
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
    <span class="layui-badge layui-bg-blue">概述</span>
</blockquote> 
</div>

<!-- 内容信息 -->

<fieldset class="layui-elem-field layui-field-title">
  <legend>SRF(Server-Side Request Forgery:服务器端请求伪造)</legend>
  <div class="layui-field-box">
    <blockquote class='layui-elem-quote'>
        <h3>PHP中下面函数的使用不当会导致SSRF: <br><br>
        file_get_contents()<br>
        fsockopen()<br>
        curl_exec()<br>
    </h3>
    </blockquote>
<blockquote class="layui-elem-quote layui-quote-nm">
    其形成的原因大都是由于服务端<b>提供了从其他服务器应用获取数据的功能</b>,但又没有对目标地址做严格过滤与限制
    如果一定要通过后台服务器远程去对用户指定("或者预埋在前端的请求")的地址进行资源请求,<b>必须要做好目标地址的过滤</b><br><br>
    你可以通过"XXE"对应的测试栏目，来搞懂问题的原因。~
</blockquote>
  </div>
</fieldset>



  
</body>
</html>
