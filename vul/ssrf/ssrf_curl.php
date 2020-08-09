<?php
$FILEDIR = $_SERVER['PHP_SELF'];
$RD = explode('/',$FILEDIR)[1];
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
    <span class="layui-badge layui-bg-blue">概述</span>
</blockquote> 
</div>

<blockquote class="layui-elem-quote layui-quote-nm"><pre>
<button style=" postion:relative;float:right" id="test5" class="layui-btn"> 点一下提示~</button>
    <a style="color:#337ab7;" href="ssrf_curl.php?url=<?php echo 'http://127.0.0.1/'.$RD.'/vul/ssrf/ssrf_info/info1.php';?>">累了吧,来读一首诗吧</a>
</pre></blockquote>

<?php

//payload:
//file:///etc/passwd  读取文件
//?url=http://www.baidu.com

if(isset($_GET['url']) && $_GET['url'] != null){

    //接收前端URL没问题,但是要做好过滤,如果不做过滤,就会导致SSRF
    $URL = $_GET['url'];
    $CH = curl_init($URL);
    curl_setopt($CH, CURLOPT_HEADER, FALSE);
    curl_setopt($CH, CURLOPT_SSL_VERIFYPEER, FALSE);
    $RES = curl_exec($CH);
    curl_close($CH) ;
    echo $RES;

}
?>

<!-- 点击提示 -->
<script>
  $('#test5').on('click', function(){
    layer.tips('<div  class="layui-bg-gray" style="color:#5FB878;border:8px solid #F0F0F0;"><p style="color:#2F4056;">先了解一下php中curl相关函数的用法吧</p></div>', '#test5');
  });
  </script>

    </body>
</html>
