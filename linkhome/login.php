<?php
header('Content-type:text/plain;charset=utf-8');
$uname=$_REQUEST['uname'];
$pwd=$_REQUEST['pwd'];
$conn=mysqli_connect('localhost','root','','users',3306);
$sql="set names utf8";
mysqli_query($conn,$sql);
$sql="select * from user where uname='$uname'";
$result=mysqli_query($conn,$sql);
$acc=mysqli_fetch_assoc($result);
if(!$acc){
	echo "err";
}else{
	if($acc['upwd']!=$pwd){
		echo "err";
	}else{
		echo "succ";
	}
}
?>
