<?php

/**
 * This is the model class for table "oask_knowledge".
 *
 * The followings are the available columns in table 'oask_knowledge':
 * @property integer $id
 * @property string $key
 * @property string $content
 * @property integer $ispass
 * @property integer $key_order
 * @property string $adddate
 * @property integer $userid
 * @property integer $length
 */
class OaskKnowledge extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OaskKnowledge the static model class
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
		return 'oask_knowledge';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('key, content', 'required'),
			array('ispass, key_order, userid, length', 'numerical', 'integerOnly'=>true),
			array('key', 'length', 'max'=>40),
			array('content', 'length', 'max'=>1073741823),
			array('adddate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, key, content, ispass, key_order, adddate, userid, length', 'safe', 'on'=>'search'),
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
			'key' => 'Key',
			'content' => 'Content',
			'ispass' => 'Ispass',
			'key_order' => 'Key Order',
			'adddate' => 'Adddate',
			'userid' => 'Userid',
			'length' => 'Length',
			'username' => 'Username',
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
		$criteria->compare('key',$this->key,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('ispass',$this->ispass);
		$criteria->compare('key_order',$this->key_order);
		$criteria->compare('adddate',$this->adddate,true);
		$criteria->compare('userid',$this->userid);
		$criteria->compare('length',$this->length);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}