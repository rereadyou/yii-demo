<?php
/**
 * This is the model class for table "oask_gonggao".
 *
 * The followings are the available columns in table 'oask_gonggao':
 * @property integer $ID
 * @property integer $type
 * @property string $title
 * @property string $content
 * @property string $time
 * @property string $picurl
 * @property integer $ispic
 */
class OaskGonggao extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OaskGonggao the static model class
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
		return 'oask_gonggao';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID, title', 'required'),
			array('ID, type, ispic', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>50),
			array('content', 'length', 'max'=>1073741823),
			array('picurl', 'length', 'max'=>100),
			array('time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, type, title, content, time, picurl, ispic', 'safe', 'on'=>'search'),
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
			'ID' => 'ID',
			'type' => 'Type',
			'title' => 'Title',
			'content' => 'Content',
			'time' => 'Time',
			'picurl' => 'Picurl',
			'ispic' => 'Ispic',
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
		$criteria->compare('type',$this->type);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('picurl',$this->picurl,true);
		$criteria->compare('ispic',$this->ispic);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
            //主键
public function primaryKey()
{
  return 'ID';
}
}