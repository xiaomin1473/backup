/**
 * Created by Administrator on 2017/5/17.
 */
window.onload=function(){
    var screenH=$(window).height();
    var screenW=$(window).width();
    var formBox = $('.form-box'); // 表单
    var inputElement = $('.input-text', formBox); // 输入框集合
    //跳转函数
    var jump=function(href){
        location.href=href;
    }
    //提示函数
    function salert(str){
        $("#salert").css({"display":"block","top":(screenH-404)/2+"px","left":(screenW-504)/2+"px"});
        $("#salert").html(str);
    }
    //登录框居中
    $("#form-box").css({top:(screenH-304)/2+"px",left:(screenW-504)/2+"px"});
    // 正则表达式
    var reg = {
        password: /^[0-9a-zA-Z]{6,100}$/,
        mobile: /^1[3|4|5|7|8]\d{9}$/,
        name: /^[0-9a-zA-Z\u4e00-\u9fa5]{2,100}$/
    };

// 表单输入错误提示信息
    var errObj = {
        name: "用户名不少于两位汉字或者英文",
        password: "密码不少于两位汉字或者英文",
        mobile: "手机格式错误"
    };

// 表单为空提示信息
    var emptyObj = {
        name: "用户名不能为空",
        mobile: "手机号码不能为空",
        password: "密码不能为空"
    };
    //验证表单函数
    var formValidation=function (ele, e) {
        var valid = true;
        if (valid) {
            ele.each(function (index, item) {

                var name = item.name;
                var value = item.value;

                if (!reg[name].test(value) && value !== '') {
                    valid = false;
                    salert(errObj[name]);
                    return false;
                }
                else if (value === '') {
                    valid = false;
                    salert(emptyObj[name]);
                    return false;
                }
            });
        }
        if(valid){
            if(!$(".check-btn").is(':checked')){
                salert("请阅读用户协议并勾选同意");
                return false;
            }
        }
        if(valid){
            var name=$("input[name='name']").val();
            var password=$("input[name='password']").val();
            var mobile=$("input[name='mobile']").val();
            $.ajax({
                url:"php/regist.php",
                dataType:"text",
                type:"GET",
                data:{name:name,password:password,mobile:mobile},
                success:function(data){
                    if(data=="succ"){
                        sessionStorage.setItem("name",name);
                        jump("host.html");
                    }else if(data=="erro"){
                        salert("用户名或密码错误");
                    }
                },
                error:function(){
                    salert("服务器错误");
                }
            })
        }

    }
    $(".regist").on("click",function(e){
        formValidation(inputElement, e);
    })
}