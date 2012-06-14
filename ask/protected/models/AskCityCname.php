<?php

/**
 * This is the model class for table "9ask_city_cname".
 *
 * The followings are the available columns in table '9ask_city_cname':
 * @property integer $cnameID
 * @property string $cname
 * @property integer $pnameID
 * @property integer $Import
 * @property integer $url
 */
class AskCityCname extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AskCityCname the static model class
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
		return '9ask_city_cname';
	}
	
	public function primaryKey()
	{
	    return 'cnameID';
	    // For composite primary key, return an array like the following
	    // return array('pk1', 'pk2');
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cname, pnameID', 'required'),
			array('pnameID, Import, url', 'numerical', 'integerOnly'=>true),
			array('cname', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cnameID, cname, pnameID, Import, url', 'safe', 'on'=>'search'),
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
			'xians'=>array(self::HAS_MANY,'AskCityXname','cnameid'),
			'province'=>array(self::BELONGS_TO,'AskCityPname','pnameID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cnameID' => 'Cname',
			'cname' => 'Cname',
			'pnameID' => 'Pname',
			'Import' => 'Import',
			'url' => 'Url',
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

		$criteria->compare('cnameID',$this->cnameID);
		$criteria->compare('cname',$this->cname,true);
		$criteria->compare('pnameID',$this->pnameID);
		$criteria->compare('Import',$this->Import);
		$criteria->compare('url',$this->url);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}