/**
 * Created by Administrator on 2017/5/17.
 */
window.onload=function(){
    //top
    var ht=sessionStorage.getItem("name");
    document.getElementById("uname").innerHTML=ht;
    $(".to-top").on("click",function(){
        $("html,body").animate({scrollTop:0},500);
    })
    ;!function(){
        //当使用了 layui.all.js，无需再执行layui.use()方法

        var laypage = layui.laypage
            ,layer = layui.layer;
        //将一段数组分页展示
        $.ajax({
            url:"php/showdet.php",
            dataType:"json",
            type:"GET",
            success:function(data){
                var nums = 5; //每页出现的数据量
                //模拟渲染
                var render = function(data, curr){
                    var htm = ""
                        ,thisData = data.concat().splice(curr*nums-nums, nums);
                    layui.each(thisData, function(index, item){
                        var state=item.state==0?"随时看房":"已经在租";
                        htm+=`<div class="wrap" id=${item.id}><div class="wrap1 fl" style="background:url(bysj/${item.imagesrc}) no-repeat"></div> <div class="wrap2 fl"> <div class="title">${item.title}${item.detail}  ${item.floo}楼</div> <div class="time">发布时间：${item.tim}</div> <div class="state">${state}</div> </div> <div class="wrap3 fl">${item.price}元/月</div> </div>`;
                    });
                    return htm;
                };
                //调用分页
                if(data){
                    laypage({
                        cont: 'demo1'
                        ,pages: Math.ceil(data.length/nums) //得到总页数
                        ,jump: function(obj){
                            document.getElementById("home-list").innerHTML=render(data, obj.curr);
                        }
                    });
                }
                $(".wrap").on("click",function(){
                    sessionStorage.setItem("id",$(this).attr("id"));
                    location.href="show_detail.html";
                });
            }
        });
        $(".search-btn").on("click",function(){
            var key=$("#key").val();
            $.ajax({
                url:"php/search.php",
                dataType:"json",
                data:{key:key},
                type:"GET",
                success:function(data){
                    document.getElementById("home-list").innerHTML="";
                    if(data.length==0){
                        document.getElementById("home-list").innerHTML="未找到相关信息";
                    }
                    else{
                        var nums = 5; //每页出现的数据量
                        //模拟渲染
                        var render = function(data, curr){
                            var htm = ""
                                ,thisData = data.concat().splice(curr*nums-nums, nums);
                            layui.each(thisData, function(index, item){
                                var state=item.state==0?"随时看房":"已经在租";
                                htm+=`<div class="wrap" id=${item.id}><div class="wrap1 fl" style="background:url(bysj/${item.imagesrc}) no-repeat"></div> <div class="wrap2 fl"> <div class="title">${item.title}${item.detail}  ${item.floo}楼</div> <div class="time">发布时间：${item.tim}</div> <div class="state">${state}</div> </div> <div class="wrap3 fl">${item.price}元/月</div> </div>`;
                            });
                            return htm;
                        };
                        //调用分页
                        if(data){
                            laypage({
                                cont: 'demo1'
                                ,pages: Math.ceil(data.length/nums) //得到总页数
                                ,jump: function(obj){
                                    document.getElementById("home-list").innerHTML=render(data, obj.curr);
                                }
                            });
                        }
                        $(".wrap").on("click",function(){
                            sessionStorage.setItem("id",$(this).attr("id"));
                            location.href="show_detail.html";
                        });
                    }
                }
            });
        });
        $(".list li").each(function(index,item){
            $(this).on("click",function(){
                $(this).addClass("active").siblings(".active").removeClass("active");
                var area=$(".place ul li.active").index();
                var price=$(".price ul li.active").index();
                var huxing=$(".huxing ul li.active").index();
                console.log(area,price,huxing);
                $.ajax({
                    url:"php/keysearch.php",
                    dataType:"json",
                    data:{area:area,price:price,huxing:huxing},
                    type:"GET",
                    success:function(data){
                        document.getElementById("home-list").innerHTML="";
                        if(data.length==0){
                            document.getElementById("home-list").innerHTML="未找到相关信息";
                        }
                        else{
                            var nums = 5; //每页出现的数据量
                            //模拟渲染
                            var render = function(data, curr){
                                var htm = ""
                                    ,thisData = data.concat().splice(curr*nums-nums, nums);
                                layui.each(thisData, function(index, item){
                                    var state=item.state==0?"随时看房":"已经在租";
                                    htm+=`<div class="wrap" id=${item.id}><div class="wrap1 fl" style="background:url(bysj/${item.imagesrc}) no-repeat"></div> <div class="wrap2 fl"> <div class="title">${item.title}   ${item.detail}  ${item.floo}楼</div> <div class="time">发布时间：${item.tim}</div> <div class="state">${state}</div> </div> <div class="wrap3 fl">${item.price}元/月</div> </div>`;
                                });
                                return htm;
                            };
                            //调用分页
                            if(data){
                                laypage({
                                    cont: 'demo1'
                                    ,pages: Math.ceil(data.length/nums) //得到总页数
                                    ,jump: function(obj){
                                        document.getElementById("home-list").innerHTML=render(data, obj.curr);
                                    }
                                });
                            }
                            $(".wrap").on("click",function(){
                                sessionStorage.setItem("id",$(this).attr("id"));
                                location.href="show_detail.html";
                            });
                        }
                    }
                });
            })
        });
    }();
}