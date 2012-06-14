<?php
class Banner{
	/**
	 * 判断$string有没有违禁词
	 * Enter description here ...
	 * @param unknown_type $str
	 */
	public static function filter($str){
		if(cache()->get('words')){
			$words = unserialize(cache()->get('words'));
		}else{
			$word = OaskSetup::model()->findAll('id = 3');
			$filter = $word[0]->filter;
			$words = preg_split('/\s+/',$filter,-1,PREG_SPLIT_NO_EMPTY);
			cache()->set('words',serialize($words),3600);
		}
		foreach($words as $v){
			if(strpos($str, $v)!==false)
				return 0;
		}
		
		return 1;
	}
	
}