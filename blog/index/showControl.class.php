<?php 
	class showControl extends front{
		function show($arg){
			$cid=$arg["id"];
			$db=new db("shows");
			$data=$db->select();
            $title=$data[0]["title"];
			$con=$data[0]["con"];
			$imgurl=$data[0]["imgurl"];
			$status=$data[0]["status"];
            if($status==0){
				$this->smarty->assign("data",$data);
				$this->smarty->assign("title",$title);
				$this->smarty->assign("con",$con);
				$this->smarty->assign("imgrl",$imgurl);
				$this->smarty->display("show.html");
			}else{
				if(isset($_SESSION["userlogin"])){
					$this->smarty->assign("data",$data);
					$this->smarty->assign("title",$title);
					$this->smarty->assign("con",$con);
					$this->smarty->assign("imgrl",$imgurl);
					$this->smarty->display("show.html");
				}else{
					$this->smarty->assign("noticeTitle","请登录");
					$this->smarty->assign("noticePage","登录页面");
					$this->smarty->assign("noticeUrl","index.php?m=index&c=login&a=login");
					$this->smarty->display("notice.html");
					//记录当前页面，登录以后直接跳转
					$_SESSION["currenturl"]="index.php?m=index&c=show&a=show";
				}
				
			}
			
		}
	}

	
 ?>