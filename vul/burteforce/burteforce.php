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
    <span class="layui-badge layui-bg-blue">暴力破解</span>
    <span class="layui-badge-rim">概述</span>

</blockquote> 
</div>



<!-- 内容信息 -->

<fieldset class="layui-elem-field layui-field-title">
  <legend>Burte Force（口令破解）概述</legend>
  <div class="layui-field-box">
<blockquote class="layui-elem-quote layui-quote-nm">
            &nbsp&nbsp&nbsp&nbsp
            口令也叫密码，英文名字就是password。口令攻击时网络攻击最简单、最基本的一种形式，黑客攻击目标时通常把破译普通用户口令最为攻击的开始。
            对口令的攻击就是所谓的口令破解，通常需要使用到字典文件，所谓字典文件就是根据用户的各种信息建立一个用户可能使用的口令的列表文件。

            口令攻击类型: <br>
            1- 字典攻击<br>
            2- 强行攻击<br>
            3- 组合攻击<br>
            </blockquote>
            <blockquote class='layui-elem-quote'>
            <p>理论上来说，大多数系统都是可以被暴力破解的，只要攻击者有足够强大的计算能力和时间，所以断定一个系统是否存在暴力破解漏洞，其条件也不是绝对的</p>
            <p>作为用户，想要口令的安全，先要做到有一个好口令(复杂的口令),齐次是要做好口令的安全管理</p><br>
            <p>对于web应用系统，对口令破解的防范程度却决于<b>是否使用了安全的验证码(前端=不安全)，   是否对尝试登录的行为进行判断和限制，
            是否采用双因子认证等等</b></p><br>

            <h3>现在不少网站为了减少用户登入次数，使用用户身份统一管理，就是所谓的单点登入，这时认证安全策略就显得尤为重要<br>
            你可以通过口令破解相应的测试栏目，来了解应用最广泛验证机制的安全问题~
        </h3>


    </blockquote>
  </div>
</fieldset>


    
</body>
</html>
