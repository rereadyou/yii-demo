
<?php if(Yii::app()->user->hasFlash('success')):
        ?>
问题发布成功！
<div class="flash-success">
	<?php echo app()->user->getFlash('success'); ?>

 
</div>
<?php else: ?>
<div>
 

</div>
<?php endif; ?>