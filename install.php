<?php
$ROOT_DIR ="";
include_once 'inc/config.inc.php';
$dbhost=DBHOST;
$dbuser=DBUSER;
$dbpw=DBPW;
$dbname=DBNAME;
$connect_r='';
$create_r='';
$data_r='';
$all_r='';


if(isset($_POST['submit'])){
    //判断数据库连接
    if(!@mysqli_connect($dbhost, $dbuser, $dbpw)){
        exit('数据连接失败，请仔细检查inc/config.inc.php的配置');
    }
    $link=mysqli_connect(DBHOST, DBUSER, DBPW);
    $connect_r.="<blockquote class='layui-elem-quote layui-quote-nm'>数据库连接成功!</blockquote>";
    $drop_db="drop database if exists $dbname";
    if(!@mysqli_query($link, $drop_db)){
        exit('初始化数据库失败');
    }
    //创建数据库
    $create_db="CREATE DATABASE $dbname";
    if(!@mysqli_query($link,$create_db)){
        exit('数据库创建失败');
    }
    $create_r="<p style='color:#2F4056;'>新建数据库:".$dbname."成功!</p>";
    //创建数据.选择数据库
    if(!@mysqli_select_db($link, $dbname)){
        exit('数据库选择失败');
    }

    //创建users表
    $creat_users=
        "CREATE TABLE IF NOT EXISTS `users` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `username` varchar(30) NOT NULL,
    `password` varchar(66) NOT NULL,
    `level` int(11) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4";
    if(!@mysqli_query($link,$creat_users)){
        exit('创建users表失败');
    }

    //往users表里面插入默认的数据
    $insert_users = "insert into `users` (`id`,`username`,`password`,`level`) values (1,'admin',md5('123456'),1),(2,'jonathan',md5('000000'),2),(3,'test',md5('abc123'),3)";

    if(!@mysqli_query($link,$insert_users)){
        echo $link->error;
        exit('创建users表数据失败');
    }

    //创建留言板的表message
    $create_message=
        "CREATE TABLE IF NOT EXISTS `message` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
     `content` varchar(255) NOT NULL,
    `time` datetime NOT NULL,
     PRIMARY KEY (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='stored_xss_1' AUTO_INCREMENT=56";


    if(!@mysqli_query($link,$create_message)){
        exit('创建message表失败');
    }


    //创建成信息表member
    $create_member=
    "CREATE TABLE IF NOT EXISTS `member`  (
        `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
        `username` varchar(66) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
        `pw` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
        `sex` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
        `phonenum` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
        `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
        `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
        PRIMARY KEY (`id`)
      ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25";
    if(!@mysqli_query($link,$create_member)){
        exit('创建member表失败');
    }

    $insert_member=
    "INSERT INTO `member` (`id`, `username`, `pw`, `sex`, `phonenum`, `address`, `email`) VALUES
       (1, 'lucy', 'e10adc3949ba59abbe56e057f20f883e', 'girl', 
       '13866696666', 'Pakistan', 'lucy@gmail.com'),
        (2, 'brown', 'e10adc3949ba59abbe56e057f20f883e', 'boy', '15966696666', 'India', 'brown@gmail.com'),
       (3, 'clark', 'e10adc3949ba59abbe56e057f20f883e', 'girl', '15987665432', 'Canada ', 'clark@gmail.com'),
        (4, 'denny', 'e10adc3949ba59abbe56e057f20f883e', 'boy', '13876554321', 'Angola ', 'denny@gmail.com'),
        (5, 'jerry', 'e10adc3949ba59abbe56e057f20f883e', 'boy', '13879879888', 'Thailand', 'jerry@gmail.com'),
        (6, 'mark', 'e10adc3949ba59abbe56e057f20f883e', 'boy', '12345567890', 'USA', 'mark@gmail.com'),
        (7, 'lili', 'e10adc3949ba59abbe56e057f20f883e', 'girl', '13866696666', 'China', 'lili@gmail.com')";

    if(!@mysqli_query($link,$insert_member)){
        exit('创建member数据失败，请仔细检查当前用户是否有操作权限');
    }


    //创建数据.创建表sqli里面http头注入的信息,httpinfo和数据
    $creat_httpinfo=
        "CREATE TABLE IF NOT EXISTS `httpinfo` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `userid` int(10) unsigned NOT NULL,
    `ipaddress` varchar(255) NOT NULL,
     `useragent` varchar(255) NOT NULL,
     `httpaccept` varchar(255) NOT NULL,
    `remoteport` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42";
    if(!@mysqli_query($link,$creat_httpinfo)){
        exit('创建httpinfo表失败');
    }



    $data_r="<p style='color:#2F4056;'>创建数据库数据成功!</p>";
    $all_r="<p style='color:#2F4056;'>系统准备就绪 <br>: )<br>ok start ~<a href='start.php' style='color:#337ab7;'>点击这里</a> 进入首页</p>";


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

<div>
    <fieldset class="layui-elem-field layui-field-title">
  <legend class="">系统初始化安装</legend>
  <blockquote class="layui-elem-quote layui-quote-nm">
    <p style="color:#2F4056;">第1步：请提前安装“mysql+php+中间件”的环境;</p><br>
    <p style="color:#2F4056;">第2步：请根据实际环境修改inc/config.inc.php文件里面的参数;</p><br>
    <p style="color:#2F4056;">第3步：点击“安装/初始化”按钮;</p><br>
</blockquote>

<form method="post">
    <input class="submit layui-bg-black layui-btn" name="submit" type="submit" value="安装/初始化" /> 
</form>

</fieldset>
</div>

</div>
<div class="layui-form-item " >
    <?php
        echo $connect_r;
    ?>
<blockquote class='layui-elem-quote'> 
    <?php
    echo $create_r;
    echo $data_r;
    echo $all_r;
    ?>
        
    </blockquote>
</div>
