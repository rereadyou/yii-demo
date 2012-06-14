<?php

/**
 * This is the model class for table "lawtuijian".
 *
 * The followings are the available columns in table 'lawtuijian':
 * @property integer $ID
 * @property integer $ProID
 * @property integer $CityID
 * @property string $UserName
 * @property string $TrueName
 * @property string $Tel
 * @property string $PicAdd
 * @property integer $orderId
 * @property string $qq
 */
class Lawtuijian extends CActiveRecord
{
	public static $db;
/**
	 * overrite db connection
	 *
	 * @return unknown
	 */
	public function getDbConnection()
	{
		if(self::$db!==null)
			return self::$db;
		else
		{
			self::$db=Yii::app()->db3;
			if(self::$db instanceof CDbConnection)
			{
				self::$db->setActive(true);
				return self::$db;
			}
			else
				throw new CDbException(Yii::t('yii','Active Record requires a "db3" CDbConnection application component.'));
		}
		
	}
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lawtuijian the static model class
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
		return 'lawtuijian';
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
			array('ID, ProID, CityID, orderId', 'numerical', 'integerOnly'=>true),
			array('UserName, TrueName, Tel, qq', 'length', 'max'=>50),
			array('PicAdd', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, ProID, CityID, UserName, TrueName, Tel, PicAdd, orderId, qq', 'safe', 'on'=>'search'),
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
//			'city'=>array(self::BELONGS_TO,'AskCityCname','CityID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'ProID' => 'Pro',
			'CityID' => 'City',
			'UserName' => 'User Name',
			'TrueName' => 'True Name',
			'Tel' => 'Tel',
			'PicAdd' => 'Pic Add',
			'orderId' => 'Order',
			'qq' => 'Qq',
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
		$criteria->compare('ProID',$this->ProID);
		$criteria->compare('CityID',$this->CityID);
		$criteria->compare('UserName',$this->UserName,true);
		$criteria->compare('TrueName',$this->TrueName,true);
		$criteria->compare('Tel',$this->Tel,true);
		$criteria->compare('PicAdd',$this->PicAdd,true);
		$criteria->compare('orderId',$this->orderId);
		$criteria->compare('qq',$this->qq,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}