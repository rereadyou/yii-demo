<?php
$str = '
	[php]
	<?php
		$a=1;
		$b = "";
		$c = array();
	?>
	
';
$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
echo $str;
$this->endWidget();
?>