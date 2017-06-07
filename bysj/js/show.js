/**
 * Created by Administrator on 2017/5/23.
 */
window.onload=function(){
    var ht=sessionStorage.getItem("name");
    document.getElementById("uname").innerHTML=ht;
    var id=sessionStorage.getItem("id");
    $.ajax({
        url:"php/idshow.php",
        dataType:"json",
        data:{id:id},
        success:function(data){
            var data=data[0];
            $("#image").css("background-image","url(bysj/"+data.imagesrc+")");
            $("#title")[0].innerHTML=data.title;
            $("#detail").html(data.detail);
            $("#price").html(data.price);
            $("#floo").html(data.floo);
            $("#state").html(data.state==0?"随时看房":"已经出租");
            $("#time").html(data.tim);
            $("#usname").html(data.uname);
            $("#uphone").html(data.uphone)
        }
    });
    $(".add-btn").on("click",function(){
        $.ajax({
            url:"php/add.php",
            dataType:"text",
            data:{uname:ht,did:id},
            success:function(data){
                if(data=="succ"){
                    alert("已经添加到我的清单");
                }
            }
        })
    })
}