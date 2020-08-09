<?php
$ROOT_DIR =  "../../";
include_once $ROOT_DIR . "inc/config.inc.php";
include_once $ROOT_DIR . "inc/function.php";
include_once $ROOT_DIR . "inc/mysql.inc.php";



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
    <span class="layui-badge layui-bg-blue">rce</span>
    <span class="layui-badge-rim">概述</span>
</blockquote> 
</div>


<fieldset class="layui-elem-field ">
  <legend>RCE(remote command/code execute)概述</legend>
  <div class="layui-field-boxR">
    <blockquote class='layui-elem-quote'>RCE漏洞，可以让攻击者直接向后台服务器远程注入操作系统命令或者代码，从而控制后台系统。</blockquote>
<blockquote class="layui-elem-quote layui-quote-nm">
    <h3>远程系统命令执行</h3><br/>
            <h4>一般出现这种漏洞，是因为应用系统从设计上需要给用户提供指定的远程命令操作的接口<br />
            比如我们常见的路由器、防火墙、入侵检测等设备的web管理界面上<br />
            一般会给用户提供一个ping操作的web界面，用户从web界面输入目标IP，提交后，后台会对该IP地址进行一次ping测试，并返回测试结果。<br>
            而，如果，设计者在完成该功能时，没有做严格的安全控制，则可能会导致攻击者通过该接口提交“意想不到”的命令，从而让后台进行执行，从而控制整个后台服务器<br>
            <br />
        </h4>
            
</blockquote>

<blockquote class="layui-elem-quote layui-quote-nm">
        <h3>远程代码执行</h3><br/>
        <h4>同样的道理,因为需求设计,后台有时候也会把用户的输入作为代码的一部分进行执行,也就造成了远程代码执行漏洞。<br>
            不管是使用了代码执行的函数,还是使用了不安全的反序列化等等。<br>
            因此，如果需要给前端用户提供操作类的API接口，一定需要对接口输入的内容进行严格的判断，比如实施严格的白名单策略会是一个比较好的方法。<br><br>
            你可以通过RCE对应的测试栏目，来进一步的了解该漏洞。~
        </h4>

            
</blockquote>
  </div>
</fieldset>



</body>
</html>