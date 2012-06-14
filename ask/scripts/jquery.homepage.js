var attribute, buttonID, contentID;
(function($) {
	$(".my_info").mouseover(function(){
		attribute = $(this).attr("id");
//		contentID = attribute + "co";
		buttonID = attribute + "op";
		$("#" +buttonID).css("display", "block"); 
	});
	$(".my_info").mouseout(function(){
		$("#" +buttonID).css("display", "none");
	});
	//普通input框
	$(".my_info button[name=textEdit]").live('click', function(){
		var uri = "?r=ajax/loadText&";
		
		resetCondition(this);
		loadEditor(uri, this);
		
	});
	//富文本编辑框
	$(".my_info button[name=fckEdit]").live('click',function(){
		var uri = "?r=ajax/loadFck&";
		
		resetCondition(this);
		loadEditor(uri, this);
	});
	//下拉框选择
	$(".my_info button[name=selectEdit]").live('click', function(){
		var uri = "?r=ajax/loadSelect&";
		
		resetCondition(this);
		loadEditor(uri, this);
		
	});
	//图片上传
	$(".my_info button[name=picEdit]").live('click',function(){
		var uri = "?r=ajax/loadPic&";
		
		resetCondition(this);
		loadPicEditor(uri, this);
	});
	

})(jQuery);
//点击编辑按钮时，重新获取定位信息，例如buttonID
function resetCondition(obj){
	buttonID = $(obj).parent().attr("id");
	attribute = buttonID.replace('op', '');
	contentID = attribute + "co";
}

//加载编辑框，根据url不同加载不同的
function loadEditor(uri, obj){
	uri += attribute + "=" + encodeURI($("#" +contentID).html());
		
	$.post(uri, {model: tableModel}, function(content){
		$("#" +contentID).html(content);
	});
	//去掉“编辑”框
	$(obj).parent().html('');
}


//修改完后，重新获取内容
function showContent(contentID){
	var attr = contentID.replace('co', '');
	if(attr == 'PCnameid') attr = 'cnameid';
	
	var uri = "?r=ajax/getContent";
	$.post(uri, {model: tableModel, attr: attr}, function(content){
		if(content.indexOf('img') > -1){
			$("#" +contentID).html('');
			var img = $(content);
			img.css("width", $("#" +contentID).css("width"));
			img.css("height", $("#" +contentID).css("height"));
			img.appendTo($("#" +contentID));
		}else
			$("#" +contentID).html(content);
	});
	//增加“编辑”框
	buttonID = contentID.replace('co', 'op');
	//根据这个的样式名称，确定编辑框类别，
	var cssName = $("#" +buttonID).attr("class");
	var bianji = $("<button></button>");
	bianji.attr("name", cssName);
	bianji.html("编辑");
	bianji.appendTo($("#" +buttonID));	
}

//加载编辑框，根据url不同加载不同的
function loadPicEditor(uri, obj){
	uri += attribute + "=" + encodeURI($("img", "#" +contentID).attr("src"));
		
	$.post(uri, {model: tableModel}, function(content){
		$("#" +contentID).html(content);
	});
	//去掉“编辑”框
	$(obj).parent().html('');
}