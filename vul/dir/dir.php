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
    <span class="layui-badge layui-bg-blue">目录遍历</span>
    <span class="layui-badge-rim">概述</span>

</blockquote> 
</div>


<!-- 内容信息 -->

<fieldset class="layui-elem-field layui-field-title">
  <legend>目录遍历漏洞概述</legend>
  <div class="layui-field-box">
    <blockquote class='layui-elem-quote'>
        <h4>
        当用户发起一个前端的请求时，便会将请求的这个文件的值(比如文件名称)传递到后台，后台再执行其对应的文件。<br>
        在这个过程中，如果后台没有对前端传进来的值进行严格的安全考虑，则攻击者可能会通过“../”这样的手段让后台打开或者执行一些其他的文件。<br>
        从而导致后台服务器上其他目录的文件结果被遍历出来，形成目录遍历漏洞<br><br> </h4>
    
    </blockquote>
<blockquote class="layui-elem-quote layui-quote-nm">
    <h4> 需要区分一下的是,如果你通过不带参数的url（比如：http://xxxx/doc）列出了doc文件夹里面所有的文件，这种情况，我们成为敏感信息泄露。
        而并不归为目录遍历漏洞。<br>你可以通过"../../"对应的测试栏目，来进一步的了解该漏洞。</h4>
</blockquote>
  </div>
</fieldset>


</body>
</html>
