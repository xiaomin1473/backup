<?php
    header("Content-Type:text/html;charset=utf-8");
    @$name=$_REQUEST["name"];
    @$password=$_REQUEST["password"];
    $conn=mysqli_connect("127.0.0.1","root","","home",3306);
    $sql="set names 'utf8'";
    mysqli_query($conn,$sql);
    $sql="select pwd,id from users where name='$name'";
    $result=mysqli_query($conn,$sql);
    if($result){
        $row=mysqli_fetch_assoc($result);
        if($row['pwd']==$password){
            echo "succ";
        }else{
            echo "erro";
        }
    }else{
        echo "erro";
    }