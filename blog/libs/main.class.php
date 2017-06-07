<?php
class main{
    function __construct(){
        $this->db=new db("shows");//连接数据库
        $this->smarty=new Smarty();//创建smarty对象
        $this->smarty->setTemplateDir("tpl/admin");//设置模板目录
        $this->smarty->setCompileDir("com");//设置缓存目录
        $this->smarty->assign("CSS_PATH",CSS_PATH);//分配变量
        $this->smarty->assign("JS_PATH",JS_PATH);
        $this->smarty->assign("IMG_PATH",IMG_PATH);
        $this->smarty->assign("UPLOAD_PATH",UPLOAD_PATH);
    }
    //层叠分类
    function tree($data,$pid,$step){
        global $strees;
        foreach($data as $v){
            if($v["pid"]==$pid){
                $flag=str_repeat("--",$step);
                $v["cname"]=$flag.$v["cname"];
                $strees[]=$v;
                $this->tree($data,$v["cid"],$step+1);
            }
        }
        return $strees;
    }
    //判断是否有子分类
    function son($cid){
        include "../public/db.class.php";
        $db=new db("category");
        $data=$db->select();
        foreach($data as $v){
            if($v["pid"]==$cid){
                return true;
            }
        }
        return false;
    }
}