<div>
	fjsiadfidsjfisadjfiasdjfiasdjfisadjif<br />
	<span style="color: red">fdif</span>
</div>


<div id="userpic" class="my_info">
	律师照片：
	<div id="userpicco" style="width: 100px;height: 100px;">
		<img src="http://img.9ask.cn/<?php echo $user->userpic;?>"/>
	</div>
	<div id="userpicop" style="display:none" class="picEdit">
		<button name="picEdit">编辑</button>
	</div>
</div>

<div id="jianjie" class="my_info">
	律师简介：
	<div id="jianjieco">
	<?php
		echo $user->jianjie;
	?>
	</div>
	<div id="jianjieop" style="display:none" class="fckEdit">
		<button name="fckEdit">编辑</button>
	</div>
</div>
<div>
	<div style="color:red">222222222222</div>
	11111111111111111111111111
</div>


<div id="Phone" class="my_info">
	律师电话：
	<div id="Phoneco">
	<?php
		echo $user->Phone;
	?>
	</div>
	<div id="Phoneop" style="display:none" class="textEdit">
		<button name="textEdit">编辑</button>
	</div>
</div>


<div id="PCnameid" class="my_info">
	所在地区：
	<div id="PCnameidco">
	<?php
		echo $user->cnameid;
	?>
	</div>
	<div id="PCnameidop" style="display:none" class="selectEdit">
		<button name="selectEdit">编辑</button>
	</div>
</div>


<script type="text/javascript">
<!--
//定义表的模型，这点很重要，
var tableModel = 'OaskUser';
//-->
</script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery.homepage.js"></script>

