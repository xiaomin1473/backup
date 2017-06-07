<?php
    header("Content-Type:text/html;charset=utf-8");
    @$name=$_REQUEST["name"];
    @$password=$_REQUEST["password"];
    @$mobile=$_REQUEST["mobile"];
    $conn=mysqli_connect("127.0.0.1","root","","home",3306);
    $sql="set names 'utf8'";
    mysqli_query($conn,$sql);
    $sql="insert into users values(null,'$name','$mobile','$password')";
    $result=mysqli_query($conn,$sql);
    if(!$result){
        echo "err";
    }else{
        echo "succ";
    }
