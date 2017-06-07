$(function(){
    "use strict";
    //跳转页
    $(".noticeCon>span").html();
    var i=3;
    setInterval(function(){
        "use strict";
        i--;
        if(i==0){
            location.href=$("a").attr("href");
        }
        $(".noticeCon>span").html(i);
    },1000)
})