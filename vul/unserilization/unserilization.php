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
    <span class="layui-badge layui-bg-blue">PHP反序列化</span>
    <span class="layui-badge-rim">概述</span>

</blockquote> 
</div>


<!-- 内容信息 -->
<fieldset class="layui-elem-field layui-field-title">
  <legend>PHP反序列化-概述</legend>
  <div class="layui-field-box">
<blockquote class="layui-elem-quote layui-quote-nm">
<p>在理解这个漏洞前,你需要先搞清楚php中serialize()，unserialize()这两个函数。</p>
<hr class="layui-bg-blue">
        <h4><b>序列化serialize()</b></h4><br />
        序列化说通俗点就是把一个对象变成可以传输的字符串,比如下面是一个对象:
    <pre>
    class S{
        public $test="pikachu";
    }
    $s=new S(); //创建一个对象
    serialize($s); //把这个对象进行序列化
    序列化后得到的结果是这个样子的:O:1:"S":1:{s:4:"test";s:7:"pikachu";}
        O:代表object
        1:代表对象名字长度为一个字符
        S:对象的名称
        1:代表对象里面有一个变量
        s:数据类型
        4:变量名称的长度
        test:变量名称
        s:数据类型
        7:变量值的长度
        pikachu:变量值
    </pre>
    </blockquote>
    <hr class="layui-bg-blue">
    <blockquote class='layui-elem-quote'>
            <h4><b>反序列化unserialize()</b></h4><br />
            <p>就是把被序列化的字符串还原为对象,然后在接下来的代码中继续使用。</p>
    <pre>
    $u=unserialize("O:1:"S":1:{s:4:"test";s:7:"pikachu";}");
    echo $u->test; //得到的结果为pikachu
    </pre>

            <p>序列化和反序列化本身没有问题,但是如果反序列化的内容是用户可以控制的,且后台不正当的使用了PHP中的魔法函数,就会导致安全问题</p>
            <pre>
        常见的几个魔法函数:
        __construct()当一个对象创建时被调用

        __destruct()当一个对象销毁时被调用

        __toString()当一个对象被当作一个字符串使用

        __sleep() 在对象在被序列化之前运行

        __wakeup将在序列化之后立即被调用

        漏洞举例:

        class S{
            var $test = "pikachu";
            function __destruct(){
                echo $this->test;
            }
        }
        $s = $_GET['test'];
        @$unser = unserialize($a);

        payload:O:1:"S":1:{s:4:"test";s:29:"<?php echo htmlspecialchars("<script>alert('xss')</script>");?>";}

    </pre>
</blockquote>
<blockquote class="layui-elem-quote layui-quote-nm">你可以通过"PHP反序列化"对应的测试栏目，来进一步的了解该漏洞。~</blockquote>
  </div>
</fieldset>

</body>
</html>