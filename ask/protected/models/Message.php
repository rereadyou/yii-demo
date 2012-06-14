<?php

/**
 * This is the model class for table "9ask_one2message".
 *
 * The followings are the available columns in table '9ask_one2message':
 * @property integer $ID
 * @property string $Title
 * @property string $Content
 * @property integer $SenderID
 * @property integer $AddresseeID
 * @property integer $isok
 * @property string $AddDate
 * @property integer $FatherID
 * @property string $ReplyDate
 * @property integer $LastReply
 * @property boolean $baomi
 * @property integer $state
 * @property integer $big_classid
 * @property integer $lit_classid
 * @property integer $cnameid
 * @property integer $pnameid
 * @property integer $leixing
 */
class Message extends CActiveRecord {       //验证码
    public $verifyCode;
    /**
     * Returns the static model of the specified AR class.
     * @return AskOne2Message the static model class
     */
 public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '9ask_one2message';
    }
    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
                //必填字段
               array('Title,Content,SenderID,AddresseeID', 'required'),
                array('SenderID, AddresseeID, isok, FatherID, LastReply, state, big_classid, lit_classid, cnameid, pnameid, leixing', 'numerical', 'integerOnly'=>true),
               array('Title', 'length', 'max'=>250),
               array('Content', 'length', 'max'=>1073741823),
               array('AddDate, ReplyDate, baomi', 'safe'),
               array('verifyCode', 'captcha'),
                 // The following rule is used by search().
                 // Please remove those attributes that should not be searched.
              array('ID, Title, Content, SenderID, AddresseeID, isok, AddDate, FatherID, ReplyDate, LastReply, baomi, state, big_classid, lit_classid, cnameid, pnameid, leixing', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array('oaskuser'=>array(self::BELONGS_TO,'OaskUser','SenderID'),
                'oaskreply'=>array(self::BELONGS_TO,'OaskUser','AddresseeID'),
                'oasklastreply'=>array(self::BELONGS_TO,'OaskUser','LastReply')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'ID' => 'ID',
                'Title' => '标题',
                'Content' => '内容',
                'SenderID' => '发布者id',
                'AddresseeID' => '接受人id',
                'isok' => '是否解决',
                'AddDate' => '添加日期',
                'FatherID' => '是否回复',
                'ReplyDate' => '回复日期',
                'LastReply' => '最后回复',
                'baomi' => '保密',
                'state' => '状态',
                'big_classid' => '大类',
                'lit_classid' => '小类',
                'cnameid' => '城市id',
                'pnameid' => '省份id',
                'leixing' => '类型',
        );
    }
    //主键
public function primaryKey()
{
  return 'id';
}

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('ID',$this->ID);
        $criteria->compare('Title',$this->Title,true);
        $criteria->compare('Content',$this->Content,true);
        $criteria->compare('SenderID',$this->SenderID);
        $criteria->compare('AddresseeID',$this->AddresseeID);
        $criteria->compare('isok',$this->isok);
        $criteria->compare('AddDate',$this->AddDate,true);
        $criteria->compare('FatherID',$this->FatherID);
        $criteria->compare('ReplyDate',$this->ReplyDate,true);
        $criteria->compare('LastReply',$this->LastReply);
        $criteria->compare('baomi',$this->baomi);
        $criteria->compare('state',$this->state);
        $criteria->compare('big_classid',$this->big_classid);
        $criteria->compare('lit_classid',$this->lit_classid);
        $criteria->compare('cnameid',$this->cnameid);
        $criteria->compare('pnameid',$this->pnameid);
        $criteria->compare('leixing',$this->leixing);

        return new CActiveDataProvider(get_class($this), array(
                        'criteria'=>$criteria,
        ));
    }
}