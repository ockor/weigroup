<?php
require_once"SqlHelper.class.php";
//该类是业务逻辑类，主要对Admin表的操作
class UserServer{
    
    //验证用户登录是否合法
    public function checkAdmin($username,$password){
        $sql="select id,password from t_user where userName='$username';";
        //创建一个sqlHelper对象
		$SqlHelper=new SqlHelper();
        $res=$SqlHelper->Execute_Dql($sql);
		$arr=array();
        if($row=$res->fetch_assoc()){
            if($password==$row['password']){
                //假如密码匹配正确则返回return
				$arr['username']=$username;
				$arr['uid']=$row['id'];
                return $arr;
            }
            
            //关闭资源
            $res->free_result();
            $SqlHelper->close_connect();
            return "";
        }
    }
    
    //先验证是否已经关注过此好友了
    public function attentionVerify($uid,$fid){
        $sql="select uid,fid from t_attention where uid={$uid}  and fid={$fid}";
        $SqlHelper=new SqlHelper();
        $res=$SqlHelper->Execute_Dql($sql);
        $arr=array();
		while ($row=$res->fetch_assoc()) {
				$arr[]=$row;
		}		
        $SqlHelper->close_connect();
        return count($arr)==1?true:false;          
    }
    
    //关注好友
    public function attention($uid,$fid){
		//当前日期时间
        $date=date("Y-m-d H:m:s");
        $sql="insert into t_attention(uid,fid,date) value('{$uid}','{$fid}','{$date}');";
		//创建一个SqlHelper对象
        $SqlHelper=new SqlHelper();
        $number=$SqlHelper->Execute_Dml($sql);
        
        //关闭资源
        $SqlHelper->close_connect();
        
        return $number;
    }
    
    //取消关注
    public function cancel_attention($uid,$fid){
        $sql="delete from t_attention where uid={$uid} and fid={$fid};";
        $SqlHelper=new SqlHelper();
        $num=$SqlHelper->Execute_Dml($sql);
        
        //关闭资源
        $SqlHelper->close_connect();
        
        return $num;
    }
}
?>