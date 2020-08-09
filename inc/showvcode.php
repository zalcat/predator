<?php 
session_start();
include_once 'function.php';
//$_SESSION['vcode']=vcode(100,40,30,4);
$_SESSION['vcode']=vcodex();
//验证码绕过 on server
setcookie('bf[vcode]',$_SESSION['vcode']);
?>
