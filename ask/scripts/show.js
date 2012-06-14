$(function(){
	$('span',$('.ping')).each(function(){
		$(this).click(function(){
			var tthis = $(this)
			$.get($(this).attr('href'),function(data){
				
				if(data == 0 ){
					alert('登陆后才能评论');
				}else if(data == -1){
					alert('您已经评论过');
				}else{
					alert('感谢您的评论');
					tthis.html(data);
				}
				
			})
			return false;
		})
	});
	
	$("#ajax_login input[type=button]").click(function(){
		uri = '?r=site/ajaxLogin';
			
		$.post(uri, {username: $('#ajax_username').val(), password: $("#ajax_password").val()}, function(xml){
			if(xml == 1){
				showAjaxLogin();
				$("#userinfo_area").html("<div class='f_l'><input type='image' src='/images_1/submitask.jpg' width='200' height='26' /></div>"+
					"<div class='f_l margin_left_10 margin_top_7'>欢迎您，"+$('#ajax_username').val()+" <a href='?r=site/logout&referer="+encodeURIComponent(location.href)+"'>退出</a></div>");
			}else{
				alert("登录失败，用户名或者密码错误！");
			}
		});
	});
	
});


function setTab2(name,cursel,n){
	for(i=1;i<=n;i++){
		var menu=document.getElementById(name+i);
		var con=document.getElementById("con_"+name+"_"+i);
		menu.className=i==cursel?"rover":"rnorm";
		 con.style.display=i==cursel?"block":"none";
	}
} 


function showAjaxLogin(){
	$("#ajax_login").css('display') == 'block' ? $("#ajax_login").css('display', 'none') : $("#ajax_login").css('display', 'block'); 
}

function showDiv(divID){
	$("#" + divID).css('display') == 'block' ? $("#" + divID).css('display', 'none') : $("#" + divID).css('display', 'block'); 
}

function setBestAnswer(qid, rid, replyer){
	var best = $("#best_" + rid).val();
	uri = '?r=zixun/setBestAnswer';
	$.post(uri, {qid: qid, rid: rid, best: best, replyer: replyer}, function(xml){
		
		if(xml == -1)
			alert('已经有最佳答案了！');
		else if(xml == 0)
			alert('参数错误');
		else
			alert('设定最佳答案成功！');
	});
	showDiv('bestDiv_' + rid);
}

function editAnswer(rid){
	var answer = $("#editAnswer_" + rid).val();
	uri = '?r=reply/edit';
	$.post(uri, {rid: rid, answer: answer}, function(xml){
		if(xml == -1)
			alert('内容中含有违禁词');
		else if(xml == 0)
			alert('参数错误');
		else{
			$('#showAnswer_' + rid).html(answer);
			alert('修改成功！');
		}
	});
	showDiv('editDiv_' + rid);
	
}

function ShowPerson(id){
	window.open("http://www.9ask.cn/souask/showperson.asp?id="+id+"",'用户信息中心',"width=600,height=400");
}