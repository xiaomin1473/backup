$(function(){
    var flag;
    var pass;
    $(".user").blur(function(){
        var reg=/^[A-z]\w{4,11}/g;
        var val=$(this).val();
        if(reg.test(val)){
            flag=true;
            $(".error").eq(0).html("");
            $(".pass").blur(function(){
                var reg1=/\w{6,20}/g;
                pass=$(this).val();
                if(reg1.test($(this).val())){
                    $(".error").eq(1).html("");
                    $.ajax({
                        url:"index.php?m=admin&&a=checkLogin",
                        type:"post",
                        data:{user:val,pass:pass},
                        success:function(a){
                            console.log(a);
                            if(a=="no"){
                                $(".error").eq(1).html("用户名或密码不正确").css("color","red");
                            }else{
                                $(".error").eq(1).html("");
                                if(flag){
                                    $(".login").removeAttr("disabled","disabled");
                                }else{
                                    $(".login").attr("disabled","disabled");
                                }
                            }
                        }
                    });

                }else{
                    $(".error").eq(1).html("密码为6-20位").css("color","red");
                }
            });

        }else{
            flag=false;
            $(".error").eq(0).html("字母开头的6-12位的数字字母或_").css("color","red");
        }
    });

})