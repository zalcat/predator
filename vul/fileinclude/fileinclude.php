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
    <span class="layui-badge layui-bg-blue">file include</span>
    <span class="layui-badge-rim">概述</span>
</blockquote> 
</div>

<fieldset class="layui-elem-field layui-field-title">
  <legend>File Inclusion(文件包含漏洞)概述</legend>
  <div class="layui-field-box">
  <blockquote class='layui-elem-quote'>
  <h4>文件包含漏洞是"代码注入"的一种，包含即执行，可干的坏事可想而知，看i春秋总结的危害有如下几种：</h4><br>
        <h3>PHP包含漏洞结合上传漏洞；<br>
            PHP包含读文件；<br>
            PHP包含写文件；<br>
            PHP包含日志文件；<br>
            PHP截断包含；<br>
            PHP内置伪协议利用。<br>
        </h3>
        </blockquote>
<blockquote class="layui-elem-quote layui-quote-nm">
    <h4>PHP中文件包含函数有以下四种：</h4>
    <h3>
        require()<br>
        require_once()<br>
        include()<br>
        include_once()<br><br>

        include和require区别主要是，include在包含的过程中如果出现错误，会抛出一个警告，程序继续正常运行；而require函数出现错误的时候，会直接报错并退出程序的执行。<br>
        而include_once()，require_once()这两个函数，与前两个的不同之处在于这两个函数只包含一次，适用于在脚本执行期间同一个文件有可能被包括超过一次的情况下，你想确保它只被包括一次以避免函数重定义，变量重新赋值等问题。<br><br>

        最简单的漏洞代码：< ? php include($_GET[file]);? ><br>

        当使用这4个函数包含一个新的文件时，该文件将作为PHP代码执行，PHP的内核并不会在意被包含的文件是什么类型。即你可以上传一个含shell的txt或jpg文件，包含它会被当作PHP代码执行（图马）。<br>
</h3>
</blockquote>
<blockquote class='layui-elem-quote'>
    <h3>1.本地文件包含漏洞(LFI)：</h3><br>
    <h4>仅能够对服务器本地的文件进行包含，由于服务器上的文件并不是攻击者所能够控制的，<br>
        因此该情况下，攻击着更多的会包含一些 固定的系统配置文件，从而读取系统敏感信息。<br>
    很多时候本地文件包含漏洞会结合一些特殊的文件上传漏洞，从而形成更大的威力。<br></h4><br>

    <h3>2.远程文件包含漏洞(RFI)：</h3><br>
    <h4>能够通过url地址对远程的文件进行包含，这意味着攻击者可以传入任意的代码。 <br> 
因此，在web应用系统的功能设计上尽量不要让前端用户直接传变量给包含函数，如果非要这么做，也一定要做严格的白名单策略进行过滤。<br><br></h4>
    <h3>你可以通过“File Inclusion”对应的测试栏目，来进一步的了解该漏洞~。
    </h3>
</blockquote>
  </div>
</fieldset>


</body>
</html>

