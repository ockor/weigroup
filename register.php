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
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<title>用户注册</title>
<script language='javascript'>

//隐藏显示切换
  function get_page(val){
	if(val=="regPage2")
	{
		$('#regPage2').show();
		$('#regPage1').hide();
	    $('#regPage3').hide();
		$('#regPage4').hide();
	} else if(val=="regPage3") {
		$('#regPage3').show();
		$('#regPage1').hide();
		$('#regPage2').hide();
		$('#regPage4').hide();
	} else if(val=="regPage4") {
		$('#regPage4').show();
	    $('#regPage1').hide();
	    $('#regPage2').hide();
	  	$('#regPage3').hide();
	} else {
		$('#regPage4').hide();
		$('#regPage1').show();
		$('#regPage2').hide();
		$('#regPage3').hide();
    }
}

//验证表单是否为空
$(document).ready(function(){
    
    //点击注册页面第一个下一步按钮
    $('#btn_1').click(function(){
        if($('#username').val()==""){
            alert("用户名不能为空!");
            $('#username').focus();
            return false;
        }else if($('#password').val()==""){
            alert("密码不能为空!");
            $('#password').focus();
            return false;
        }else if($('#birthday').val()==""){
            alert('出生日期不能为空!');
            $('#birthday').focus();
            return false;
        }else{
			get_page('regPage2')
            return true;
        }
    });
    
    //点击注册页面第二个下一步按钮
    $('#btn_2').click(function(){
        if($('#groupName').val()==""){
            alert('所在的群名称不能为空!');
            $('#groupName').focus();
            return false;
        }else if($('#nickname').val()==""){
            alert('你所在的群内昵称不能为空!');
            $('#nickname').focus();
            return false;
        }else if($('#address').val()==""){
            alert('地址不能为空!');
            $('#address').focus();
            return false;
        }else{
			get_page('regPage3');
            return true;
        }
    });
});
	
</script>
</head>

<body onload="$('#username').focus();">
<div id="page">
  <div class="container">
    <div style=" font-weight:bold; margin-top:20px; font-size:20px;">用户注册</div>
    <hr/>
    <form action="RegisterProcess.php" method="post" id="saveInfo" data-ajax="false">
      <div id="regPage1" style="display:block;">
        <label for="text-1">用户帐号:</label>
        <input type="text"  class="form-control" name="username" id="username" value="" placeholder="请输入用户帐号">
        <br/>
        <label for="text-1">用户密码:</label>
        <input type="password" class="form-control" name="password" id="password" value="" placeholder="请输入用户密码">
        <br/>
        <label for="text-1">性别：</label>
        <div class="radio">
          <label class="checkbox-inline">
            <input type="radio" name="sex" id="boy" value="男" checked>男 
          </label>
          <label class="checkbox-inline" style="margin-left:20px;">
            <input type="radio" name="sex" id="girl" value="女">女 
          </label>
        </div>
        <br/>
        <label for="date-1">出生日期：</label>
        <input type="date" class="form-control" name="birthday" id="birthday" value="">
        <br/>
        <button type="button" id="btn_1" class="btn btn-lg btn-success btn-block">下一步</button>
      </div>
      <div id="regPage2" style="display:none;">
        <label for="text-1">所在群名称:</label>
        <input type="text" class="form-control" name="groupName" id="groupName" value="" placeholder="请输入您所在的群"><br/>
        <label for="text-1">群内昵称:</label>
        <input type="text" class="form-control" name="nickname" id="nickname" value="" placeholder="请输入您的群内昵称"><br/>
        <label for="text-1">出没地点:</label>
        <input type="text" class="form-control" name="address" id="address" value="" placeholder="请输入经常出没的地方"><br/>
        <label for="text-1">所在公司:</label>
        <input type="text" class="form-control" name="company" id="company" value="" placeholder="请输入您所在公司名"><br/>
        <button type="button" data-theme="b" id="btn_2" class="btn btn-lg btn-success btn-block" >下一步</button>
      </div>
      <div id="regPage3" style="display:none;">
        <label for="text-1">所在行业:</label>
        <input type="text" class="form-control" name="industry" id="industry" value="" placeholder="请输入您所在的行业"><br/>
        <label for="text-1">学校:</label>
        <input type="text" class="form-control" id="school" name="school" value="" placeholder="请输入您的校名"><br/>
        <label for="text-1">专业:</label>
        <input type="text" class="form-control" id="profession" name="profession" value="" placeholder="请输入您所学的专业"><br/>
        <label for="text-1">兴趣爱好:</label>
        <input type="text" class="form-control" id="hobby" value="" name="hobby" placeholder="请输入您的兴趣爱好"><br/>
        <button type="button" class="btn btn-lg btn-success btn-block" onclick="get_page('regPage4');">下一步</button>
      </div>
      <div id="regPage4" style="display:none;">
        <label for="text-1">个人梦想:</label>
        <input type="text" class="form-control" name="ideal" id="ideal"  value="" placeholder="您的梦想是什么?"><br/>
        <label for="textarea-6">个人介绍:</label>
        <textarea cols="40" rows="8" class="form-control" name="introduce"  id="introduce"  placeholder="请简单描述您的个人信息"></textarea><br/>
        <button type="submit" class="btn btn-lg btn-success btn-block">提交</button>
      </div>
    </form>
  </div>
</div>
<?php
if(!empty($_GET['error'])){
    //接收错误编号
    $error=$_GET['error'];
    
    if($error==1){
        echo "<script>alert('该用户名已经存在,请重新输入!');</script>";
    }
}
?>
</body>
</html>
