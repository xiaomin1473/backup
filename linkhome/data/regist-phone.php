<?php
header("Content-Type:text/html;charset=utf-8");
$uphone=$_REQUEST["uphone"];
$conn=mysqli_connect("localhost","zjwdb_6118476","Cy5213..","zjwdb_6118476",3306);
$sql="set names utf8";
mysqli_query($conn,$sql);
$sql="select * from user where uphone='$uphone'";
$result=mysqli_query($conn,$sql);
$arr=mysqli_fetch_assoc($result);
if(!$arr){
    echo "erro";
}else{
    echo "succ";
}
?>