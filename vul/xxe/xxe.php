<?php
$ROOT_DIR ="../../";

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
    <span class="layui-badge layui-bg-blue">XXE</span>
    <span class="layui-badge-rim">概述</span>

</blockquote> 
</div>


<!-- 内容信息 -->

<fieldset class="layui-elem-field layui-field-title">
  <legend>XXE -"xml external entity injection"</legend>
  <div class="layui-field-box">
    <blockquote class='layui-elem-quote'>
        <h4>XXE -"xml external entity injection"<br>
    既"xml外部实体注入漏洞"。<br>
    概括一下就是"攻击者通过向服务器注入指定的xml实体内容,从而让服务器按照指定的配置进行执行,导致问题"<br>
    也就是说服务端接收和解析了来自用户端的xml数据,而又没有做严格的安全控制,从而导致xml外部实体注入。<br>
    <br>
    具体的关于xml实体的介绍,网络上有很多,自己动手先查一下。
    <br>
    现在很多语言里面对应的解析xml的函数默认是禁止解析外部实体内容的,从而也就直接避免了这个漏洞。<br>
    在PHP里面解析xml用的是libxml,其在≥2.9.0的版本中,默认是禁止解析xml外部实体内容的。<br>
    <br>
    为了模拟漏洞,通过手动指定LIBXML_NOENT选项开启了xml外部实体解析。</h4>
    
    </blockquote>
<blockquote class="layui-elem-quote layui-quote-nm">你可以通过"XXE"对应的测试栏目，来进一步的了解该漏洞。~</blockquote>
  </div>
</fieldset>

</body>
</html>
