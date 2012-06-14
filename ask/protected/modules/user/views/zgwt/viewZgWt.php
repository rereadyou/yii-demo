<?php
$this->breadcrumbs=array(
	'Zg Wt',
);?>
<ul>
	<?php
		
		echo "发布人：$wt->userName <br>";
		echo "标题：$wt->title <br>";
		echo "内容：$wt->content <br>";
		echo "回复者<br>";
		foreach ($reply = $wt->jieqia as $kk=>$vv)
			echo "<p>编号{$kk}：$vv->content, 回复者：".$vv->user->TrueName."</p>";
		
	?>		  
</ul>



