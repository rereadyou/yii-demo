<?php

/**
 * This is the model class for table "9ask_cert".
 *
 * The followings are the available columns in table '9ask_cert':
 * @property integer $id
 * @property integer $UserID
 * @property string $CertName
 * @property integer $CertType
 * @property string $Certpic
 * @property string $CertMemo
 * @property integer $IsPass
 * @property integer $fen
 * @property string $passlog
 */
class AskCert extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AskCert the static model class
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
		return '9ask_cert';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UserID', 'required'),
			array('Certpic', 'required','message'=>'请返回选择一个证书'),
			array('UserID, CertType, IsPass, fen', 'numerical', 'integerOnly'=>true),
			array('CertName', 'length', 'max'=>50),
			array('Certpic', 'file', 'types'=>'jpg, gif, png'),
			array('CertMemo, passlog', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, UserID, CertName, CertType, Certpic, CertMemo, IsPass, fen, passlog', 'safe', 'on'=>'search'),
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
			'id' => '主键',
			'UserID' => 'User',
			'CertName' => 'Cert Name',
			'CertType' => 'Cert Type',
			'Certpic' => 'Certpic',
			'CertMemo' => 'Cert Memo',
			'IsPass' => 'Is Pass',
			'fen' => 'Fen',
			'passlog' => 'Passlog',
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
		$criteria->compare('UserID',$this->UserID);
		$criteria->compare('CertName',$this->CertName,true);
		$criteria->compare('CertType',$this->CertType);
		$criteria->compare('Certpic',$this->Certpic,true);
		$criteria->compare('CertMemo',$this->CertMemo,true);
		$criteria->compare('IsPass',$this->IsPass);
		$criteria->compare('fen',$this->fen);
		$criteria->compare('passlog',$this->passlog,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}