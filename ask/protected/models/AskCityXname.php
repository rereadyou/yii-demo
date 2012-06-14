<?php

/**
 * This is the model class for table "9ask_city_xname".
 *
 * The followings are the available columns in table '9ask_city_xname':
 * @property integer $xnameid
 * @property string $xname
 * @property integer $pnameid
 * @property integer $cnameid
 * @property string $paixu
 */
class AskCityXname extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AskCityXname the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function primaryKey()
	{
	    return 'xnameid';
	    // For composite primary key, return an array like the following
	    // return array('pk1', 'pk2');
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '9ask_city_xname';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('xnameid, xname, pnameid, cnameid', 'required'),
			array('xnameid, pnameid, cnameid', 'numerical', 'integerOnly'=>true),
			array('xname, paixu', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('xnameid, xname, pnameid, cnameid, paixu', 'safe', 'on'=>'search'),
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
			'xnameid' => 'Xnameid',
			'xname' => 'Xname',
			'pnameid' => 'Pnameid',
			'cnameid' => 'Cnameid',
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

		$criteria->compare('xnameid',$this->xnameid);
		$criteria->compare('xname',$this->xname,true);
		$criteria->compare('pnameid',$this->pnameid);
		$criteria->compare('cnameid',$this->cnameid);
		$criteria->compare('paixu',$this->paixu,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}