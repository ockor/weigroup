<?php
//访问网页次数记录
function get_visit(){
    //判断指定的这个cookie是否存在
    if(!empty($_COOKIE['lastVisit'])){
    
       echo "您上次访问的时间为:".$_COOKIE['lastVisit'];
       //更新目前访问的时间
       setcookie("lastVisit",date("Y-m-d H:i:s"),time()+3600*24*30);
    }else{
    
       echo "您是第一次访问!";
       //更新目前访问的时间有效期一个月
       setcookie("lastVisit",date("Y-m-d H:i:s"),time()+3600*24*30);
       }
 }
 
 //判断cook是否为空
 function getCookVal($key){
    if(empty($_COOKIE[$key])){
        return "";
    }else{
        return $_COOKIE[$key];
    }
 }
 
 //验证用户名是否正常登录
 function getUserValidity(){
    session_start();
    if(empty($_SESSION['userName'])){
        header("location:login.php?error=2");
        exit();
    }
 }
?>
