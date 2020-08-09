<?php


$ROOT_DIR ="../../";
include_once $ROOT_DIR.'inc/config.inc.php';
include_once $ROOT_DIR.'inc/mysql.inc.php';

$link=connect();
$html="";

if(isset($_POST['submit'])){
    if($_POST['username'] && $_POST['password']) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "select * from users where username=? and password=md5(?)";
        $line_pre = $link->prepare($sql);


        $line_pre->bind_param('ss', $username, $password);

        if ($line_pre->execute()) {
            $line_pre->store_result();
            if ($line_pre->num_rows > 0) {
                $html .= '<p> login success</p>';

            } else {
                $html .= '<p> username or password is not exists～</p>';
            }

        } else {
            $html .= '<p>执行错误:' . $line_pre->errno . '错误信息:' . $line_pre->error . '</p>';
        }


    }else{
        $html .= '<p> please input username and password～</p>';
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
    <span class="layui-badge layui-bg-blue">暴力破解</span>
    <span class="layui-badge-rim">验证码绕过(on client)</span>

</blockquote> 
</div>

<!-- 核心表单 -->
<fieldset class="layui-elem-field layui-field-title">
  <legend class="layui-bg-gray">Please Enter Your Information</legend>
    <hr class="layui-bg-green">
    <button style="float:right" id="test5" class="layui-btn"> 点一下提示~</button>
    <blockquote class="layui-elem-quote layui-quote-nm">
  <div class="layui-field-box">
  <form class="layui-form" id="bf_client" method="post" action="bf_client.php" onsubmit="return validate();">
<div class="layui-form-item">
    <div class="layui-input-inline">   
    <input type="text" name="username" required  lay-verify="required" placeholder="Username" autocomplete="off" class="layui-input">
<br>
<input type="password" name="password" required lay-verify="required" placeholder="******" autocomplete="off" class="layui-input">
<br>
<input class="vcode layui-input " name="vcode" placeholder="验证码" type="text" />
<br>
<input type="text" onclick="createCode()" readonly="readonly" id="checkCode" class="unchanged layui-input layui-bg-cyan" style="width: 100px" />
<br>
<input class="submit layui-bg-black layui-btn" name="submit" type="submit" value="Login" /> 
 
</div>
</div>
</form>
</div>
</blockquote>
</fieldset>


<script language="javascript" type="text/javascript">
    var code; //在全局 定义验证码
    function createCode() {
        code = "";
        var codeLength = 5;//验证码的长度
        var checkCode = document.getElementById("checkCode");
        var selectChar = new Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');//所有候选组成验证码的字符，当然也可以用中文的

        for (var i = 0; i < codeLength; i++) {
            var charIndex = Math.floor(Math.random() * 36);
            code += selectChar[charIndex];
        }
        //alert(code);
        if (checkCode) {
            checkCode.className = "code";
            checkCode.value = code;
        }
    }

    function validate() {
        var inputCode = document.querySelector('#bf_client .vcode').value;
        if (inputCode.length <= 0) {
            alert("请输入验证码！");
            return false;
        } else if (inputCode != code) {
            alert("验证码输入错误！");
            createCode();//刷新验证码
            return false;
        }
        else {
            return true;
        }
    }


    createCode();
</script>



<!-- 点击提示 -->
<script>
  $('#test5').on('click', function(){
    layer.tips('<div  class="layui-bg-gray" style="color:#5FB878;border:8px solid #F0F0F0;"><p style="color:#2F4056;">验证码肯定不在前端,谁会放在那呢,对吧:)</p></div>', '#test5');
  });</script>

<?php echo $html;?>


    
</body>
</html>
