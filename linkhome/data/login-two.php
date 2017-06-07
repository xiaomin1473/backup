<?php
header("Content-Type:text/html;charset=utf-8");
$uphone=$_REQUEST['uphone'];
$upwd=$_REQUEST['upwd'];
$conn=mysqli_connect("localhost","zjwdb_6118476","Cy5213..","zjwdb_6118476",3306);
$sql="set names 'utf8'";
mysqli_query($conn,$sql);
$sql="select * from user where uphone='$uphone'";
$result=mysqli_query($conn,$sql);

$arr=mysqli_fetch_assoc($result);
if(!$arr){
    echo "err";
}else{
    if($arr['upwd']!=$upwd){
    		echo "err";
    	}else{
    		echo $arr['uname'];
    	}
}
?>