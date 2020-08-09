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
  <legend>不安全的url跳转</legend>
  <div class="layui-field-box">
    <blockquote class='layui-elem-quote'>

   不安全的url跳转问题可能发生在一切执行了url地址跳转的地方。<br>
    如果后端采用了前端传进来的(可能是用户传参,或者之前预埋在前端页面的url地址)参数作为了跳转的目的地,而又没有做判断的话<br>
    就可能发生"跳错对象"的问题。
    <br>
    <br>

    url跳转比较直接的危害是:<br>
    =>钓鱼,既攻击者使用漏洞方的域名(比如一个比较出名的公司域名往往会让用户放心的点击)做掩盖,而最终跳转的确实钓鱼网站。
    <br>
    </blockquote>
<blockquote class="layui-elem-quote layui-quote-nm">这个漏洞比较简单,你可以通过"XXE"对应的测试栏目，来进一步的了解该漏洞。~</blockquote>
  </div>
</fieldset>


</body>
</html>
