<?php
$html="";
$ROOT_DIR = "../../";
if(isset($_GET['url']) && $_GET['url'] != null){
    $url = $_GET['url'];
    if($url == 'i'){
        $html.="<blockquote class='layui-elem-quote'>好的,看来你是个高调做事，低调做人的人!</blockquote>";
    }else {
        header("location:{$url}");
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
    <span class="layui-badge layui-bg-blue">不安全的url跳转</span>

</blockquote> 
</div>


<div class="vul info">
<fieldset class="layui-elem-field layui-field-title">
<legend >我想知道，你喜欢下面哪一句诗:</legend>
    <blockquote class="layui-elem-quote layui-quote-nm">
    <pre>
    
    <a href="urlredirect.php">-  送君归去愁不尽，又惜空度凉风天。</a>
    <a href="urlredirect.php">-  空山不见人，但闻人语响。</a>
    <a href="urlredirect.php?url=unsafere.php">-! 夕阳无限好，只是近黄昏。</a>
    <a href="urlredirect.php?url=i">-> 事了佛身去，深藏功与名。</a>
        </pre>
        </blockquote>
    </fieldset>

</div>
<?php echo $html;?>


</body>
</html>
