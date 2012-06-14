<?php

/**
 * This is the model class for table "oask_reply".
 *
 * The followings are the available columns in table 'oask_reply':
 * @property integer $id
 * @property integer $qid
 * @property string $content
 * @property string $replyer
 * @property string $replytime
 * @property integer $best
 * @property string $ck
 * @property string $ping
 * @property integer $pjhao
 * @property integer $pjhuai
 * @property integer $attachid
 * @property integer $NeedVerify
 * @property integer $flower
 * @property integer $egg
 */
class OaskReply extends CActiveRecord
{
	public $verifyCode;
	/**
	 * Returns the static model of the specified AR class.
	 * @return OaskReply the static model class
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
		return 'oask_reply';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('qid, best, pjhao, pjhuai, attachid, NeedVerify, flower, egg', 'numerical', 'integerOnly'=>true),
			array('content', 'length', 'max'=>1073741823),
			array('replyer', 'length', 'max'=>50),
			array('ck', 'length', 'max'=>100),
			array('ping', 'length', 'max'=>255),
			array('replytime', 'safe'),
			array('verifyCode', 'captcha','allowEmpty'=>app()->user->id),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, qid, content, replyer, replytime, best, ck, ping, pjhao, pjhuai, attachid, NeedVerify, flower, egg', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'OaskUser', '','on'=>'name=replyer', 'select'=>'ID,name,Phone,TrueName,userpic,IsStar,vipstime,userClassID'),
            'question' => array(self::BELONGS_TO, 'OaskQuestion', '','on'=>'question.id=t.qid','joinType'=>'inner JOIN'),
            'usercomment' => array(self::HAS_MANY, 'OaskUsercomment', '','on'=>'usercomment.qid=t.id','joinType'=>'inner JOIN')
		);
	}

	public function beforeSave(){
		if ($this->isNewRecord){
			$this->replytime = date('Y-m-d H:i:s');
		}
		return true;
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'qid' => 'Qid',
			'content' => 'Content',
			'replyer' => 'Replyer',
			'replytime' => 'Replytime',
			'best' => 'Best',
			'ck' => 'Ck',
			'ping' => 'Ping',
			'pjhao' => 'Pjhao',
			'pjhuai' => 'Pjhuai',
			'attachid' => 'Attachid',
			'NeedVerify' => 'Need Verify',
			'flower' => 'Flower',
			'egg' => 'Egg',
			'verifyCode'=>'验证码',
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
		$criteria->compare('qid',$this->qid);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('replyer',$this->replyer,true);
		$criteria->compare('replytime',$this->replytime,true);
		$criteria->compare('best',$this->best);
		$criteria->compare('ck',$this->ck,true);
		$criteria->compare('ping',$this->ping,true);
		$criteria->compare('pjhao',$this->pjhao);
		$criteria->compare('pjhuai',$this->pjhuai);
		$criteria->compare('attachid',$this->attachid);
		$criteria->compare('NeedVerify',$this->NeedVerify);
		$criteria->compare('flower',$this->flower);
		$criteria->compare('egg',$this->egg);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}