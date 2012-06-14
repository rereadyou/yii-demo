<?php

Yii::import('application.modules.sharding.models._base.BasePosts');
class Posts extends BasePosts
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	// 实现分表, 根据Id进行散列
	private $tableName = "posts0";
	public function updateMeta($id)
	{
		$this->tableName = 'posts'.(int)($id/10);
	
		$this->refreshMetaData();
	
		return $this;
	}
	
	/**
	 * 覆盖 
	 */
	public function tableName()
	{
		return $this->tableName;
	}
	
}