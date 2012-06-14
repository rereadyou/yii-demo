<?php
class category extends CWidget{
	
	public $parents;
	public $son;
	public function init(){
		//查询出来父类
		
		if(cache()->get('parents')){
			$this->parents = unserialize(cache()->get('parents'));
			$this->son = unserialize(cache()->get('son'));
		}else{
			$fathers = OaskClass::model()->findAll(array('condition'=>'fatherID = 1'));
			foreach($fathers as $k=>$v){
				$this->parents[$k]['topic'] = $v->topic;
				$this->parents[$k]['ID'] = $v->ID;
				//读出第一个分类下的小分类
				if($k == 0){
					$sons = $v->son;
					foreach ($sons as $kk=>$vv){
						$this->son[$kk]['topic'] = $vv->topic;
						$this->son[$kk]['ID'] = $vv->ID;
					}
				}
			}
			cache()->set('parents',serialize($this->parents),3600);
			cache()->set('son',serialize($this->son),3600);
		}
		$this->renderContent();
	}
	
	public function renderContent(){
		$this->render('category');
	}
	public function run(){
	
	}
	
	
}