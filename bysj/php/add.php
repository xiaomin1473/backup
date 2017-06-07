<?php
header('Content-Type:application/json;charset=utf-8');
@$uname=$_REQUEST['uname'];
@$did=$_REQUEST['did'];
$conn=mysqli_connect("127.0.0.1","root","","home",3306);
$sql = "insert into sbs values(null,'$uname','$did')";
$result=mysqli_query($conn,$sql);
if($result){
    echo "succ";
}else{
    echo "erro";
}
?>