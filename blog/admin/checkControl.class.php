<?php
class checkControl extends main{
    //检查注册
    function checkReg(){
        $user=$_POST["user"];
        $pass=md5($_POST["pass"]);
        $db=new db("user");
        if($db->field("user='{$user}',pass='{$pass}'")->insert()>0){
            $this->smarty->assign("noticeTitle","注册成功");
            $this->smarty->assign("noticeUrl","index.php?m=admin&&a=login");
            $this->smarty->display("notice.html");
        };
    }
    //查看用户
    function checkUser(){
        include "../public/db.class.php";
        $db=new db("user");
        $data=$db->select();
        $this->smarty->assign("data",$data);
        $this->smarty->display("checkUser.html");
    }
    //查看内容
    function checkCon(){
        include "../public/db.class.php";
        $db=new db("shows");
        $data=$db->select();
        $this->smarty->assign("data",$data);
        $this->smarty->display("checkCon.html");
    }
    //查看推荐位
    function checkPos(){
        include "../public/db.class.php";
        $db=new db("pos");
        $data=$db->select();
        $this->smarty->assign("data",$data);
        $this->smarty->display("checkPos.html");
    }
    //修改推荐位
    function editPos(){
        $posid=$_GET["pid"];
        $posname=$_POST["posname"];
        include "../public/db.class.php";
        $db=new db("pos");
        if($db->field("posname='{$posname}'")->where("posid='{$posid}'")->update()>0){
            echo "ok";
        };
    }
    //删除推荐位
    function delPos(){
        $posid=$_GET["pid"];
        include "../public/db.class.php";
        $db=new db("pos");
        if($db->where("posid='{$posid}'")->delete()>0){
            echo "ok";
        };
    }

    //添加分类
    function addCat(){
        include "../public/db.class.php";
        $db=new db("category");
        $data=$db->select();
        $this->smarty->assign("strees",$this->tree($data,0,0));
        $this->smarty->display("addCat.html");
    }
    function addCat1(){
        $cid=$_POST["cid"];
        $cname=$_POST["cname"];
        $file=$_FILES["file"];
        if(is_uploaded_file($file["tmp_name"])){
            echo "1";
            move_uploaded_file($file["tmp_name"],"upload/".$file["name"]);
        }
        $imgurl=UPLOAD_PATH.$file["name"];
        echo $imgurl;
        exit;
        include "../public/db.class.php";
        $db=new db("category");
        if($db->field("cname='{$cname}',cimg='{$imgurl}',pid='{$cid}'")->insert()>0){
            echo "<script>alert('分类添加成功');</script>";
            $this->addCat();
        };
    }
    //查看分类
    function checkCat(){
        include "../public/db.class.php";
        $db=new db("category");
        $data=$db->select();
        $this->smarty->assign("data",$data);
        $this->smarty->display("checkCat.html");
    }
    //编辑分类
    function editCat(){
        $cid=$_GET["cid"];
        include "../public/db.class.php";
        $db=new db("category");
        $data=$db->select();
        foreach($data as $v){
            if($v["cid"]==$cid){
                $cname=$v["cname"];
                $cimg=$v["cimg"];
                $pid=$v["pid"];
            }
        }
        $this->smarty->assign("strees",$this->tree($data,0,0));
        $this->smarty->assign("cname",$cname);
        $this->smarty->assign("cimg",$cimg);
        $this->smarty->assign("pid",$pid);
        $this->smarty->assign("cid",$cid);
        $this->smarty->display("editCat.html");
    }
    function editCat1(){
       $cname=$_POST["cname"];
       $cid=$_GET["cid"];
       $cimg=$_POST["cimg"];
       $pid=$_POST["pid"];
       include "../public/db.class.php";
       $db=new db("category");
       if($db->field("cname='{$cname}',cimg='{$cimg}',pid='{$pid}'")->where("cid={$cid}")->update()>0){
           echo "<script>alert('修改成功');</script>";
           $this->checkCat();
       };
    }
    //删除分类
    function delCat(){
        $cid=$_POST["cid"];
        if($this->son($cid)){
            echo "on";
        }else{
            include "../public/db.class.php";
            $db=new db("category");
            if($db->where("cid='{$cid}'")->delete()>0){
                echo "ok";
            };
        }
    }
    //编辑内容
    function editCon(){
        $cid=$_GET["cid"];
        $array=$_POST;
        $result=array_keys($array)[0];
        $result1=array_values($array)[0];

        include "../public/db.class.php";
        $db=new db("shows");
        if($db->field("{$result}='{$result1}'")->where("sid='{$cid}'")->update()>0){
            echo "ok";
        };
    }
    //删除内容
    function delCon(){
        $sid=$_POST["sid"];
        include "../public/db.class.php";
        $db=new db("shows");
        if($db->where("sid='{$sid}'")->delete()>0){
            echo "ok";
        };
    }
}
?>