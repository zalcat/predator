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
    <span class="layui-badge layui-bg-blue">敏感信息泄露</span>
    <span class="layui-badge-rim">概述</span>

</blockquote> 
</div>


<!-- 内容信息 -->

<fieldset class="layui-elem-field layui-field-title">
  <legend>敏感信息泄露概述</legend>
  <div class="layui-field-box">
      <blockquote class='layui-elem-quote'>
      <h4>由于后台人员的疏忽或者不当的设计，导致不应该被前端用户看到的数据被轻易的访问到。
            比如：<br />
            ---通过访问url下的目录，可以直接列出目录下的文件列表;<br />
            ---输入错误的url参数后报错信息里面包含操作系统、中间件、开发语言的版本或其他信息;<br />
            ---前端的源码（html,css,js）里面包含了敏感信息，比如后台登录地址、账号密码等;<br /></h4>
</blockquote>            
  <blockquote class="layui-elem-quote layui-quote-nm">  
        类似以上这些情况，我们成为敏感信息泄露。敏感信息泄露虽然一直被评为危害比较低的漏洞，但这些敏感信息往往给攻击着实施进一步的攻击提供很大的帮助,甚至“离谱”的敏感信息泄露也会直接造成严重的损失。
            因此,在web应用的开发上，除了要进行安全的代码编写，也需要注意对敏感信息的合理处理。<br>

            你可以通过“i can see your abc”对应的测试栏目，来进一步的了解该漏洞。

    
</blockquote>
  </div>
</fieldset>


</body>
</html>
