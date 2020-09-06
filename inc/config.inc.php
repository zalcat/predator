<?php
@session_start();
//全局居设置时区
date_default_timezone_set('Asia/Shanghai');
//全局设置默认字符
@header('Content-type:text/html;charset=utf-8');
//定义数据库连接参数
define('DBHOST', '127.0.0.1');//将localhost或者127.0.0.1
define('DBUSER', 'root');//将root修改为连接mysql的用户名
define('DBPW', '');//连接mysql的密码，如果连接不上，请先手动连接下你的数据库，确保数据库服务没问题。
define('DBNAME', 'zalcat');
define('DBPORT', '3306');//数据库连接端口

?>
