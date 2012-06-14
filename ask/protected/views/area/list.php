<?php
$this->widget('area');
$i=0;$j=0;
foreach ($ps as $k=>$v){
	echo "'".$v->pname."',";
	$i++;
}
echo '<br /><br />';
$tmp = Array();
foreach ($cs as $k=>$v){
	
	$cname = trim($v->cname);
	if ($cname!='其他' && $cname!='其它') {
		
		if (in_array($cname, $tmp)) { 
			continue;
		}
		$tmp[] = $cname;
		
		$j++;
		$l = mb_strlen($cname, 'utf-8');
		if ($l == 3) {
			//echo '3,';
			$r = mb_strrpos($cname,'区', 0, 'utf-8');
			$x = mb_strrpos($cname,'县', 0, 'utf-8');
			if ($r > 0 || $x > 0) {
				$cname = mb_substr($cname, 0, $l-1, 'utf-8'); 
				echo "'" . trim($cname) . "',";
			}
			else { echo "'".$cname."',"; }
		} else if ($l == 4) {
			//echo '4,';
			$r = mb_strrpos($cname,'新区', 0, 'utf-8');
			$x = mb_strrpos($cname,'市属', 0, 'utf-8');
			if ($r > 0 || $x > 0) {
				$cname = mb_substr($cname, 0, $l-2, 'utf-8');
				echo "'" . trim($cname) . "',"; }
			else { echo "'" . $cname . "',"; }
		} else {
			echo "'" . $cname . "',";
		}
	}
}

echo '<br /><br />';
echo "省份数量：$i";
echo '<br /><br />';
echo "城市数量：$j";
echo '<br /><br />';
print_r($tmp);