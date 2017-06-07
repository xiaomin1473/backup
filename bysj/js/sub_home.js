/**
 * Created by Administrator on 2017/5/18.
 */
window.onload=function() {
    //全局变量
    var name=sessionStorage.getItem("name")
    $("input[name='name']").val(name);
    var screenH = $(window).height();
    var screenW = $(window).width();
    $(".form-box").css({top: (screenH - 400) / 2 + "px", left: (screenW - 600) / 2 + "px"});
    //$(".submit").on("click",function(){
    //    var title=$("input[name='title']").val();
    //    var detail=$("input[name='detail']").val();
    //    var floo=$("input[name='floo']").val();
    //    var price=$("input[name='price']").val();
    //    var image=$("input[name='image']").val();
    //    var file=$("input[name='image']").prop("files")[0]
    //    var uid=sessionStorage.getItem("id");
    //    var state=0;
    //    $.ajax({
    //        url:"php/sub.php",
    //        data:{title:title,detail:detail,floo:floo,price:price,uid:uid,state:state,image:image,file:file},
    //        type:"POST",
    //        datatype:"text",
    //        success:function(data){
    //            //if(isNaN(data)){
    //            //    alert("ok");
    //            //}else if(data=="erro"){
    //            //    alert("err");
    //            //}
    //            console.log(data);
    //        }
    //    })
    //})
}

