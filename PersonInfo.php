<?php
//后验证用户是否已经正常登录
require_once "common.php";
getUserValidity();

if(!empty($_GET['flag'])){
    //接收从attentionprocess.php页面传过来的值
    $flag=$_GET['flag'];
    if($flag=='info'){
        $id=$_GET['fid'];
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width" />
<title>个人信息</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/jumbotron-narrow.css"/>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
  <div class="header">
    <ul class="nav nav-pills pull-right navbar-fixed-top">
      <li class="active"><a href="PersonInfo.php?fid=<?php echo $_SESSION['uid'] ?>">我</a></li>
      <li><a href="Search.php" class="ui-btn-active"></span>寻友</a></li>
      <li><a href="safe.php" class="ui-btn-active"><span class="glyphicon glyphicon-remove-sign"></span>退出</a></li>
    </ul>
    <h3 class="text-muted">奴隶社会</h3>
  </div>

<?php
require_once "SearchServer.class.php";
require_once "UserServer.class.php";
$SearchServer = new SearchServer();
if (empty($_GET['fid'])) {
    header("Loaction:Search.php");
    exit();
}

//接收传过来搜到到的好友id
$id = $_GET['fid'];

//返回个人详细信息资源
$arr = $SearchServer->get_Info($id);

for ($i = 0; $i < count($arr); $i++) {
    $row = $arr[$i];
?>
<ul class="list-group" style="margin-top:10px;">
  <a href="#" class="list-group-item disabled">
    <?php echo " 群内昵称：{$row[6]}" ?>
  </a>
  <li class="list-group-item"><?php echo " 性别：{$row[3]}" ?></li>
  <li class="list-group-item"><?php echo " 所在群：{$row[5]}" ?></li>
  <li class="list-group-item"><?php echo " 地址：{$row[7]}" ?></li>
  <li class="list-group-item"><?php echo " 行业：{$row[9]}" ?></li>
  <li class="list-group-item"><?php echo " 学校：{$row[10]}" ?></li>
  <li class="list-group-item"><?php echo " 专业：{$row[11]}" ?></li>
  <li class="list-group-item"><?php echo " 爱好：{$row[12]}" ?></li>
  <li class="list-group-item"><?php echo " 梦想：{$row[13]}" ?></li>
  <li class="list-group-item"><?php echo " 自我介绍：{$row[14]}" ?></li>
</ul>
    <?php
}
?>
    <?php

//实例化一个UserServer对象
$UserServer = new UserServer();
$isOk = $UserServer->attentionVerify($_SESSION['uid'],$row[0]);
if ($_SESSION['uid'] != $id) {   
	if($isOk==true){ 
	?>
    <a href="attentionprocess.php?fid=<?php echo $id; ?>&flag=cancel">
    <button type="button" class="btn btn-default btn-lg btn-block">取消关注</button>
    </a>
    <?php } else{?>
    <a href="attentionprocess.php?fid=<?php echo $id; ?>&flag=attention">
    <button type="button" class="btn btn-success btn-lg btn-block">关注好友</button>
    </a>
    <?php
  }//end if isok 
}
?>
  </div>
</div>
</body>
</html>