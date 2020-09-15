<?php
$ROOT_DIR ="";

$html='';
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


<div class="layui-bg-cyan">
        <blockquote class="layui-elem-quote layui-quote-nm">
        <span class="layui-badge-dot layui-bg-green"></span>
        <span class="layui-badge layui-bg-blue">系统介绍</span>
    </blockquote> 
    </div>

    <?php
        include_once 'inc/config.inc.php';
        if(!@mysqli_connect(DBHOST,DBUSER,DBPW,DBNAME)){
            $html.=
                "<p >
                <a href='install.php' style='color:red;'>
                提示:欢迎使用,系统还没有初始化，点击进行初始化安装!
                </a>
            </p>";
        }
        echo $html;
        ?>

<!-- 内容信息 -->

        <fieldset class="layui-elem-field">      
        <div class="layui-field-box">            
        <blockquote class="layui-elem-quote layui-quote-nm">
            <b>Predators是一个基于layui后台模板开发多一个带有漏洞的Web应用系统,
            包含了十多种很常见且威胁巨大的漏洞。</b>
        </blockquote>
        <legend>你能学到的漏洞类型</legend><br>
            <blockquote class='layui-elem-quote '>
                
            <span class="layui-badge-dot layui-bg-cyan"></span>
                Burt Force(口令破解漏洞) <br>
                <span class="layui-badge-dot layui-bg-cyan"></span>
                CSRF(跨站请求伪造)<br>
                <span class="layui-badge-dot layui-bg-cyan"></span>
                SQL-Inject(SQL注入漏洞)<br>
                <span class="layui-badge-dot layui-bg-cyan"></span>
                RCE(远程命令/代码执行)<br>
                <span class="layui-badge-dot layui-bg-cyan"></span>
                Files Inclusion(文件包含漏洞)<br>

                <span class="layui-badge-dot layui-bg-cyan"></span>
                Unsafe file downloads(不安全的文件下载)<br>

                <span class="layui-badge-dot layui-bg-cyan"></span>
                Over Permisson(越权漏洞)<br>
                <span class="layui-badge-dot layui-bg-cyan"></span>
               ../../../(目录遍历)<br>
                <span class="layui-badge-dot layui-bg-cyan"></span>
                I can see your(敏感信息泄露)<br>
                <span class="layui-badge-dot layui-bg-cyan"></span>
               PHP反序列化漏洞<br>
                <span class="layui-badge-dot layui-bg-cyan"></span>
               XXE(XML External Entity attack)<br>
                <span class="layui-badge-dot layui-bg-cyan"></span>
                不安全的URL重定向<br>
                <span class="layui-badge-dot layui-bg-cyan"></span>
                SSRF(Server-Side Request Forgery)<br>
            </blockquote>
            <legend>常见的学习误区和行为</legend>
            <blockquote class="layui-elem-quote layui-quote-nm">
            
                    <h3>第一：以编程基础为方向的自学误区</h3>
                    <hr class="layui-bg-blue">
                    <p>从编程开始掌握，前端后端，通信协议什么都学
                缺点：花费时间太长，实际像安全过度后可用到的关键知识不多
                很多安全函数知识甚至名词都不了解
                unserialize,outfile等</p><br>
                
                    <h3>第二：以黑客技能、兴趣为方向的自学误区</h3>
                    <hr class="layui-bg-red">
                    <p>
                    疯狂搜索安全教程、加入各种小圈子，逢资源就下，遇视频就看，只要是黑客相关的，没有自主的计划
                    缺点：
                    就算资源质量可以，能学习到的知识点也非常分散，重复性极强，代码看不懂、讲解听不明白，一知半解的情况时而发生。
                    在花费大量时间明白后，才发现这个视频讲的内容其实自己看其他的知识点是一样的

                    黑客技能兴趣在前有好处吗？当然！
                    兴趣前!基础后！
                    </p><br>
                    
                    <h3>零基础兴趣第一步：</h3>
                    <hr class="layui-bg-green">
                    <h4>
                    
                    web前后端基础和服务器通信原理了解 （所指前后端：H5、JS、PHP、SQL，服务器指：Winserver、Nginx、Apache等）
                    </h4>
                    <h4>学会看漏洞代码，找出其中原因。</h4>
            </blockquote>
            <legend>切记</legend>
            <blockquote class="layui-elem-quote">
                <h4>有了正确的学习心态后，请一定要对学习内容做好记录。</h4>

                <h3>你的思想再伟大，要是无法有效传递出来。你就是个没有思想的人。----李开复</h3>
        </div>
        </fieldset>
