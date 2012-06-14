<?php

/**
 * This is the model class for table "9ask_work".
 *
 * The followings are the available columns in table '9ask_work':
 * @property integer $id
 * @property string $WorkName
 * @property string $lxperson
 * @property integer $pnameid
 * @property integer $cnameid
 * @property string $Code
 * @property string $LegalPerson
 * @property string $Member
 * @property string $establishDate
 * @property string $Specaility
 * @property string $username
 * @property string $Phone
 * @property string $fax
 * @property string $mobile
 * @property string $Address
 * @property string $Zip
 * @property string $Email
 * @property string $Homepage
 * @property string $Memo
 * @property string $Regdate
 * @property string $updatetime
 * @property integer $countuser
 * @property string $userjifen
 * @property boolean $ispass
 * @property string $passdate
 * @property string $zhuanchang
 * @property string $logopic
 */
class AskWork extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AskWork the static model class
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
		return '9ask_work';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pnameid, cnameid, countuser', 'numerical', 'integerOnly'=>true),
			array('WorkName, lxperson, Phone, fax, mobile, Address, Zip, Email, Homepage', 'length', 'max'=>255),
			array('Code, LegalPerson, establishDate, username, userjifen', 'length', 'max'=>50),
			array('Specaility, zhuanchang, logopic', 'length', 'max'=>100),
			array('Member, Memo, Regdate, updatetime, ispass, passdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
                        array('WorkName', 'required','message'=>'律所名称不能为空'),
                        array('WorkName', 'unique','message'=>'律所名称必须唯一'),
                        array('Phone', 'required','message'=>'联系电话不能为空'),
                        array('Email', 'email','message'=>'电子邮箱不正确'),
			array('id, WorkName, lxperson, pnameid, cnameid, Code, LegalPerson, Member, establishDate, Specaility, username, Phone, fax, mobile, Address, Zip, Email, Homepage, Memo, Regdate, updatetime, countuser, userjifen, ispass, passdate, zhuanchang, logopic', 'safe', 'on'=>'search'),
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
			'WorkName' => 'Work Name',
			'lxperson' => 'Lxperson',
			'pnameid' => 'Pnameid',
			'cnameid' => 'Cnameid',
			'Code' => 'Code',
			'LegalPerson' => 'Legal Person',
			'Member' => 'Member',
			'establishDate' => 'Establish Date',
			'Specaility' => 'Specaility',
			'username' => 'Username',
			'Phone' => 'Phone',
			'fax' => 'Fax',
			'mobile' => 'Mobile',
			'Address' => 'Address',
			'Zip' => 'Zip',
			'Email' => 'Email',
			'Homepage' => 'Homepage',
			'Memo' => 'Memo',
			'Regdate' => 'Regdate',
			'updatetime' => 'Updatetime',
			'countuser' => 'Countuser',
			'userjifen' => 'Userjifen',
			'ispass' => 'Ispass',
			'passdate' => 'Passdate',
			'zhuanchang' => 'Zhuanchang',
			'logopic' => 'Logopic',
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
		$criteria->compare('WorkName',$this->WorkName,true);
		$criteria->compare('lxperson',$this->lxperson,true);
		$criteria->compare('pnameid',$this->pnameid);
		$criteria->compare('cnameid',$this->cnameid);
		$criteria->compare('Code',$this->Code,true);
		$criteria->compare('LegalPerson',$this->LegalPerson,true);
		$criteria->compare('Member',$this->Member,true);
		$criteria->compare('establishDate',$this->establishDate,true);
		$criteria->compare('Specaility',$this->Specaility,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('Phone',$this->Phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('Zip',$this->Zip,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Homepage',$this->Homepage,true);
		$criteria->compare('Memo',$this->Memo,true);
		$criteria->compare('Regdate',$this->Regdate,true);
		$criteria->compare('updatetime',$this->updatetime,true);
		$criteria->compare('countuser',$this->countuser);
		$criteria->compare('userjifen',$this->userjifen,true);
		$criteria->compare('ispass',$this->ispass);
		$criteria->compare('passdate',$this->passdate,true);
		$criteria->compare('zhuanchang',$this->zhuanchang,true);
		$criteria->compare('logopic',$this->logopic,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}