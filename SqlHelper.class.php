<?php
class SqlHelper{
    private $mysqli;
    private static $host="127.0.0.1";
    private static $user="root";
    private static $password="";
    private static $db="oelove";
    
    //构造函数，当对象被创建是系统自动调用该函数
    public function __construct(){
        //构造函数完成初始化工作
        //1.链接数据库,选择数据库
        $this->mysqli=new mysqli(self::$host,self::$user,self::$password,self::$db);
        if($this->mysqli->error){
            die("数据库链接失败".$this->mysqli->error);
        }
        //设置编码utf8
        $this->mysqli->query("set names utf8");
    }
    
    //执行Dql语句
    public function Execute_Dql($sql){
        //执行Dql语句返回一个数据库资源结果集
        $res=$this->mysqli->query($sql);
        if($this->mysqli->error){
            die("数据库语句执行失败".$this->mysqli->error);
        }
        return $res;
    }
    
    //执行Dql2语句 
    //这个方法返回一个二维数组
    public function Execute_Dql2($sql){
        $res=$this->mysqli->query($sql);
        $arr=array();
        $i=0;
        while($row=$res->fetch_row()){
            $arr[$i]=$row;
            $i++;
        }
        //释放资源
        $res->free_result();
        
        //返回一个二维数组
        return $arr;
    }
    
    //执行Dml语句
    public function Execute_Dml($sql){
         //执行Dml语句返回一个数据库资源结果集
         $b=$this->mysqli->query($sql);
         if(!$b){
            //执行失败
            return 0;
         }else{
            if($this->mysqli->affected_rows>0){
                //执行成功
                return 1;
            }else{
                //没有返回行数
                return 2;
            }
         }
    }
    
    //关闭资源
    public function close_connect(){
        if(!empty($this->mysqli)){
            $this->mysqli->close();
        } 
    }
}
?>
