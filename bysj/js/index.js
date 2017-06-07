window.onload=function(){
    //全局变量
    var screenH=$(window).height();
    var screenW=$(window).width();
    var formBox = $('.form-box'); // 表单
    var inputElement = $('.input-text', formBox); // 输入框集合
    var jump=function(href){
        location.href=href;
    }
    //登录框居中
    $("#form-box").css({top:(screenH-304)/2+"px",left:(screenW-504)/2+"px"});
    $(".regist").on("click",function(){
        jump("regist.html");
    })
    // 正则表达式
    var reg = {
        name: /^[0-9a-zA-Z\u4e00-\u9fa5]{2,100}$/,
        password: /^[0-9a-zA-Z]{6,100}$/
    };

// 表单输入错误提示信息
    var errObj = {
        name: "用户名不少于两位汉字或者英文",
        password: "密码不少于六位汉字或者英文"
    };

// 表单为空提示信息
    var emptyObj = {
        name: "用户名不能为空",
        password: "密码不能为空"
    };
    //提示函数
    function salert(str){
        $("#salert").css({"display":"block","top":(screenH-404)/2+"px","left":(screenW-504)/2+"px"});
        $("#salert").html(str);
    }
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
            var name=$("input[name='name']").val();
            var password=$("input[name='password']").val();
            $.ajax({
                url:"php/login.php",
                dataType:"text",
                type:"GET",
                data:{name:name,password:password},
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
    $(".login").on("click",function(e){
        formValidation(inputElement, e);
    })
}
