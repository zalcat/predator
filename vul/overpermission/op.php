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
    <span class="layui-badge layui-bg-blue">over permission</span>
    <span class="layui-badge-rim">概述</span>
</blockquote> 
</div>
<div>

<!-- 内容信息 -->

<fieldset class="layui-elem-field layui-field-title">
  <legend>越权小概</legend>
  <div class="layui-field-box">
    <blockquote class='layui-elem-quote'>
        <h4> 如果使用A用户的权限去操作B用户的数据，A的权限小于B的权限，如果能够成功操作，则称之为越权操作。<br />
            越权漏洞形成的原因是后台使用了 不合理的权限校验规则导致的。<br />
            一般越权漏洞容易出现在权限页面（需要登录的页面）增、删、改、查的的地方，当用户对权限页面内的信息进行这些操作时，后台需要对
            对当前用户的权限进行校验，看其是否具备操作的权限，从而给出响应，而如果校验的规则过于简单则容易出现越权漏洞。<br />
</h4><br>
       <h4>因此，在在权限管理中应该遵守：<br />
            1.使用最小权限原则对用户进行赋权;<br />
            2.使用合理（严格）的权限校验规则;<br />
            3.使用后台登录态作为条件进行权限判断,别动不动就瞎用前端传进来的条件;<br /></h4>
            
</blockquote>            
<blockquote class="layui-elem-quote layui-quote-nm">
            你可以通过“Over permission”对应的测试栏目，来进一步的了解该漏洞。<br />
</blockquote>

  </div>
</fieldset>


</body>
</html>
