<meta charset="utf-8" />
<?php
//后验证用户是否已经正常登录
require_once "common.php";
getUserValidity();

require_once "UserServer.class.php";
//实例化一个UserServer对象
$UserServer=new UserServer();
//接收好友id
$fid = $_GET['fid'];

if (!empty($_GET['flag'])) {
	
	//接收标志位
    $flag = $_GET['flag'];
	
    if ($flag == 'attention') {
        //走到这里说明是走关注好友的路线
        //关注好友
        $number = $UserServer->attention($_SESSION['uid'], $fid);
        if ($number == 0) {
            echo "<script>alert('关注失败!');window.location='PersonInfo.php?fid=$fid&flag=info';</script>";
            exit();
        } else
            if ($number == 1) {
                echo "<script>alert('关注成功!');window.location='PersonInfo.php?fid=$fid&flag=info';</script>";
                exit();
            }
    }
    
    //取消关注
    if($flag=='cancel'){
		
        $num=$UserServer->cancel_attention($_SESSION['uid'], $fid);
        if ($num == 0) {
            echo "<script>alert('取消关注失败!');window.location='PersonInfo.php?fid=$fid&flag=info';</script>";
            exit();
        } else
            if ($num == 1) {
                echo "<script>alert('取消关注成功!');window.location='PersonInfo.php?fid=$fid&flag=info';</script>";
                exit();
            }
    }
}
?>