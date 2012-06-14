<?php

/**
 * This is the model class for table "9ask_ad_command".
 *
 * The followings are the available columns in table '9ask_ad_command':
 * @property integer $commandID
 * @property string $typeName
 * @property integer $pnameID
 * @property integer $cnameID
 * @property integer $PID
 * @property integer $zcID
 * @property string  $userName
 * @property integer $flag
 * @property integer $LRSType
 * @property string $addDate
 * @property string $endDate
 * @property string $beizhudate
 */
class Askadcommand extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Askadcommand the static model class
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
		return '9ask_ad_command';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pnameID, cnameID, PID, zcID, flag, LRSType', 'numerical', 'integerOnly'=>true),
			array('typeName, userName', 'length', 'max'=>50),
			array('addDate, endDate, beizhudate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('commandID, typeName, pnameID, cnameID, PID, zcID, userName, flag, LRSType, addDate, endDate, beizhudate', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array('oaskuser'=>array(self::BELONGS_TO,'OaskUser', '','on'=>'name=userName','joinType'=>'INNER JOIN','select'=>'ID,name,TrueName,oaskuser.IsStar,oaskuser.mobile,userpic','together'=>true)
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'commandID' => 'Command',
			'typeName' => 'Type Name',
			'pnameID' => 'Pname',
			'cnameID' => 'Cname',
			'PID' => 'Pid',
			'zcID' => 'Zc',
			'userName' => 'User Name',
			'flag' => 'Flag',
			'LRSType' => 'Lrstype',
			'addDate' => 'Add Date',
			'endDate' => 'End Date',
			'beizhudate' => 'Beizhudate',
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

		$criteria->compare('commandID',$this->commandID);
		$criteria->compare('typeName',$this->typeName,true);
		$criteria->compare('pnameID',$this->pnameID);
		$criteria->compare('cnameID',$this->cnameID);
		$criteria->compare('PID',$this->PID);
		$criteria->compare('zcID',$this->zcID);
		$criteria->compare('userName',$this->userName,true);
		$criteria->compare('flag',$this->flag);
		$criteria->compare('LRSType',$this->LRSType);
		$criteria->compare('addDate',$this->addDate,true);
		$criteria->compare('endDate',$this->endDate,true);
		$criteria->compare('beizhudate',$this->beizhudate,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}