<?php
require_once"SqlHelper.class.php";
//������ҵ���߼��࣬��Ҫ��Admin��Ĳ���
class UserServer{
    
    //��֤�û���¼�Ƿ�Ϸ�
    public function checkAdmin($username,$password){
        $sql="select id,password from t_user where userName='$username';";
        //����һ��sqlHelper����
		$SqlHelper=new SqlHelper();
        $res=$SqlHelper->Execute_Dql($sql);
		$arr=array();
        if($row=$res->fetch_assoc()){
            if($password==$row['password']){
                //��������ƥ����ȷ�򷵻�return
				$arr['username']=$username;
				$arr['uid']=$row['id'];
                return $arr;
            }
            
            //�ر���Դ
            $res->free_result();
            $SqlHelper->close_connect();
            return "";
        }
    }
    
    //����֤�Ƿ��Ѿ���ע���˺�����
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
    
    //��ע����
    public function attention($uid,$fid){
		//��ǰ����ʱ��
        $date=date("Y-m-d H:m:s");
        $sql="insert into t_attention(uid,fid,date) value('{$uid}','{$fid}','{$date}');";
		//����һ��SqlHelper����
        $SqlHelper=new SqlHelper();
        $number=$SqlHelper->Execute_Dml($sql);
        
        //�ر���Դ
        $SqlHelper->close_connect();
        
        return $number;
    }
    
    //ȡ����ע
    public function cancel_attention($uid,$fid){
        $sql="delete from t_attention where uid={$uid} and fid={$fid};";
        $SqlHelper=new SqlHelper();
        $num=$SqlHelper->Execute_Dml($sql);
        
        //�ر���Դ
        $SqlHelper->close_connect();
        
        return $num;
    }
}
?>