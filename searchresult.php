<?php
//后验证用户是否已经正常登录
require_once "common.php";
getUserValidity();
require_once "SearchServer.class.php";
?>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/jumbotron-narrow.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<?php
$SearchServer=new SearchServer();
$search=$_GET['userInput'];
$array=$SearchServer->userSearch($search);
$rowNum=$SearchServer->get_rows($search);
?>
<ul class="list-group" style="margin-top:10px;">
<a href="#" class="list-group-item disabled"><span class="label label-info">找到<?php echo "$rowNum"; ?>人</span></a>
<?php
for($i=0;$i<count($array);$i++){
$row=$array[$i];
?>
<a class="list-group-item" href='PersonInfo.php?fid=<?php echo $row['id'] ?>'><?php echo $row['nickname']?><br /><?php echo $row['groupName']?>,  <?php echo $row['hobby']?>
</a>
<?php
}
?>
</ul>
</html>