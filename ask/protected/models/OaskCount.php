<?php

/**
 * This is the model class for table "oask_count".
 *
 * The followings are the available columns in table 'oask_count':
 * @property integer $id
 * @property integer $question_num
 * @property integer $reply_num
 * @property integer $msg_num
 * @property integer $msg_reply_num
 * @property integer $weituo_num
 * @property integer $weituo_reply_num
 */
class OaskCount extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OaskCount the static model class
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
		return 'oask_count';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question_num, reply_num, msg_num, msg_reply_num, weituo_num, weituo_reply_num', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, question_num, reply_num, msg_num, msg_reply_num, weituo_num, weituo_reply_num', 'safe', 'on'=>'search'),
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
			'question_num' => 'Question Num',
			'reply_num' => 'Reply Num',
			'msg_num' => 'Msg Num',
			'msg_reply_num' => 'Msg Reply Num',
			'weituo_num' => 'Weituo Num',
			'weituo_reply_num' => 'Weituo Reply Num',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.d

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('question_num',$this->question_num);
		$criteria->compare('reply_num',$this->reply_num);
		$criteria->compare('msg_num',$this->msg_num);
		$criteria->compare('msg_reply_num',$this->msg_reply_num);
		$criteria->compare('weituo_num',$this->weituo_num);
		$criteria->compare('weituo_reply_num',$this->weituo_reply_num);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}