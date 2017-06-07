<?php
class indexControl extends main{
    function index(){
        if($_SESSION["login"]) {
            $this->smarty->display("main.html");
        }else {
            $this->smarty->assign("noticeTitle", "正在登录后台");
            $this->smarty->assign("noticeUrl", "index.php?m=admin&&a=login");
            $this->smarty->display("notice.html");
        }
    }
    function login(){
        $this->smarty->display("login.html");
    }

    function reg(){
        $this->smarty->display("reg.html");
    }

    //注册验证用户名是否存在
    function checkRegs(){
        $db=new db("user");
        $user=$_POST["user"];
        $data=$db->select();
        foreach($data as $v){
            if($v["user"]==$user){
                echo "ok";
                exit;
            }
        }
        echo "no";
    }
    //验证登录
    function checkLogin(){
        $db=new db("user");
        $user=$_POST["user"];
        $pass=md5($_POST["pass"]);
        $data=$db->select();
        foreach($data as $v){
            if($v["user"]==$user&&$v["pass"]==$pass){
                echo "ok";
                exit;
            }
        }
        echo "no";
    }
    function reLogin(){
        $_SESSION["login"]="yes";
        $_SESSION["user"]=$_POST["user"];
        $this->smarty->assign("noticeTitle","正在登录后台");
        $this->smarty->assign("noticeUrl","index.php?m=admin");
        $this->smarty->display("notice.html");
    }

    //退出登录
    function logout(){
        unset($_SESSION["login"]);
        unset($_SESSION["user"]);
        $this->smarty->assign("noticeTitle","退出成功");
        $this->smarty->assign("noticePage","登录页面");
        $this->smarty->assign("noticeUrl","index.php?m=admin&&a=login");
        $this->smarty->display("notice.html");
        exit;
    }
}