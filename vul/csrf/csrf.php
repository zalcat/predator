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
    
<div class="layui-bg-cyan">
<blockquote class="layui-elem-quote layui-quote-nm">
<span class="layui-badge-dot layui-bg-green"></span>
    <span class="layui-badge layui-bg-blue">CSRF</span>
    <span class="layui-badge-rim">概述</span>
    </blockquote> 

</div>

<!-- 内容信息 -->
<fieldset class="layui-elem-field layui-field-title">
  <legend>CSRF(跨站请求伪造)概述</legend>
  <div class="layui-field-box">
    <blockquote class='layui-elem-quote layui-quote-nm'>
        <h4>CSRF的攻击场景中攻击者会伪造一个请求（这个请求一般是一个链接），然后欺骗目标用户进行点击，用户一旦点击了这个请求，整个攻击就完成了。所以CSRF攻击也成为"one click"攻击。 很多人搞不清楚CSRF的概念，
            甚至有时候会将其和XSS混淆,更有甚者会将其和越权问题混为一谈,这都是对原理没搞清楚导致的。</h4>
    </blockquote>
<blockquote class="layui-elem-quote ">
    <h3>CSRF攻击攻击原理及过程如下：</h3>
    <h4>
        1. 用户C打开浏览器，访问受信任网站A，输入用户名和密码请求登录网站A；<br>

        2.在用户信息通过验证后，网站A产生Cookie信息并返回给浏览器，此时用户登录网站A成功，可以正常发送请求到网站A；<br>

        3. 用户未退出网站A之前，在同一浏览器中，打开一个TAB页访问网站B；<br>

        4. 网站B接收到用户请求后，返回一些攻击性代码，并发出一个请求要求访问第三方站点A；<br>

        5. 浏览器在接收到这些攻击性代码后，根据网站B的请求，在用户不知情的情况下携带Cookie信息，向网站A发出请求。
        网站A并不知道该请求其实是由B发起的，所以会根据用户C的Cookie信息以C的权限处理该请求，
        导致来自网站B的恶意代码被执行。 <br><br>

       可以看出CSRF与XSS的区别：CSRF是借用户的权限完成攻击，攻击者并没有拿到用户的权限，
            而XSS是直接盗取到了用户的权限，然后实施破坏。
    </h4>
    
</blockquote>
    <blockquote class="layui-elem-quote ">
            <h3>防御CSRF攻击：</h3>
            <h4>   
            => 目前防御 CSRF 攻击主要有三种策略：<br>
            => 验证 HTTP Referer 字段；<br>
            => 在请求地址中添加 token 并验证；<br>
            => 在 HTTP 头中自定义属性并验证。<br>
            你可以通过CSRF对应的测试栏目，来进一步的了解该漏洞。~
            </h4>

    </blockquote>
  </div>
</fieldset>

</body>
</html>
