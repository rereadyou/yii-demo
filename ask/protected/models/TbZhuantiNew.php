<?php

/**
 * This is the model class for table "tb_zhuanti_new".
 *
 * The followings are the available columns in table 'tb_zhuanti_new':
 * @property integer $id
 * @property string $webdes
 * @property string $webkey
 * @property string $title
 * @property string $mulu
 * @property string $keys
 * @property string $webtitle
 * @property integer $ishtml
 * @property string $toppic
 * @property string $buttonpic
 * @property string $adddate
 * @property string $upsize_ts
 * @property integer $channelid
 * @property integer $classid
 * @property string $updatetime
 */
class TbZhuantiNew extends CActiveRecord
{	
	public static $db;
	/**
	 * overrite db connection
	 *
	 * @return unknown
	 */
	public function getDbConnection()
	{
		if(self::$db!==null)
			return self::$db;
		else
		{
			self::$db=Yii::app()->db2;
			if(self::$db instanceof CDbConnection)
			{
				self::$db->setActive(true);
				return self::$db;
			}
			else
				throw new CDbException(Yii::t('yii','Active Record requires a "db2" CDbConnection application component.'));
		}
		
	}
	/**
	 * Returns the static model of the specified AR class.
	 * @return TbZhuantiNew the static model class
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
		return 'tb_zhuanti_new';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ishtml, channelid, classid', 'numerical', 'integerOnly'=>true),
			array('webdes, webkey', 'length', 'max'=>1073741823),
			array('title', 'length', 'max'=>120),
			array('mulu, keys, webtitle', 'length', 'max'=>50),
			array('toppic, buttonpic', 'length', 'max'=>150),
			array('adddate, upsize_ts, updatetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, webdes, webkey, title, mulu, keys, webtitle, ishtml, toppic, buttonpic, adddate, upsize_ts, channelid, classid, updatetime', 'safe', 'on'=>'search'),
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
			'webdes' => 'Webdes',
			'webkey' => 'Webkey',
			'title' => 'Title',
			'mulu' => 'Mulu',
			'keys' => 'Keys',
			'webtitle' => 'Webtitle',
			'ishtml' => 'Ishtml',
			'toppic' => 'Toppic',
			'buttonpic' => 'Buttonpic',
			'adddate' => 'Adddate',
			'upsize_ts' => 'Upsize Ts',
			'channelid' => 'Channelid',
			'classid' => 'Classid',
			'updatetime' => 'Updatetime',
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
		$criteria->compare('webdes',$this->webdes,true);
		$criteria->compare('webkey',$this->webkey,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('mulu',$this->mulu,true);
		$criteria->compare('keys',$this->keys,true);
		$criteria->compare('webtitle',$this->webtitle,true);
		$criteria->compare('ishtml',$this->ishtml);
		$criteria->compare('toppic',$this->toppic,true);
		$criteria->compare('buttonpic',$this->buttonpic,true);
		$criteria->compare('adddate',$this->adddate,true);
		$criteria->compare('upsize_ts',$this->upsize_ts,true);
		$criteria->compare('channelid',$this->channelid);
		$criteria->compare('classid',$this->classid);
		$criteria->compare('updatetime',$this->updatetime,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}