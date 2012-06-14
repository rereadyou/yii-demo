<?php

/**
 * This is the model class for table "ayzx_wtinfo".
 *
 * The followings are the available columns in table 'ayzx_wtinfo':
 * @property integer $wtid
 * @property integer $state
 * @property integer $jq_num
 * @property integer $isdx
 * @property integer $isemail
 * @property integer $bestanswer
 * @property integer $hf_num
 * @property string $overtime
 * @property integer $jq_max
 * @property integer $classid
 */
class AyzxWtinfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AyzxWtinfo the static model class
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
		return 'ayzx_wtinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('wtid', 'required'),
			array('wtid, state, jq_num, isdx, isemail, bestanswer, hf_num, jq_max, classid', 'numerical', 'integerOnly'=>true),
			array('overtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('wtid, state, jq_num, isdx, isemail, bestanswer, hf_num, overtime, jq_max, classid', 'safe', 'on'=>'search'),
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
			'wtid' => 'Wtid',
			'state' => 'State',
			'jq_num' => 'Jq Num',
			'isdx' => 'Isdx',
			'isemail' => 'Isemail',
			'bestanswer' => 'Bestanswer',
			'hf_num' => 'Hf Num',
			'overtime' => 'Overtime',
			'jq_max' => 'Jq Max',
			'classid' => 'Classid',
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

		$criteria->compare('wtid',$this->wtid);
		$criteria->compare('state',$this->state);
		$criteria->compare('jq_num',$this->jq_num);
		$criteria->compare('isdx',$this->isdx);
		$criteria->compare('isemail',$this->isemail);
		$criteria->compare('bestanswer',$this->bestanswer);
		$criteria->compare('hf_num',$this->hf_num);
		$criteria->compare('overtime',$this->overtime,true);
		$criteria->compare('jq_max',$this->jq_max);
		$criteria->compare('classid',$this->classid);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}