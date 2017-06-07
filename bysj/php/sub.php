<?php
    header("Content-Type:text/html;charset=utf-8");
	@$title=$_REQUEST["title"];
	@$detail=$_REQUEST["detail"];
	@$floo=$_REQUEST["floo"];
	@$state=0;
	@$name=$_REQUEST["name"];
	@$price=$_REQUEST["price"];
	@$imagesrc="../imges/".$_FILES["image"]['name'];
	$time=date("Y-m-d");
	$path="../imges/";
	  if(is_uploaded_file($_FILES["image"]["tmp_name"])){
	        $filename=$path.$_FILES["image"]["name"];
      		move_uploaded_file($_FILES["image"]["tmp_name"],$filename);
      	}
     $conn=mysqli_connect("127.0.0.1","root","","home",3306);
     $sql="set names 'utf8'";
     mysqli_query($conn,$sql);
     $sql="select * from users where name='$name'";
     $result=mysqli_query($conn,$sql);
     $row=mysqli_fetch_assoc($result);
     $uid=$row["id"];
     $sql="insert into details values(null,'$imagesrc','$title','$detail','$price','$floo','$time','$uid','$state')";
     mysqli_query($conn,$sql);
 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>跳转</title>
 	<style>
 	    #jump{
 	        width:400px;
 	        height:20px;
 	        line-height:20px;
 	        text-align:center;
 	        cursor:pointer;
 	        margin-top:40px;
 	        border:1px solid #ddd;
 	    }
 	</style>
 </head>
 <body>
 	<div id="jump" onclick="jump()">上传成功，点击返回我的清单</div>
 	<script>
 	    function jump(){
 	        location.href="../showme.html";
 	    }
 	</script>
 </body>
 </html>
