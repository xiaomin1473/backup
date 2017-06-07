/**
 * Created by cuiyu on 2016/11/2.
 */
/*登录和注册两个页面间切换*/
$(".regist-title-right>a").click(function(){
    if($(this).html()=="马上登录"){
        $(this).html("马上注册");
        $(".regist-form").fadeOut(1000);
        $(".login-form").fadeIn(1000);
    }else{
        $(this).html("马上登录");
        $(".regist-form").fadeIn(1000);
        $(".login-form").fadeOut(1000);
    }
});
/*注册表单的验证和异步验证及提交*/
var uphone=document.getElementById("uphone");
var uname=document.getElementById("uname");
var upwd=document.getElementById("upwd");
var urpwd=document.getElementById("urpwd");
uphone.onblur=function(){
    var uphone=this.value;
    if(this.validity.valueMissing){
       $(this).next().show().html("手机号码不能为空");
    }else if(this.validity.patternMismatch){
        $(this).next().show().html("手机号码格式不正确");
    }else if(this.validity.valid){
        $.get("data/regist-phone.php",{uphone:uphone},function(data){
            if(data=="succ"){
                $("#uphone").next().show().html("该号码已被注册");
            }else if(data=="erro"){
                $("#uphone").next().hide();
                return true;
            }
        })
    }
}
uname.onblur=function(){
    if(this.validity.valueMissing){
        $(this).next().show().html("昵称不能为空");
    }else if(this.validity.valid){
        $(this).next().hide();
        return true;
    }
}
upwd.onblur=function(){
    if(this.validity.valueMissing){
        $(this).next().show().html("密码不能为空");
    }else if(this.validity.valid){
        $(this).next().hide();
        return true;
    }
}
urpwd.onblur=function(){
    var pwd=upwd.value;
    var rpwd=this.value;
    if(this.validity.valueMissing){
        $(this).next().show().html("密码不能为空");
    }else if(pwd!=rpwd){
        $(this).next().show().html("两次密码不一样");
    } else if(this.validity.valid){
        $(this).next().hide();
        return true;
    }
}
$("#regist-btn").click(function(){
    var uphone=document.getElementById("uphone");
    var uname=document.getElementById("uname");
    var upwd=document.getElementById("upwd");
    var urpwd=document.getElementById("urpwd");
    var uphone=uphone.value;
    var uname=uname.value;
    var upwd=upwd.value;
    var urpwd=urpwd.value;
    if(uphone&&uname&&upwd&&urpwd){
        $.get("data/regist.php",{uphone:uphone,uname:uname,upwd:upwd},function(data){
            if(data=="succ"){
                location.href="shouye.html";
                sessionStorage.setItem("uname",uname);
            }else if(data=="err"){
                alert("注册信息被吸进黑洞了，请重新刷新网页");
            }
        })
    }
});
/*登录以及异步验证*/
var luphone=document.getElementById("luphone");
var lupwd=document.getElementById("lpwd");
luphone.onblur=function(){
    if(this.validity.valueMissing){
        $(this).next().show().html("手机号码不能为空");
    }else if(this.validity.valid){
        $(this).next().hide();
        return true;
    }
}
lupwd.onblur=function(){
    if(this.validity.valueMissing){
        $(this).next().show().html("密码不能为空");
    }else if(this.validity.valid){
        $(this).next().hide();
        return true;
    }
}
$("#login-btn").click(function(){
    var luphone=document.getElementById("luphone");
    var lupwd=document.getElementById("lpwd");
    var luphone=luphone.value;
    var lupwd=lupwd.value;
    console.log(luphone&&lupwd);
    if(luphone&&lupwd){
        console.log(luphone.onblur&&lupwd.onblur);
        $.get("data/login-two.php",{uphone:luphone,upwd:lupwd},function(data){
            if(data=="err"){
                $("#lpwd").next().show().html("密码错误");
            }else{
                sessionStorage.setItem("uname",data);
                location.href="shouye.html";

            }
        })
    }
})



