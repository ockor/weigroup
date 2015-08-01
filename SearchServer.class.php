<?php
require_once "SqlHelper.class.php";

class SearchServer{
	
	//用户一键模糊搜索
    public function userSearch($search){
		
        $sql="select id,userName,groupName,hobby,nickname from t_user where username<>'{$_SESSION['userName']}' and (userName like '%{$search}%' or nickname like '%{$search}%' or address like '%{$search}%' or hobby like '%{$search}%' or ideal like '%{$search}%' or company like '%{$search}%') ;";
		$SqlHelper=new SqlHelper();
		$res=$SqlHelper->Execute_Dql($sql);
        
        $array=array();
        while($row=$res->fetch_assoc()){
            $array[]=$row;
        }
        
        //关闭资源
        $SqlHelper->close_connect();
        
        return $array;
   }
   
   //获取到数据库表的行数
   public function get_rows($search){
	   
    $SqlHelper=new SqlHelper();
    $sql="select userName,groupName,hobby from t_user where username<>'{$_SESSION['userName']}' and (userName like '%{$search}%' or nickname like '%{$search}%' or address like '%{$search}%' or hobby like '%{$search}%' or ideal like '%{$search}%' or company like '%{$search}%');";
    $res=$SqlHelper->Execute_Dql($sql);
    $rowNum=$res->num_rows;
    
    //释放资源
    $res->free_result();
    $SqlHelper->close_connect();
    
    return $rowNum;
   }
   
   //获取到数据库表个人详细信息
   public function get_Info($id){
	   
    $sql="select * from t_user where id='{$id}';";
	
    $SqlHelper=new SqlHelper();
    return $arr=$SqlHelper->Execute_Dql2($sql);
   }
}
?>