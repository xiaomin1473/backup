<?php
header('Content-Type:application/json;charset=utf-8');
@$key=$_REQUEST['key'];
$conn=mysqli_connect("127.0.0.1","root","","home",3306);

$sql = "SELECT * FROM  details where title='$key' or detail='$key' or price='$key'" ;

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