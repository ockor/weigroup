<?php
$array=array();
//接收用户名
$array['username']=addslashes(trim($_POST['username']));
//用户密码
$array['password']=addslashes(md5(trim($_POST['password'])));
//性别
$array['sex']=addslashes($_POST['sex']);
//出生日期
$array['birthday']=addslashes($_POST['birthday']);
//所在群名称
$array['groupName']=addslashes($_POST['groupName']);
//群内昵称
$array['nickname']=addslashes($_POST['nickname']);
//出没地点
$array['address']=addslashes($_POST['address']);
//所在公司
$array['company']=addslashes($_POST['company']);
//所在行业
$array['industry']=addslashes($_POST['industry']);
//毕业学校
$array['school']=addslashes($_POST['school']);
//专业
$array['profession']=addslashes($_POST['profession']);
//兴趣爱好
$array['hobby']=addslashes($_POST['hobby']);
//个人梦想
$array['ideal']=addslashes($_POST['ideal']);
//个人介绍
$array['introduce']=addslashes($_POST['introduce']);

require_once "RegisterServer.class.php";

$RegisterServer=new RegisterServer();


//验证用户名是否存在
$result=$RegisterServer->verifyUser($array['username']);
if($result->fetch_assoc()){
	header("Location:register.php?error=1");
    exit();
}

//添加成功则返回1,失败返回0,不受影响返回2
$b=$RegisterServer->userRegister($array);
if($b==1){
    header("Location:login.php");
	exit();
}else if($b==0){
    header("Location:register.php");
	exit();
}
?>
