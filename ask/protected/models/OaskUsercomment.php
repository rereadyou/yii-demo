<?php

/**
 * This is the model class for table "oask_usercomment".
 *
 * The followings are the available columns in table 'oask_usercomment':
 * @property integer $id
 * @property integer $senderid
 * @property integer $lawyer
 * @property integer $qid
 * @property integer $pltype
 * @property string $title
 * @property string $content
 * @property string $adddate
 * @property string $ip
 * @property string $ispass
 * @property integer $classid
 * @property integer $year
 * @property integer $week
 */
class OaskUsercomment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OaskUsercomment the static model class
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
		return 'oask_usercomment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('senderid, lawyer, qid, pltype, classid, year, week', 'numerical', 'integerOnly'=>true),
			array('title, content, ispass', 'length', 'max'=>10),
			array('ip', 'length', 'max'=>30),
			array('adddate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, senderid, lawyer, qid, pltype, title, content, adddate, ip, ispass, classid, year, week', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array('reply'=>array(self::BELONGS_TO, 'OaskReply', 'qid'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'senderid' => 'Senderid',
			'lawyer' => 'Lawyer',
			'qid' => 'Qid',
			'pltype' => 'Pltype',
			'title' => 'Title',
			'content' => 'Content',
			'adddate' => 'Adddate',
			'ip' => 'Ip',
			'ispass' => 'Ispass',
			'classid' => 'Classid',
			'year' => 'Year',
			'week' => 'Week',
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
		$criteria->compare('senderid',$this->senderid);
		$criteria->compare('lawyer',$this->lawyer);
		$criteria->compare('qid',$this->qid);
		$criteria->compare('pltype',$this->pltype);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('adddate',$this->adddate,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('ispass',$this->ispass,true);
		$criteria->compare('classid',$this->classid);
		$criteria->compare('year',$this->year);
		$criteria->compare('week',$this->week);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}