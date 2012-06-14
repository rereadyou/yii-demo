<form action="?r=ajax/submit" target="submitIframe" method="post">
	<input type="text" name="<?php echo $modelName."[$attr]"?>" value="<?php echo $model->$attr; ?>">
	<input type="submit" value="提交">
	<input type="button" value="取消" onclick="showContent('<?php echo $attr?>co');">
</form>

<iframe name="submitIframe" style="display: none" src="">