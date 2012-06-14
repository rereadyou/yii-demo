<?php
class VipPing extends CWidget{
	
	public $name;
	public $id;
	public function init(){
	
	}
	
	public function run(){
		
		$caina = PersonTool::getNa($this->name);
		$pingjia = PersonTool::getMark($this->name);
		//$quest = PersonTool::getQuest($this->name,$this->id);
		$good = $pingjia['flower'];
		$bad = $pingjia['egg'];
		if(!$good) $good = 1;
		if(!$bad)  $bad = 1;
		//g好评,b差评
		$g = (int)($good*100/($good+$bad));
		$b = 100-$g;
		
		//满意css宽
		$gw = (int)($good*130/($good+$bad));
		//满意分
		$gc = number_format(($good*5/($good+$bad)),2);
		
		$this->render('vipping',array('pingjia'=>$pingjia,'g'=>$g,'b'=>$b,'gw'=>$gw,'gc'=>$gc));
	}
}