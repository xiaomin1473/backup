<?php
class addControl extends main{
    //添加推荐位
    function addPos(){
        $this->smarty->display("addPos.html");
    }
    function addPos1(){
        $posname=$_POST["posname"];
        include "../public/db.class.php";
        $db=new db("pos");
        if($db->field("posname='{$posname}'")->insert()>0){
            $this->smarty->assign("noticeTitle","推荐位已添加");
            $this->smarty->assign("noticeUrl","index.php?m=admin&&c=add&&a=addPos");
            $this->smarty->display("notice.html");
        };
    }
    //添加内容
    function addCon(){
        include "../public/db.class.php";
        $db=new db("category");
        $data=$db->select();
        $db1=new db("pos");
        $data1=$db1->select();
        $this->smarty->assign("strees",$this->tree($data,0,0));
        $this->smarty->assign("data",$data1);
        $this->smarty->display("addCon.html");
    }
    function addCon1(){
        $cid=$_POST["cid"];
        $auser=$_SESSION["user"];
        $con=$_POST["con"];
        $title=$_POST["title"];
        $pid=$_POST["pid"];
        $description=$_POST["description"];
        $file=$_FILES["file"];
        if(is_uploaded_file($file["tmp_name"])){
            move_uploaded_file($file["tmp_name"],"upload/".$file["name"]);
        }
        $imgurl=UPLOAD_PATH.$file["name"];
        include "../public/db.class.php";
        $db=new db("shows");
        if($db->field("cid='{$cid}',description='{$description}',auser='{$auser}',con='{$con}',title='{$title}',imgurl='{$imgurl}'")->insert()>0){
            echo "<script>alert('内容添加成功');location.href='index.php?m=admin&&c=add&&a=addCon';</script>";
        };
    }


}