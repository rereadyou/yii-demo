<?php
//采用giix生成的代码  GiixModel Generator
Yii::import('application.modules.demo.models._base.BaseUsers');

class Users extends BaseUsers
{
	public $idpaquete;
	public $descripcion;
	public $image4upload;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

}