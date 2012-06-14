<?php

/**
 * This is the model class for table "9ask_Bill_allinfo".
 *
 * The followings are the available columns in table '9ask_Bill_allinfo':
 * @property integer $Bid
 * @property string $Btitle
 * @property string $Prov
 * @property string $City
 * @property string $Baddress
 * @property string $BLink
 * @property string $BTime
 * @property integer $typeid
 * @property integer $flag
 */
class AskBillAllinfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AskBillAllinfo the static model class
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
		return '9ask_Bill_allinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('typeid, flag', 'numerical', 'integerOnly'=>true),
			array('Btitle, Prov, City', 'length', 'max'=>50),
			array('Baddress, BLink', 'length', 'max'=>500),
			array('BTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Bid, Btitle, Prov, City, Baddress, BLink, BTime, typeid, flag', 'safe', 'on'=>'search'),
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
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Bid' => 'Bid',
			'Btitle' => 'Btitle',
			'Prov' => 'Prov',
			'City' => 'City',
			'Baddress' => 'Baddress',
			'BLink' => 'Blink',
			'BTime' => 'Btime',
			'typeid' => 'Typeid',
			'flag' => 'Flag',
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

		$criteria->compare('Bid',$this->Bid);
		$criteria->compare('Btitle',$this->Btitle,true);
		$criteria->compare('Prov',$this->Prov,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('Baddress',$this->Baddress,true);
		$criteria->compare('BLink',$this->BLink,true);
		$criteria->compare('BTime',$this->BTime,true);
		$criteria->compare('typeid',$this->typeid);
		$criteria->compare('flag',$this->flag);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}