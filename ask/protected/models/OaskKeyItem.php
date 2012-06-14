<?php

/**
 * This is the model class for table "oask_KeyItem".
 *
 * The followings are the available columns in table 'oask_KeyItem':
 * @property integer $ID
 * @property string $ChannelID
 * @property string $KeyStr
 * @property integer $AskID
 * @property string $ChannelName
 * @property integer $orderID
 */
class OaskKeyItem extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OaskKeyItem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'oask_KeyItem';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID', 'required'),
			array('ID, AskID, orderID', 'numerical', 'integerOnly'=>true),
			array('ChannelID, KeyStr, ChannelName', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, ChannelID, KeyStr, AskID, ChannelName, orderID', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}
	/**
	 * 把关键词放到缓存里
	 * Enter description here ...
	 */
	public static function getCachedItem(){
		
		if(!$arr = cache()->get('keyitem')){
            $models = self::model()->findAll(array('order'=>'datalength(keystr) desc'));
			$arr = CHtml::listData($models, 'KeyStr', 'AskID');
			cache()->set('keyitem',$arr,36000);
		}
		return $arr;
	}
	/**
	 * 关键词与分词结果匹配
	 * Enter description here ...
	 * @param unknown_type $arr
	 */
	public static function diff($arr){
		
		
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'ChannelID' => 'Channel',
			'KeyStr' => 'Key Str',
			'AskID' => 'Ask',
			'ChannelName' => 'Channel Name',
			'orderID' => 'Order',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID);
		$criteria->compare('ChannelID',$this->ChannelID,true);
		$criteria->compare('KeyStr',$this->KeyStr,true);
		$criteria->compare('AskID',$this->AskID);
		$criteria->compare('ChannelName',$this->ChannelName,true);
		$criteria->compare('orderID',$this->orderID);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}