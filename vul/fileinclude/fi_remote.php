<?php
$ROOT_DIR =  "../../";

$html1='';
if(!ini_get('allow_url_include')){
    $html1.="<p style='color: red'>warning:你的allow_url_include没有打开,请在php.ini中打开了再测试该漏洞,记得修改后,重启中间件服务!</p>";
}
$html2='';
if(!ini_get('allow_url_fopen')){
    $html2.="<p style='color: red;'>warning:你的allow_url_fopen没有打开,请在php.ini中打开了再测试该漏洞,重启中间件服务!</p>";
}
$html3='';
if(phpversion()<='5.3.0' && !ini_get('magic_quotes_gpc')){
    $html3.="<p style='color: red;'>warning:你的magic_quotes_gpc打开了,请在php.ini中关闭了再测试该漏洞,重启中间件服务!</p>";
}

//远程文件包含漏洞,需要php.ini的配置文件符合相关的配置
$html='';
if(isset($_GET['submit']) && $_GET['filename']!=null){
    $filename=$_GET['filename'];
    include "$filename";//变量传进来直接包含,没做任何的安全限制


}

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
    <span class="layui-badge-rim">远程文件包含</span>
</blockquote> 
</div>



<div>
<fieldset class="layui-elem-field layui-field-title">
  <legend class="layui-bg-gray">select</legend>
  <hr class="layui-bg-green">
  <button style="float:right" id="test5" class="layui-btn"> 点一下提示~</button>
  <blockquote class="layui-elem-quote layui-quote-nm">
    <div class="layui-field-box">
    <form class="sqli_id_form" method="get">
    <div class="layui-form-item">
        <select name="filename" lay-verify="required">
    <option value="">--------------</option>
    <option value="include/file1.php">Kobe bryant</option>
    <option value="include/file2.php">Allen Iverson</option>
    <option value="include/file3.php">Kevin Durant</option>
    <option value="include/file4.php">Tracy McGrady</option>
    <option value="include/file5.php">Ray Allen</option>
    </select>
    <input class="sqli_submit layui-bg-black layui-btn" type="submit" name="submit" value="查询" />
</form>
</form>
</div>
</blockquote>
</fieldset>
<?php
echo $html1;
echo $html2;
echo $html3;
echo $html;
?>

</div>


        
<!-- 点击提示 -->
<script>
  $('#test5').on('click', function(){
    layer.tips('<div  class="layui-bg-gray" style="color:#5FB878;border:8px solid #F0F0F0;"><p>先了解一下include()函数的用法吧</p></div>', '#test5');
  });</script>

</body>
</html>
