<?php

/**
 * This is the model class for table "oask_zczhixing".
 *
 * The followings are the available columns in table 'oask_zczhixing':
 * @property integer $id
 * @property string $username
 * @property integer $zcid
 * @property integer $weeks
 * @property integer $num
 * @property integer $bestnum
 */
class Oaskzczhixing extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Oaskzczhixing the static model class
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
		return 'oask_zczhixing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, weeks', 'required'),
			array('zcid, weeks, num, bestnum', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, zcid, weeks, num, bestnum', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array('oaskuser'=>array(self::BELONGS_TO,'OaskUser', '','on'=>'t.username=oaskuser.name','joinType'=>'INNER JOIN','together'=>true)
                      );
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'zcid' => 'Zcid',
			'weeks' => 'Weeks',
			'num' => 'Num',
			'bestnum' => 'Bestnum',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('zcid',$this->zcid);
		$criteria->compare('weeks',$this->weeks);
		$criteria->compare('num',$this->num);
		$criteria->compare('bestnum',$this->bestnum);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}