<?php

/**
 * This is the model class for table "zg_wt".
 *
 * The followings are the available columns in table 'zg_wt':
 * @property integer $wtID
 * @property string $title
 * @property string $jine
 * @property string $money
 * @property integer $pnameID
 * @property string $cname
 * @property string $lawInfo
 * @property string $content
 * @property integer $endday
 * @property string $addDate
 * @property string $userName
 * @property integer $isLock
 * @property integer $isOk
 * @property integer $hit
 * @property integer $fatherid
 * @property string $wtover
 * @property string $addinfo
 * @property string $updatedate
 * @property string $allcontent
 * @property boolean $ispass
 * @property string $logmemo
 * @property string $logdate
 * @property string $ip
 * @property string $passdate
 * @property integer $tjwz
 * @property integer $leixing
 * @property string $wtyq
 */
class ZgWt extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ZgWt the static model class
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
		return 'zg_wt';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content, addDate, userName', 'required'),
			array('pnameID, endday, isLock, isOk, hit, fatherid, tjwz, leixing', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('jine, money, cname, userName, ip', 'length', 'max'=>50),
			array('wtover', 'length', 'max'=>500),
			array('addinfo', 'length', 'max'=>2000),
			array('updatedate', 'length', 'max'=>200),
			array('lawInfo, allcontent, ispass, logmemo, logdate, passdate, wtyq', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('wtID, title, jine, money, pnameID, cname, lawInfo, content, endday, addDate, userName, isLock, isOk, hit, fatherid, wtover, addinfo, updatedate, allcontent, ispass, logmemo, logdate, ip, passdate, tjwz, leixing, wtyq', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'OaskUser', '','on'=>'name=userName', 'select'=>'TrueName'),
			'jieqia' =>array(self::HAS_MANY, 'ZgWt', 'fatherid', 'with'=>'user'),
			'hf_num'=>array(self::HAS_ONE, 'AyzxWtinfo', 'wtid', 'joinType'=>'INNER JOIN' ,'select'=>'hf_num'), 
			'provice'=>array(self::BELONGS_TO,'AskCityPname','pnameID'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'wtID' => 'Wt',
			'title' => 'Title',
			'jine' => 'Jine',
			'money' => 'Money',
			'pnameID' => 'Pname',
			'cname' => 'Cname',
			'lawInfo' => 'Law Info',
			'content' => 'Content',
			'endday' => 'Endday',
			'addDate' => 'Add Date',
			'userName' => 'User Name',
			'isLock' => 'Is Lock',
			'isOk' => 'Is Ok',
			'hit' => 'Hit',
			'fatherid' => 'Fatherid',
			'wtover' => 'Wtover',
			'addinfo' => 'Addinfo',
			'updatedate' => 'Updatedate',
			'allcontent' => 'Allcontent',
			'ispass' => 'Ispass',
			'logmemo' => 'Logmemo',
			'logdate' => 'Logdate',
			'ip' => 'Ip',
			'passdate' => 'Passdate',
			'tjwz' => 'Tjwz',
			'leixing' => 'Leixing',
			'wtyq' => 'Wtyq',
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

		$criteria->compare('wtID',$this->wtID);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('jine',$this->jine,true);
		$criteria->compare('money',$this->money,true);
		$criteria->compare('pnameID',$this->pnameID);
		$criteria->compare('cname',$this->cname,true);
		$criteria->compare('lawInfo',$this->lawInfo,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('endday',$this->endday);
		$criteria->compare('addDate',$this->addDate,true);
		$criteria->compare('userName',$this->userName,true);
		$criteria->compare('isLock',$this->isLock);
		$criteria->compare('isOk',$this->isOk);
		$criteria->compare('hit',$this->hit);
		$criteria->compare('fatherid',$this->fatherid);
		$criteria->compare('wtover',$this->wtover,true);
		$criteria->compare('addinfo',$this->addinfo,true);
		$criteria->compare('updatedate',$this->updatedate,true);
		$criteria->compare('allcontent',$this->allcontent,true);
		$criteria->compare('ispass',$this->ispass);
		$criteria->compare('logmemo',$this->logmemo,true);
		$criteria->compare('logdate',$this->logdate,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('passdate',$this->passdate,true);
		$criteria->compare('tjwz',$this->tjwz);
		$criteria->compare('leixing',$this->leixing);
		$criteria->compare('wtyq',$this->wtyq,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}