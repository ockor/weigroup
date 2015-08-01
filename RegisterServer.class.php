<?php
require_once"SqlHelper.class.php";
//该类是业务逻辑类，主要对用户注册表的操作
class RegisterServer{
    //正式注册
	public function userRegister($array){
	   $sql="insert into t_user(userName,password,sex,birthday,groupName,nickname,address,company,industry,school,profession,hobby,ideal,introduce) 
       values('{$array['username']}','{$array['password']}','{$array['sex']}','{$array['birthday']}','{$array['groupName']}','{$array['nickname']}','{$array['address']}','{$array['company']}','{$array['industry']}','{$array['school']}','{$array['profession']}','{$array['hobby']}','{$array['ideal']}','{$array['introduce']}');";
	   
       $SqlHelper=new SqlHelper();
	   
       //返回结果,bool值
       $b=$SqlHelper->Execute_Dml($sql);
	   
       //关闭资源
       $SqlHelper->close_connect();
	   
	   return $b;
    	}
     
     //先验证用户是否存在
     public function verifyUser($username){
        $sql="select id from t_user where username='$username' limit 1;";
        $SqlHelper=new SqlHelper();
        
        //返回结果,数据集
        $result=$SqlHelper->Execute_Dql($sql);
        
        //关闭资源
        $SqlHelper->close_connect();
        
        return $result;
     }
}

?>