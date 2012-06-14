<?php

/**
 * This is the model class for table "oask_comment".
 *
 * The followings are the available columns in table 'oask_comment':
 * @property integer $comid
 * @property integer $qid
 * @property string $username
 * @property string $comment
 * @property integer $commenttype
 * @property string $adddate
 */
class OaskComment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OaskComment the static model class
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
		return 'oask_comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comid, qid, username, comment, adddate', 'required'),
			array('comid, qid, commenttype', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>50),
			array('comment', 'length', 'max'=>2000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('comid, qid, username, comment, commenttype, adddate', 'safe', 'on'=>'search'),
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
			'comid' => 'Comid',
			'qid' => 'Qid',
			'username' => 'Username',
			'comment' => 'Comment',
			'commenttype' => 'Commenttype',
			'adddate' => 'Adddate',
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

		$criteria->compare('comid',$this->comid);
		$criteria->compare('qid',$this->qid);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('commenttype',$this->commenttype);
		$criteria->compare('adddate',$this->adddate,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}