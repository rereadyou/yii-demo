1。不可以上传exe，bat等格式的文件
2。文件最大为2M
<br />
<form action="?r=ajax/upload" target="submitIframe" method="post" enctype="multipart/form-data">
	<input type="hidden" name="<?php echo $modelName."[$attr]"?>">
	<input type="file" name="<?php echo $modelName?>[image4upload]">
	<input type="submit" value="上传">
	<input type="button" value="取消" onclick="showContent('<?php echo $attr?>co');">
</form>

<iframe name="submitIframe" style="display: none" src="">