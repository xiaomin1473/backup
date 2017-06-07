<?php
header("Content-Type:text/html;charset=utf-8");
class route{
    static $module;//定义模块（可理解为分属前台还是后台）
    static $control;//定义控制器（可以理解为是某个文件）
    static $action;//定义动作（可理解为是要执行的方法）
    static $param;//定义参数（通过参数控制达到子页面的显示）
    function init(){
        self::$module=self::getM();
        self::$control=self::getC();
        self::$action=self::getA();
        self::$param=self::getP();
        $url=ROUTE_PATH.self::$module."/".self::$control."Control.class.php";//确定要引入的控制器（文件）
        if(is_file($url)){
            include $url;
            $classname=self::$control."Control";
            $obj=new $classname();
            if(class_exists($classname)){
                if(method_exists($obj,self::$action)){
                    @call_user_func_array(array($obj,self::$action),array(self::$param));
                }else{
                    echo self::$action."方法不存在";
                }
            }else{
                echo $classname."类不存在";
            }

        }else{
            echo $url."不存在";
        }
    }
    function getM(){
        return(isset($_GET["m"])&&!empty($_GET["m"])?$_GET["m"]:"index");
    }
    function getC(){
        return(isset($_GET["c"])&&!empty($_GET["c"])?$_GET["c"]:"index");
    }
    function getA(){
        return(isset($_GET["a"])&&!empty($_GET["a"])?$_GET["a"]:"index");
    }
    function getP(){
        $id=isset($_GET["id"])?$_GET["id"]:"";
        $cid=isset($_GET["cid"])?$_GET["cid"]:"";
        $pid=isset($_GET["pid"])?$_GET["pid"]:"";
        $uid=isset($_GET["uid"])?$_GET["uid"]:"";
        return Array(
            "id"=>$id,//=> 键值对连接符
            "cid"=>$cid,
            "pid"=>$pid,
            "uid"=>$uid
        );
    }
}