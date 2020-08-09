<?php
$ROOT_DIR ="../../";

//payload,url编码一下:
$xxepayload1 = <<<EOF
<?xml version = "1.0"?>
<!DOCTYPE ANY [
    <!ENTITY f SYSTEM "file:///etc/passwd">
]>
<x>&f;</x>
EOF;

$xxetest = <<<EOF
<?xml version = "1.0"?>
<!DOCTYPE note [
    <!ENTITY hacker "ESHLkangi">
]>
<name>&hacker;</name>
EOF;

//$xxedata = simplexml_load_string($xxetest,'SimpleXMLElement');
//print_r($xxedata);


//查看当前LIBXML的版本
//print_r(LIBXML_VERSION);

$html='';
//考虑到目前很多版本里面libxml的版本都>=2.9.0了,所以这里添加了LIBXML_NOENT参数开启了外部实体解析
if(isset($_POST['submit']) and $_POST['xml'] != null){


    $xml =$_POST['xml'];
//    $xml = $test;
    $data = @simplexml_load_string($xml,'SimpleXMLElement',LIBXML_NOENT);
    if($data){
        $html.="<pre>{$data}</pre>";
    }else{
        $html.="<blockquote class='layui-elem-quote'>XML声明、DTD文档类型定义、文档元素这些都搞懂了吗?</blockquote>";
    }
}

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
    <span class="layui-badge layui-bg-blue">xxe漏洞</span>

</blockquote> 
</div>

<!-- 核心表单 -->
<div>

    <fieldset class="layui-elem-field layui-field-title">
    <legend class="layui-bg-gray">这是一个接受序列化数据的api:</legend>
        <hr class="layui-bg-green">
        <button style="float:right" id="test5" class="layui-btn"> 点一下提示~</button>
        <blockquote class="layui-elem-quote layui-quote-nm">
    <div class="layui-field-box">
    <form class="layui-form" method="post">
        <div class="layui-form-item">
        <div class="layui-input-inline">   
            <input class="layui-input" type="text" name="xml" />
            <input class="layui-bg-black layui-btn" name="submit" type="submit" value="提交">
        </div>
    </div>
    </form>
    </div>
        </blockquote>
    </fieldset>


</div>


<!-- 点击提示 -->
<script>
  $('#test5').on('click', function(){
    layer.tips('<div  class="layui-bg-gray" style="color:#5FB878;border:8px solid #F0F0F0;"><p style="color:#2F4056;">先把XML声明、DTD文档类型定义、文档元素这些基础知识自己看一下</p></div>', '#test5');
  });</script>

<?php echo $html;?>


</body>
</html>