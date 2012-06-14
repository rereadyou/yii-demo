<?php

/**
 * This is the model class for table "oask_Class".
 *
 * The followings are the available columns in table 'oask_Class':
 * @property integer $ID
 * @property string $topic
 * @property integer $leibie
 * @property integer $fatherID
 * @property integer $paixu
 * @property string $fstr
 * @property integer $rootid
 * @property integer $qcount
 * @property string $pic
 * @property string $dir
 */
class OaskClass extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OaskClass the static model class
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
		return 'oask_Class';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID, topic, qcount', 'required'),
			array('ID, leibie, fatherID, paixu, rootid, qcount', 'numerical', 'integerOnly'=>true),
			array('topic', 'length', 'max'=>50),
			array('fstr', 'length', 'max'=>255),
			array('pic', 'length', 'max'=>100),
			array('dir', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, topic, leibie, fatherID, paixu, fstr, rootid, qcount, pic, dir', 'safe', 'on'=>'search'),
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
			'son'=>array(self::HAS_MANY,'OaskClass','fatherID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'topic' => 'Topic',
			'leibie' => 'Leibie',
			'fatherID' => 'Father',
			'paixu' => 'Paixu',
			'fstr' => 'Fstr',
			'rootid' => 'Rootid',
			'qcount' => 'Qcount',
			'pic' => 'Pic',
			'dir' => 'Dir',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('topic',$this->topic,true);
		$criteria->compare('leibie',$this->leibie);
		$criteria->compare('fatherID',$this->fatherID);
		$criteria->compare('paixu',$this->paixu);
		$criteria->compare('fstr',$this->fstr,true);
		$criteria->compare('rootid',$this->rootid);
		$criteria->compare('qcount',$this->qcount);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('dir',$this->dir,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}