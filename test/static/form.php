<?php

$obj=$_POST;

if(empty($obj)){
    echo "没有表单数据，请返回之前页面重新进行提交数据！";
}
else {
    require_once("email/main.php");

    // $to = '505040575@qq.com';
    $to = 'poseidanevents@gmail.com';

    $title = "Register";

    $content = "<h3>Register</h3>"."<span>Email：".$obj['email']."</span><br>"."<span>name：".$obj['ftname'].$obj['ltname']."</span><br>"."<span>Title：".$obj['title']."</span><br>"."<span>Country：".$obj['country']."</span><br>"."<span>Telephone：".$obj['tel']."</span><br>"."<span>Mobelphone：".$obj['mob']."</span><br>"."<span>More infomations：".$obj['check1']."</span><br>"."<span>Find us way：".$obj['check2']."</span><br>"."<span>Message：".$obj['textarea']."</span><br>";

    sendMail($to, $title, $content);
}