<html>
<head>
<meta charset="utf-8" />
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="js/jquery.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="js/bootstrap.min.js"></script>

<title>用户登陆</title>
</head>

<body onLoad="$('#username').focus();">
<div class="container">
<form class="form-signin" role="form" id="lg_form" action="loginProcess.php" method="post">
  <h2 class="form-signin-heading" align="center"><img src="images/logo.jpg"></h2>
  <input type="text" class="form-control" id="username" name="username" placeholder="请输入用户名" required="" autofocus=""><br/>
  <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码" required=""><br/>
  <button class="btn btn-lg btn-success btn-block" type="submit" name="login">登录</button><br/>
  <a href="register.php">
  <button class="btn btn-lg btn-block btn-default" type="button" name="register">注册</button>
  </a>
</form>
</div>
<?php
//接收返回的error
if(!empty($_GET['error']))
{
	//接收错误编号
	$error=$_GET['error'];
	if($error==1)
	{
            echo "<script>alert('用户帐号或密码错误!');</script>";
		}else if($error==2){
		  	echo "<script>alert('请先登录!');</script>";
		}
	}
?>
</body>
</html>
