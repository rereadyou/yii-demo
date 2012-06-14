<?php
class moduleArea extends CWidget{
	
	public $cnameid = 87;//济南
	public $provinceid;
	public $xnameid;
	
	protected $provinces, $citys, $areas;
	public function init(){
		
		
		//获得省列表
		if(cache()->get('area_province')){
			$this->provinces = unserialize(cache()->get('area_province'));
		}else{
			$ps = AskCityPname::model()->findAll();
			foreach((array)$ps as $k=>$v){
				$tmp = array(
	            	'id' => $v->pNameID,
	                'name' => $v->pname,
	            );
	            $this->provinces[] = $tmp;		
			}	
			cache()->set('area_province',serialize($this->provinces),3600);
		}
		

		//获得当前城市 所属的省
		$city = AskCityCname::model()->findByPk($this->cnameid);
		$this->provinceid = $city->pnameID;
		
		//获得当前省下所有的市
		$p = AskCityPname::model()->findByPk($this->provinceid);
		foreach((array)$p->citys as $k=>$v){
			$tmp = array(
            	'id' => $v->cnameID,
                'name' => $v->cname,
            );
            $this->citys[] = $tmp;	
		}
		
		//获得当前市下所有的区
		$xs = $city->xians;
		foreach((array)$xs as $k=>$x){
			$tmp = array(
            	'id' => $x->xnameid,
                'name' => $x->xname,
            );
            $this->areas[] = $tmp;		
		}
		$this->renderContent();
	}
	
	public function renderContent(){
		$this->render('modulearea');
	}
	
	public function run(){
		//echo resBu();
	}
}
?>