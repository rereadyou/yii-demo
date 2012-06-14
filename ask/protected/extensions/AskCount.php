<?php

class  AskCount  {

	public  static function GetQuestionNum()
	{
		$cachename = "ask_count_show";
		$askcounts = array();
		if(cache()->get($cachename)) {
			$askcounts = unserialize(cache()->get($cachename));
		} else {
			$askcounts = OaskCount::model()->findByPk(1);;
			cache()->set($cachename,serialize($askcounts),36000);//缓存10小时
		}
		return $askcounts;
	}

}

?>