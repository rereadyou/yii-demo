
<?php if(Yii::app()->user->hasFlash('success')):
        ?>

<div class="flash-success">
	<?php echo app()->user->getFlash('success'); ?>

 
</div>
<?php else: ?>
<div>
    fdsdsfsdfsdf

</div>
<?php endif; ?>