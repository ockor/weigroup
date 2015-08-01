<?php
//后验证用户是否已经正常登录
require_once "common.php";
getUserValidity();
require_once "SearchServer.class.php";
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="lt-ie9 lt-ie8 lt-ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><![endif]-->
<!--[if IE 7]><html class="lt-ie9 lt-ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><![endif]-->
<!--[if IE 8]><html class="lt-ie9" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]-->
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/jumbotron-narrow.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<title>搜索</title>
<script type="text/javascript">

$(document).ready(function(){
    $("#search_btn").click(function(){
       if($("#userInput").val().trim()==""){
        alert("请输入关键字!");
        $("#userInput").focus();
       }else{
        url="searchresult.php?userInput="+$("#userInput").val()+"&mytime"+Math.random();
        $.get(url,function(data,status){
            if(status=="success"){
                $("#viewSearch").html(data);
            }
        });
       } 
    });
});
</script>
</head>
<body>
<div class="container">
  <div class="header">
    <ul class="nav nav-pills pull-right navbar-fixed-top">
      <li><a href="PersonInfo.php?fid=<?php echo $_SESSION['uid'] ?>">我</a></li>
      <li class="active"><a href="Search.php" class="ui-btn-active">寻友</a></li>
      <li><a href="safe.php" class="ui-btn-active"><span class="glyphicon glyphicon-remove-sign"></span>退出</a></li>
    </ul>
    <h3 class="text-muted">奴隶社会</h3>
  </div>
  
  <div class="col-lg-6" style="margin:10px -15px;">
    <form id="f_search" method="post">
      <div class="input-group">
        <input type="text" class="form-control" id="userInput" name="userInput" placeholder="用户名/昵称/地点/爱好/梦想/公司名称" />
        <span class="input-group-btn">
        <button class="btn btn-default" id="search_btn" type="button">搜索</button>
        </span> 
      </div>
    </form>
  </div>
  
  <div id="viewSearch">
  </div>
</div>
</body>
</html>
