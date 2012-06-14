<?php
/**
 * vip用户中心帮助类
 */
class PersonTool{
	
	/**
	 * 根据某个用户得到他的回复被采纳了多少
	 * Enter description here ...
	 * @param unknown_type $name
	 */
	public static function getNa($name){
		$na = OaskQuestion::model()->count(array('condition'=>"jieuser = '".$name."'"));
		return $na;
	}
	//好评差评
	public static function getMark($name){
		$mark = OaskReply::model()->find(
			array(
			 'condition'=>"replyer = '".$name."'",
			 'select'=>'sum(egg) as egg,sum(flower) as flower',
			));

		$data['egg'] = $mark['egg'];
		$data['flower'] = $mark['flower'];	
		return $data;
	}
	
	//公共咨询与一对一咨询数
	public static function getQuest($name,$id){
		$pub = OaskReply::model()->count(array('condition'=>"replyer = '".$name."'"));
		$one = AskOne2Message::model()->count(array('condition'=>'AddresseeID = '.$id));
		$data['pub'] = $pub;
		$data['one'] = $one;
		return $data;
	}	
	
}