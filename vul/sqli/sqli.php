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
    <span class="layui-badge layui-bg-blue">sqli</span>
    <span class="layui-badge-rim">概述</span>

</blockquote> 
</div>



<!-- 内容信息 -->

<fieldset class="layui-elem-field layui-field-title">
  <legend>Sql Inject(SQL注入)概述</legend>
  <div class="layui-field-box">
    <blockquote class='layui-elem-quote'>
    <b>一个严重的SQL注入漏洞，可能会直接导致一家公司破产！</b><br />
            SQL注入漏洞主要形成的原因是在数据交互中，前端的数据传入到后台处理时，没有做严格的判断，导致其传入的“数据”拼接到SQL语句中后，被当作SQL语句的一部分执行。
            从而导致数据库受损（被脱裤、被删除、甚至整个服务器权限沦陷）。<br />
    </blockquote>
<blockquote class="layui-elem-quote layui-quote-nm">
            <h3>在构建代码时，一般会从如下几个方面的策略来防止SQL注入漏洞：</h3><br />
            <h4>1.对传进SQL语句里面的变量进行过滤，不允许危险字符传入；<br />
            2.使用参数化（Parameterized Query 或 Parameterized Statement）；<br />
            3.还有就是,目前有很多ORM框架会自动使用参数化解决注入问题,但其也提供了"拼接"的方式,所以使用时需要慎重! <br /><br />
            你可以通过“Sql Inject”对应的测试栏目，来进一步的了解该漏洞。<br>
            如果你想深入的了解sql注入，可以查看SQLi-Labs,SQLi-Labs是一个专业的SQL注入练习平台, 类似的专业平台还有upload-lab等。SQL注入在网络上非常热门，
            也有很多技术专家写过非常详细的关于SQL注入漏洞的文章，这里就不在多写了。

        </h4> 
</blockquote>
  </div>
</fieldset>


</body>
</html>