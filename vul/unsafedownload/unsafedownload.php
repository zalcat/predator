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
</head>
<body>

<!-- 顶部 -->
<div class="layui-bg-cyan">
<blockquote class="layui-elem-quote layui-quote-nm">
<span class="layui-badge-dot layui-bg-green"></span>
    <span class="layui-badge layui-bg-blue">unsafe filedownload</span>
    <span class="layui-badge-rim">概述</span>
</blockquote> 
</div>
<div>

<!-- 内容信息 -->
<fieldset class="layui-elem-field">
  <legend>不安全的文件下载-概述</legend>
  <div class="layui-field-box">

<blockquote class="layui-elem-quote">
<h4>文件下载功能在很多web系统上都会出现，一般我们当点击下载链接，便会向后台发送一个下载请求，
    一般这个请求会包含一个需要下载的文件名称，<br>
后台在收到请求后会开始执行下载代码，将该文件名对应的文件response给浏览器，从而完成下载。<br>
如果后台在收到请求的文件名后,将其直接拼进下载文件的路径中而不对其进行安全判断的话，则可能会引发不安全的文件下载漏洞。<br />
此时如果 攻击者提交的不是一个程序预期的的文件名，而是一个精心构造的路径比如../../../etc从而导致后台敏感信息(密码文件、源代码等)被下载。<br><br>

                所以，在设计文件下载功能时，如果下载的目标文件是由前端传进来的，则一定要对传进来的文件进行安全考虑。<br>
                切记：所有与前端交互的数据都是不安全的，不能掉以轻心！<br>
            </h4>

            <br>
</blockquote>
<blockquote class="layui-elem-quote layui-quote-nm">
                <h4>你可以通过“Unsafe file download”对应的测试栏目，来进一步的了解该漏洞。<br></h4>
</blockquote>
  </div>
</fieldset>

</body>
</html>
