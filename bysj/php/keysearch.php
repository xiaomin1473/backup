<?php
header('Content-Type:application/json;charset=utf-8');
@$area=$_REQUEST['area'];
@$price=$_REQUEST['price'];
@$huxing=$_REQUEST['huxing'];
$sql;
switch($area){
    case 0:
            $area="";
            break;
    case 1:
            $area="title='北一区'";
            break;
    case 2:
            $area="title='北二区'";
            break;
    case 3:
            $area="title='西一区'";
            break;
    case 4:
            $area="title='西二区'";
            break;
    case 5:
            $area="title='东一区'";
            break;
    case 6:
            $area="title='东二区'";
            break;
}
switch($price){
    case 0:
            $price="";
            break;
    case 1:
            $price="price between 0 and 1500";
            break;
    case 2:
            $price="price between 1500 and 2500";
            break;
    case 3:
            $price="price between 2500 and 3500";
            break;
    case 4:
            $price="price between 3500 and 4500";
            break;
    case 5:
            $price="price between 4500 and 10000";
            break;
}
switch($huxing){
        case 0:
               $huxing="";
               break;
        case 1:
                $huxing="detail like '%一室%'";
                break;
        case 2:
                $huxing="detail like '%二室%'";
                break;
        case 3:
                $huxing="detail like '%三室%'";
                break;
        case 4:
                $huxing="detail like '%四室%'";
                break;
        case 5:
                $huxing="detail like '%[五，六]室%'";
                break;
}
if($area==""&&$price==""&&$huxing==""){
    $sql="select * from details";
}else if($area==""&&$price!=""&&$huxing!=""){
    $sql="select * from details where ".$price." and ".$huxing;
}else if($area==""&&$price!=""&&$huxing==""){
     $sql="select * from details where ".$price;
 }
 else if($area==""&&$price==""&&$huxing!=""){
     $sql="select * from details where ".$huxing;
 }
 else if($area!=""&&$price!=""&&$huxing!=""){
     $sql="select * from details where ".$area." and ".$price." and ".$huxing;
 }else if($area!=""&&$price==""&&$huxing!=""){
       $sql="select * from details where ".$area." and ".$huxing;
   }
   else if($area!=""&&$price==""&&$huxing==""){
          $sql="select * from details where ".$area;
      }
      else if($area!=""&&$price!=""&&$huxing==""){
                $sql="select * from details where ".$area." and ".$price;
            }
$conn=mysqli_connect("127.0.0.1","root","","home",3306);

$json;
		$data=array();
		class User{
			public $imagesrc;//图片
			public $title;//标题
			public $detail;//详情
			public $price;//价格
			public $floo;//楼层
			public $tim;//更新时间
			public $state;//状态
			public $id;

		}


$result = mysqli_query($conn, $sql);



while($row=mysqli_fetch_assoc($result)){
			$user = new User();
			$user->imagesrc=$row["imagesrc"];
			$user->title=$row["title"];
			$user->detail=$row["detail"];
			$user->price=$row["price"];
			$user->floo=$row["floor"];
			$user->tim=$row["ctime"];
			$user->state=$row["state"];
			$user->id=$row["id"];
 			$data[]=$user;

			}

  $json = json_encode($data);
   echo $json;

?>