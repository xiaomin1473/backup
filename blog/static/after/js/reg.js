$(function(){
    var flag;
    $(".user").blur(function(){
        var reg=/^[A-z]\w{4,11}/g;
        var val=$(this).val();
        if(reg.test(val)){
            flag=true;
            $(".error").eq(0).html();
            $.ajax({
                url:"index.php?m=admin&&a=checkRegs",
                type:"post",
                data:"user="+val,
                success:function(a){
                    if(a=="ok"){
                        $(".error").eq(0).html("用户名已存在").css("color","red");
                    }else{
                        $(".error").eq(0).html("用户名可用").css("color","green");
                    }
                }
            });
        }else{
            flag=false;
            $(".error").eq(0).html("字母开头的6-12位的数字字母或_").css("color","red");
        }
    });
    $(".pass").blur(function(){
        var reg1=/\w{6,20}/g;
        if(reg1.test($(this).val())){
            $(".error").eq(1).html("");
            if(flag){
                $(".login").removeAttr("disabled","disabled");
            }else{
                $(".login").attr("disabled","disabled");
            }
        }else{
            $(".error").eq(1).html("密码为6-20位").css("color","red");
        }
    });
})