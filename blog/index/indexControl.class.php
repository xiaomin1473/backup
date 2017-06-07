<?php
class indexControl extends front{

    function header(){
        $db=new db("category");
        $data=$db->select();
        function aa($data,$cid){
            $i=0;
            foreach($data as $v){
                if($v["pid"]==$cid){
                    $array[$i]=$v;
                    foreach($data as $v1) {
                        if($v["cid"]==$v1["pid"]){
                            $array[$i]["son"][]=$v1;

                        }
                    }
                    $i++;
                }
            }
            return $array;
        }
        $this->smarty->assign("menu",aa($data,0));
    }
    function listTitle(){
        $db=new db("shows");
        $data=$db->select();
        $this->smarty->assign("data",$data);
    }


    function login(){
        $this->smarty->display("login.html");
    }

    function reg(){
        $this->smarty->display("reg.html");
    }
    //检查注册
    function checkReg(){
        $auser=$_POST["auser"];
        $apass=md5($_POST["apass"]);
        $db=new db("admin");
        if($db->field("auser='{$auser}',apass='{$apass}'")->insert()>0){
            $this->smarty->assign("noticeTitle","注册成功");
            $this->smarty->assign("noticeUrl","index.php?a=login");
            $this->smarty->display("notice.html");
        };
    }
    //注册验证用户名是否存在
    function checkRegs(){
        $db=new db("admin");
        $auser=$_POST["auser"];
        $data=$db->select();
        foreach($data as $v){
            if($v["auser"]==$auser){
                echo "ok";
                exit;
            }
        }
        echo "no";
    }
    //验证登录
    function checkLogin(){
        $db=new db("admin");
        $auser=$_POST["auser"];
        $apass=md5($_POST["apass"]);
        $data=$db->select();
        foreach($data as $v){
            if($v["auser"]==$auser&&$v["apass"]==$apass){
                $_SESSION["auser"]=$_POST["auser"];
                echo "ok";
                exit;
            }
        }
        echo "no";
    }
    function reLogin(){
        $_SESSION["indexLogin"]="yes";
        $_SESSION["auser"]=$_POST["auser"];
        $this->smarty->assign("noticeTitle","正在登录前台");
        $this->smarty->assign("noticeUrl","index.php");
        $this->smarty->display("notice.html");
    }

    //退出登录
    function logout(){
        unset($_SESSION["indexLogin"]);
        unset($_SESSION["auser"]);
        $this->smarty->assign("noticeTitle","退出成功");
        $this->smarty->assign("noticePage","登录页面");
        $this->smarty->assign("noticeUrl","index.php?a=login");
        $this->smarty->display("notice.html");
        exit;
    }

    function email(){
        $this->header();
	    $this->smarty->display("email.html");
    }
    function addLink(){
        $this->header();
        $this->smarty->display("addLink.html");
    }
    function addLink1(){
        $lname=$_POST["lname"];
        $lurl=$_POST["lurl"];
        include "../public/db.class.php";
        $db=new db("link");
        if($db->field("lurl='{$lurl}',lname='{$lname}'")->insert()>0){
            echo "<script>alert('申请成功');location.href='index.php';</script>";
        };
    }
    function showLink(){
        include "../public/db.class.php";
        $db=new db("link");
        $data=$db->order("lid DESC")->limit("0,10")->select();
        $this->smarty->assign("link",$data);
    }
    function addMessage(){
        $liucon=$_POST["liucon"];
        if($_SESSION["auser"]){
            $luser=$_SESSION["auser"];
            include "../public/db.class.php";
            $db=new db("liu");
            if($db->field("liucon='{$liucon}',luser='{$luser}'")->insert()>0){
                //$this->showMessage();
            };
        }else{
            echo "login";
        }
    }
    function showMessage(){
        include "../public/db.class.php";
        $db=new db("liu");
        $data=$db->select();
        $this->smarty->assign("message",$data);
    }

    function index(){
        $this->header();
        $this->listTitle();
        $this->showLink();
        $this->smarty->assign("auser",$_SESSION["auser"]);
        $this->smarty->assign("indexLogin",$_SESSION["indexLogin"]);
        $this->smarty->display("index.html");
    }
    function alist($arg){
        $cid=$arg["cid"];
        $db=new db("shows");
        $data=$db->where("cid={$cid}")->order("sid DESC")->select();
        $this->smarty->assign("data",$data);
        $this->smarty->assign("auser",$_SESSION["auser"]);
        $this->smarty->assign("indexLogin",$_SESSION["indexLogin"]);
        if($cid==9){
            $this->index();
            exit;
        }else if($cid==10){
            $this->header();
            $this->showMessage();
            $this->smarty->display("list-say.html");
            exit;
        }else if($cid==11){
            $this->header();
            $this->smarty->display("list-img.html");
            exit;
        }else if($cid==12) {
            $this->header();
            $this->smarty->display("list-title.html");
        }else if($cid==13){
            $this->header();
            $this->showMessage();
            $this->smarty->display("list-message.html");
            exit;
        }else if($cid==14){
            $this->header();
            $this->smarty->display("list-me.html");
        }
    }
    function show($arg){
        $this->header();
        $sid=$arg["cid"];
        $db=new db("shows");
        $data=$db->where("sid={$sid}")->select();
        $this->smarty->assign("indexLogin",$_SESSION["indexLogin"]);
        $this->smarty->assign("auser",$_SESSION["auser"]);
        $this->smarty->assign("data",$data);
        $this->smarty->display("show.html");
    }
}
?>
