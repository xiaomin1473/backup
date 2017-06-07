/******************************** register **********************************/
   var register_form = function () {
        var register = document.getElementById("register-form");
        register.style.display = "block";
    }

   var close_form = function () {
        var close = document.getElementById("register-form");
        close.style.display = "none";
    }

    var register_sponsor = function () {
        var register = document.getElementById("register-sponsor");
        register.style.display = "block";
    }

     var close_sponsor = function () {
        var close = document.getElementById("register-sponsor");
        close.style.display = "none";
    }

    var register_exhibitor = function () {
        var register = document.getElementById("register-exhibitor");
        register.style.display = "block";
    }

    var close_exhibitor = function () {
        var close = document.getElementById("register-exhibitor");
        close.style.display = "none";
    }

    var send = function () {
        var register = document.getElementById("send");
        register.style.display = "block";
    }

    var close_send = function () {
        var close = document.getElementById("send");
        close.style.display = "none";
    }

    var download = function () {
        var register = document.getElementById("download");
        register.style.display = "block";
    }

     var close_download = function () {
        var close = document.getElementById("download");
        close.style.display = "none";
    }

    var download1 = function () {
        var register = document.getElementById("download1");
        register.style.display = "block";
    }

    var close_download1 = function () {
        var close = document.getElementById("download1");
        close.style.display = "none";
    }

    var download2 = function () {
        var register = document.getElementById("download2");
        register.style.display = "block";
    }

    var close_download2 = function () {
        var close = document.getElementById("download2");
        close.style.display = "none";
    }

    var download3 = function () {
        var register = document.getElementById("download3");
        register.style.display = "block";
    }

    var close_download3 = function () {
        var close = document.getElementById("download3");
        close.style.display = "none";
    }

 /********************************* scroll *********************************/
$(function(){
    $("#my-navbar li").click(function() {
        $(this).siblings('li').removeClass('navbar-active');  // 删除其他兄弟元素的样式
        $(this).addClass('navbar-active');                            // 添加当前元素的样式
    });
});


var now = 0;
var flag = 0;
var sum =1000;
var spk =1840;
var agd =2510;
var psp = 3450;
var ven = 4300;
var ptt = 4600;

function summary(){
    // now = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
    // flag = sum - now;
    // console.log(flag);
    // console.log(now);
    //     if(flag > 0){
    //         var timer=setInterval( function moveDown(){
    //             now +=15;
    //                 if (now > sum) { clearInterval(timer); }
    //                 scrollTo(0,now);
    //              },1);
    //         return;
    //     } else if(flag < 0){
    //         var timer=setInterval( function moveUp() {
    //             now -=15;
    //                 if (now < sum) {clearInterval(timer); }
    //                 scrollTo(0,now);
    //             },1);
    //         return;
    //     }else {
    //         return;
    //     }
    $("body,html").animate({scrollTop:sum},1000);
}

function speaker(){
    // now = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
    // flag = spk - now;
    //     if(flag > 0){
    //         var timer=setInterval( function moveDown(){
    //             now +=15;
    //                 if (now > spk) { return; }
    //                 scrollTo(0,now);
    //         },1);
    //         return;
    //     } else if(flag < 0){
    //         var timer=setInterval( function moveUp() {
    //         now -=15;
    //             if (now < spk) { return; }
    //             scrollTo(0,now);
    //         },1);
    //          return;
    //     }else {
    //         return;
    //     } clearInterval(timer);
     $("body,html").animate({scrollTop:spk},1000);
}

function agenda(){
    // now = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
    // flag = agd - now;
    //     if(flag > 0){
    //         var timer=setInterval(function moveDown(){
    //             now +=15;
    //                 if (now > agd) { return; }
    //                 scrollTo(0,now);
    //         },1);
    //     } else if(flag < 0){
    //         var timer=setInterval(function moveUp() {
    //         now -=15;
    //             if (now < agd) { return; }
    //             scrollTo(0,now);
    //         },1);
    //     }else {
    //         return;
    //     } clearInterval(timer);
     $("body,html").animate({scrollTop:agd},1000);
}

function partnership(){
    //  now = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
    // flag = psp - now;
    //     if(flag > 0){
    //         var timer=setInterval( function moveDown(){
    //             now +=15;
    //                 if (now > psp) { return; }
    //                 scrollTo(0,now);
    //         },1);
    //     } else if(flag < 0){
    //         var timer=setInterval(function moveUp() {
    //         now -=15;
    //             if (now < psp) { return; }
    //             scrollTo(0,now);
    //         },1);
    //     }else {
    //         return;
    //     }
     $("body,html").animate({scrollTop:psp},1000);
}

function venue(){
    // now = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
    // flag = ven - now;
    //     if(flag > 0){
    //         var timer=setInterval(function moveDown(){
    //             now +=15;
    //                 if (now > ven) { return; }
    //                 scrollTo(0,now);
    //         },1);
    //     } else if(flag < 0){
    //         var timer=setInterval(function moveUp() {
    //             now -=15;
    //                 if (now < ven) { return; }
    //                 scrollTo(0,now);
    //         },1);
    //     }else {
    //         return;
    //     }
     $("body,html").animate({scrollTop:ven},1000);
}

function participants(){
    // now = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
    // flag = ptt - now;
    //     if(flag > 0){
    //         var timer=setInterval (function moveDown(){
    //             now +=15;
    //                 if (now > ptt) { return; }
    //                 scrollTo(0,now);
    //         },1);
    //     } else if(flag < 0){
    //         var timer=setInterval( function moveUp() {
    //             now -=15;
    //                 if (now < ptt) { return; }
    //                 scrollTo(0,now);
    //         },1);
    //     }else {
    //         return;
    //     }
     $("body,html").animate({scrollTop:ptt},1000);
}
 /******************************** carousel ********************************/
$('.carousel').carousel({
  interval: 3000
})
    
//   $(".wrapper>li").click(function() {
//         $(this).siblings('li').removeClass('agenda-wrapper-close');    // 删除其他兄弟元素的样式
//         $(this).addClass('agenda-wrapper-close');                            // 添加当前元素的样式
//     });


    // $(".speakers .content").on('click', 'li', function() {
    //     $(".speakers .content li>main").css("height")   // 删除其他兄弟元素的样式
    //     $(this).addClass('height');                            // 添加当前元素的样式
    // });
    var liList=$(".speakers .content li");
    liList.each(function(index,item){
            $(this).on('click',function(){
                console.log(index);
                $(this).find(".main").css("height","178px");
                $(this).siblings("li").find(".main").css("height","0");
            })
    })

var switchList=$("#agenda_switch li");
var wrapList=$(".wrapper>li");
switchList.each(function(index,item){
    $(this).on("click",function(){
        $(this).siblings('li').removeClass('agenda-active');  // 删除其他兄弟元素的样式
        $(this).addClass('agenda-active'); 
        $(wrapList[index]).siblings('li').addClass('agenda-wrapper-close'); 
        $(wrapList[index]).removeClass('agenda-wrapper-close');
    })
})
var left_btn=$(".blue .left");
var right_btn=$(".blue .right");
left_btn.on("click",function(){
    var left=parseInt($(".blue .ccccc").css("left"));
   if(left==0){
        return;
   }else{
       left+=290;
        $(".blue .ccccc").animate({left:left},200);
   }
})
right_btn.on("click",function(){
    var left=parseInt($(".blue .ccccc").css("left"));
    if(left==-580){
        return;
    }else{
        left-=290;
        $(".blue .ccccc").animate({left:left},200);
    }
})
// $("#agenda_switch li").click(function() {
//     $(this).siblings('li').removeClass('agenda-active');  // 删除其他兄弟元素的样式
//     $(this).addClass('agenda-active');                            // 添加当前元素的样式
// });


 /******************************** Scroll_listener ********************************/
window.onload = function() {
    document.addEventListener("mousewheel",function(){
        var scrollTop= (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
    var headerTop = document.getElementById("header_top");
             if(scrollTop > 500) {
            headerTop.setAttribute("class",'header-top');
        }
        else{
            headerTop.setAttribute("class",'header');
        }
    })
    window.onscroll=function(){
        var scrollTop= (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
    var headerTop = document.getElementById("header_top");
             if(scrollTop > 500) {
            headerTop.setAttribute("class",'header-top');
        }
        else{
            headerTop.setAttribute("class",'header');
        }
    }
//表单验证
var reg={
    email:/^[a-zA-Z0-9_\.]+@[a-zA-Z0-9-]+[\.a-zA-Z]+$/,
    ftname:/^[a-zA-Z]{1,12}$/,
    ltname:/^[a-zA-Z]{1,12}$/,
    ori:/^[a-zA-Z0-9]{1,30}$/,
    title:/^[a-zA-Z0-9]{1,30}$/,
    country:/^[a-zA-Z]{1,20}$/,
    tel:/^1[34578]\d{9}$/,
    mob:/^1[34578]\d{9}$/,
}
var errorObj={
    email:'Email format error!',
    ftname:'Name format error!',
    ltname:'Name format error!',
    ori:'Ori format error!',
    title:'Title format error!',
    country:'Ctry format error!',
    tel:'Tel format error!',
    mob:'Mobel format error!',
}
var emptyObj={
    email:'Email can\'t be empty',
    ftname:'Name can\'t be empty',
    ltname:'Name can\'t be empty',
    ori:'Ori can\'t be empty',
    title:'Title can\'t be empty',
    country:'Ctry can\'t be empty',
    tel:'Tel can\'t be empty',
    mob:'',
}
function salert(item,str){
    $(item).nextAll("span").html(str);
}
function delSalert(item){
    $(item).nextAll("span").html("√");
}
function getCheckboxValue(elements) {
   var arr = new Array();
   for(var i = 0, len = elements.length; i < len; i++ ) {
    if(elements[i].checked) {
     arr.push(elements[i].value);
    }
   }
   if(arr.length > 0) {
    return arr.join(',');
   } else {
    return null; // null表示没有选中项
   } 
  }
  var checkBox1=$("input[name='checkbox1']");
  var checkBox2=$("input[name='checkbox2']");

function formVaild(ele,e){
    var valid=true;
    if(valid){
        ele.each(function(index,item){
            var name=item.name;
            var value=item.value;
            if(!reg[name].test(value)&&value!==''){
                vaild=false;
                salert(item,errorObj[name]);
                return false;
            }
            else if(value==''){
                valid=false;
                salert(item,emptyObj[name]);
                return false;
            }else{
                delSalert(item);
            }
        })
    }
    if(!valid){
        e.preventDefault;
        return false;
    }
    if(valid){
        var obj={};
        ele.each(function(index,item){
           // var name=item.name;
            var value=item.value;
            obj[item.name]=value;
        })
        var arr1=getCheckboxValue(checkBox1);
        var arr2=getCheckboxValue(checkBox2);
        var textarea=$("#textarea").val();
        obj["check1"]=arr1;
        obj["check2"]=arr2;
        obj["textarea"]=textarea;
        $.ajax(
            {
                type: "post",
                url:"static/register.php",
                data:obj,
                success:function(data){
                    console.log(data);
                    console.log(obj);
                    alert("发送成功，点击确定刷新页面");
                    window.location.reload();
                },
                error:function(data){
                    alert("发送失败，点击确定刷新页面，再不行请联系管理员");
                }
            }
        )
        
        // $.ajax({
        //   type: "POST",
        //   url: "static/form.php",
        //   data: { name: "John", location: "Boston" }
        // }).done(function( msg ) {
        //   alert( "Data Saved: " + msg );
        // });
        // $.ajax({
        //     type: "get",//数据发送的方式（post 或者 get）
        //     url: "static/form.php",//要发送的后台地址
        //     data: obj,//要发送的数据（参数）格式为{'val1':"1","val2":"2"}
        //     dataType: "json",//后台处理后返回的数据格式
        //     success: function (data) {//ajax请求成功后触发的方法
        //        console.log(data);
        //     },
        //     error: function (msg) {//ajax请求失败后触发的方法
        //         alert("error");//弹出错误信息
        //     }
        // });
    }
}
var submit=$("form>#submit");
$(submit).each(function(index,item){
        $(this).on("click",function(e){
            var inputList=$(this).parent().find(".register-form form .input>li>input");
            formVaild(inputList,e);
        })
    })
}
