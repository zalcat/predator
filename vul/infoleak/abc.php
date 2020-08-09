<?php
$ROOT_DIR =  "../../";


if(isset($_GET['logout']) && $_GET['logout'] == '1'){
    setcookie('abc[uname]','');
    setcookie('abc[pw]','');
    header("location:findabc.php");

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
    <span class="layui-badge layui-bg-blue">敏感信息泄露</span>
    <span class="layui-badge-rim">abc</span>

</blockquote> 
</div>


<div>
<fieldset class="layui-elem-field ">
  <legend><a style="color:#337ab7;" href="abc.php?logout=1">退出登陆</a></legend>
  <blockquote class="layui-elem-quote layui-quote-nm">
  <div class="layui-field-box">

   
    
        
    <p>天才的长处特长、短处极短，孔雀开屏最美丽的时候也暴露了屁股，何况张是个执著的人。</p>
    <p>时下的人，尤其是也稍耍弄些文的人，已经有了毛病，读作品不是浸淫作品，不是学人家的精华，</p>
      <p>启迪自家的智慧，而是卖石灰就见不得卖面粉，还没看原著，只听着别人说好了，</p>
      <p>就来气，带气入读，就只有横挑鼻子竖挑眼，这无损天才，却害了自家。张的书是可以收藏了长读的……</p> <br />
                                                    -----贾平凹《读张爱玲》 <br />
  </div>
  </blockquote>
</fieldset>



    
</div>


</body>
</html>

