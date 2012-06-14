<?php

/**
 * This is the model class for table "9ask_city_pname".
 *
 * The followings are the available columns in table '9ask_city_pname':
 * @property integer $pNameID
 * @property string $pname
 * @property string $paixu
 */
class AskCityPname extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AskCityPname the static model class
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
		return '9ask_city_pname';
	}
	
	public function primaryKey()
	{
	    return 'pNameID';
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
			array('pname', 'required'),
			array('pname', 'length', 'max'=>50),
			array('paixu', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pNameID, pname, paixu', 'safe', 'on'=>'search'),
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
			'citys'=>array(self::HAS_MANY,'AskCityCname','pnameID'),
			'xians'=>array(self::HAS_MANY,'AskCityXname','pnameid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pNameID' => 'P Name',
			'pname' => 'Pname',
			'paixu' => 'Paixu',
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

		$criteria->compare('pNameID',$this->pNameID);
		$criteria->compare('pname',$this->pname,true);
		$criteria->compare('paixu',$this->paixu,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}