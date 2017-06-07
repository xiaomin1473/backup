$(function(){
    "use strict";
    //登录
    // $(".loginbox>li").eq(1).hide();
    // $(".loginbox>li").click(function(){
    //     $(this).siblings().show().hide();
    // })
    //导航栏
    $("#topnav>ul>li").eq(0).children().attr("id","topnav_current");
    $("#topnav>ul>li").click(function(){
        var index=$(this).index();
        $("#topnav>ul>li").children().removeAttr("id","topnav_current").eq(index).attr("id","topnav_current");
        location.href=$(this).children().attr("title");
    });
    //评论
    $(".ms-top li").eq(0).addClass("cur");
    $(".ms-top li").hover(function(){
        var index=$(this).index();
        $(".ms-main .bd").hide().eq(index).show();
        $(".ms-top li").removeClass("cur");
        $(this).addClass("cur");
    },function(){});
    //留言
    $("#message").click(function(){
        var val=$("#liu").val();
        if(val!=""){
            $.ajax({
                url:"index.php?a=addMessage",
                data:"liucon="+val,
                type:"post",
                success:function(e){
                    console.log(e)
                    if(e=="login"){
                        alert("请登录!");
                        location.href="index.php?a=login";
                    }else{

                    }
                }
            })
        }else{
            alert("请留言!");
        }
    })
    //留言评论
    $(".pingl").click(function(){
        var ul=$(".showMessage>ul");
        var input=$(document).createElement("<textarea>");
        input.append(ul);
    })
})

