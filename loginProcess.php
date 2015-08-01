<?php 
session_start();

//接收用户名和密码
$username=$_REQUEST['username'];
$password=md5($_REQUEST['password']);
//引入UserServer类
require_once 'UserServer.class.php';
//创建一个$UserServer对象，并调用checkAdmin方法传入登录名和密码
$UserServer=new UserServer();
$arr=$UserServer->checkAdmin($username,$password);
if($arr){
    //合法，将用户名存入一个session中
    $_SESSION['userName']=$arr['username'];
    $_SESSION['uid']=$arr['uid'];
    header("Location:Search.php");
    exit();
}else{
    //非法登录就返回登陆界面重新登录
    header("Location:login.php?error=1");
    exit();
}
?>
