<?php
session_start();
define("ROUTE_PATH",dirname($_SERVER["SCRIPT_FILENAME"])."/");//文件在本地的目录
define("WEB_PATH",dirname("http://".$_SERVER["SERVER_NAME"].$_SERVER["SCRIPT_NAME"])."/");//文件在服务器上的目录
define("WEB_URL","http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);//文件在服务器上的完整地址
define("CSS_PATH",WEB_PATH."static/after/css/");
define("JS_PATH",WEB_PATH."static/after/js/");
define("IMG_PATH",WEB_PATH."static/after/img/");
define("FCSS_PATH",WEB_PATH."static/web/css/");
define("FJS_PATH",WEB_PATH."static/web/js/");
define("FIMG_PATH",WEB_PATH."static/web/img/");
define("UPLOAD_PATH",WEB_PATH."upload/");
include ROUTE_PATH."libs/smarty-3.1.30/libs/Smarty.class.php";
include ROUTE_PATH."libs/main.class.php";
include ROUTE_PATH."libs/index.class.php";
include ROUTE_PATH."public/db.class.php";
include ROUTE_PATH."libs/route.class.php";
$route=new route();
$route->init();
