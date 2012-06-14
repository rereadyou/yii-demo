<?php

/**
 * This is the model class for table "oask_delquestion".
 *
 * The followings are the available columns in table 'oask_delquestion':
 * @property integer $id
 * @property integer $qid
 * @property integer $userid
 * @property string $deldate
 */
class Oaskdelquestion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Oaskdelquestion the static model class
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
		return 'oask_delquestion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('qid, userid', 'numerical', 'integerOnly'=>true),
			array('deldate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, qid, userid, deldate', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'qid' => 'Qid',
			'userid' => 'Userid',
			'deldate' => 'Deldate',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('qid',$this->qid);
		$criteria->compare('userid',$this->userid);
		$criteria->compare('deldate',$this->deldate,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}