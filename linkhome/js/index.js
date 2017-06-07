function clearCache(){
	window.onload = function(){
		var url = window.location.href;
		var ps = url.split("#");
		try{
			if(ps[1] != 1){
				url += "#1";
			}else{
				window.location = ps[0];
			}
		}catch(ex){
			url += "#1";
		}
		window.location.replace(url);

	};
}

//异步请求加载head和footer内容
$('#header').load('data/head.php',function(){
	$("#regist").html(sessionStorage.getItem("uname")||"登录");
});
$('#footer').load('data/footer.php');
//foot部分胶囊效果
$(document.body).on('mouseover','#hotCity>li',function(){
	var id=$(this).children('a').attr('href');
	$(id).addClass('show').siblings('.show').removeClass('show');
});
//鼠标移入指南出现下拉选项菜单
/*$(document.body).on('mouseover','.zhinan',function(){
	$('#zhinan').slideDowm(500);
});
$(document.body).on('mouseout','.zhinan',function(e){
	$('#zhinan').slideUp(500);
});*/
//搜索框上面两条提示信息轮播效果
var timer1=setInterval(function(){
	var liList=$('.wrapper-scroll>ul>li');
	for(var i=0;i<liList.length;i++){
		if(liList[i].className=="show"){
			liList[i].className="";
		}else{
			liList[i].className="show";
		}
	}
},2000);
//帮住小组
var timer2=setInterval(function(){
	var liList=$('.userhelp-foot>a');
	for(var i=0;i<liList.length;i++){
		if(liList[i].className=="show"){
			liList[i].className="";
		}else{
			liList[i].className="show";
		}
	}
},2000);
//右侧固定栏胶囊效果
$(document.body).on('mouseover','.detail>ul>li',function(){
	var id=$(this).children('a').attr('href');
	$(id).show().siblings('[id^="detail"]').hide();
});
$(document.body).on('mouseout','[id^="detail"]',function(){
	$(this).hide();
});
//登录框弹出事件
$(document.body).on('click','#regist',function(){
	$('.zhezhao')[0].style.display="block";
});
$(document.body).on('click','.regist>a',function(){
	$('.zhezhao')[0].style.display="none";
});
//异步验证用户账号和密码
$(document.body).on('click','.regist>.bt',function(){
	var uname=$('.regist>.regist-user>input').val();
	var pwd=$('.regist>.regist-pwd>input').val();
	$.get('data/login.php',{uname:uname,pwd:pwd},function(txt){
		if(txt=="succ"){
			$('.zhezhao')[0].style.display="none";
			location.href="shouye.html";
			sessionStorage.setItem("uname",uname);
		}
		else if(txt=="err"){
			$('.tishi')[0].style.display="block";
		}
	});
})

