<?php
require_once "SqlHelper.class.php";

class SearchServer{
	
	//�û�һ��ģ������
    public function userSearch($search){
		
        $sql="select id,userName,groupName,hobby,nickname from t_user where username<>'{$_SESSION['userName']}' and (userName like '%{$search}%' or nickname like '%{$search}%' or address like '%{$search}%' or hobby like '%{$search}%' or ideal like '%{$search}%' or company like '%{$search}%') ;";
		$SqlHelper=new SqlHelper();
		$res=$SqlHelper->Execute_Dql($sql);
        
        $array=array();
        while($row=$res->fetch_assoc()){
            $array[]=$row;
        }
        
        //�ر���Դ
        $SqlHelper->close_connect();
        
        return $array;
   }
   
   //��ȡ�����ݿ�������
   public function get_rows($search){
	   
    $SqlHelper=new SqlHelper();
    $sql="select userName,groupName,hobby from t_user where username<>'{$_SESSION['userName']}' and (userName like '%{$search}%' or nickname like '%{$search}%' or address like '%{$search}%' or hobby like '%{$search}%' or ideal like '%{$search}%' or company like '%{$search}%');";
    $res=$SqlHelper->Execute_Dql($sql);
    $rowNum=$res->num_rows;
    
    //�ͷ���Դ
    $res->free_result();
    $SqlHelper->close_connect();
    
    return $rowNum;
   }
   
   //��ȡ�����ݿ�������ϸ��Ϣ
   public function get_Info($id){
	   
    $sql="select * from t_user where id='{$id}';";
	
    $SqlHelper=new SqlHelper();
    return $arr=$SqlHelper->Execute_Dql2($sql);
   }
}
?>