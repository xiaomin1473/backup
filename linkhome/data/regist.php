<?php
header("Content-Type:text/html;charset=utf-8");
$uname=$_REQUEST["uname"];
$uphone=$_REQUEST["uphone"];
$upwd=$_REQUEST["upwd"];
$conn=mysqli_connect("localhost","zjwdb_6118476","Cy5213..","zjwdb_6118476",3306);
$sql="set names 'utf8'";
mysqli_query($conn,$sql);
$sql="insert into user values(null,'$uname','$uphone','$upwd')";
$result=mysqli_query($conn,$sql);
if(!$result){
    echo "err";
}else{
    echo "succ";
}
?>