<?php

Yii::import('application.modules.sharding.models._base.BaseUsers');
class Users extends BaseUsers
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	// 实现分表, 根据Id进行散列
	private $tableName = "users0";
	public function updateMeta($id)
	{
		$this->tableName = 'users'.(int)($id/10);
	
		$this->refreshMetaData();
	
		return $this;
	}
	
	/**
	 * 覆盖 BaseUsers::tableName()
	 */
	public function tableName()
	{
		return $this->tableName;
	}

}