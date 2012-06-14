<?php

/**
 * This is the model class for table "oask_Question".
 *
 * The followings are the available columns in table 'oask_Question':
 * @property integer $ID
 * @property string $title
 * @property string $content
 * @property string $bu
 * @property string $sender
 * @property string $sendtime
 * @property string $overtime
 * @property string $ChangeTime
 * @property integer $views
 * @property integer $replys
 * @property string $topic
 * @property integer $fenleiid
 * @property integer $fatherID
 * @property integer $jie
 * @property string $jieuser
 * @property integer $shang
 * @property integer $tui
 * @property integer $niming
 * @property string $hashkey
 * @property integer $attachid
 * @property integer $notice
 * @property integer $pnameid
 * @property integer $cnameid
 * @property string $BContent
 * @property string $BDatetime
 * @property string $keys
 * @property integer $state
 * @property string $lastuser
 * @property  integer $xnameid
 */
class OaskQuestion extends CActiveRecord {       //验证码
    public $verifyCode;
    /**
     * Returns the static model of the specified AR class.
     * @return OaskQuestion the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'oask_Question';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
                array('sender,title,content', 'required'),
                array('fenleiid', 'numerical', 'integerOnly'=>true, 'message'=>'分类不合法'),
                array('views, replys, fatherID, jie, shang, tui, niming, attachid, notice, pnameid, cnameid, state', 'numerical', 'integerOnly'=>true),
                array('title, hashkey', 'length', 'min'=>4, 'max'=>60, 'tooShort'=>'标题 最少2个字', 'tooLong'=>'标题 最多30个字'),
                array('content, bu', 'length', 'min'=>12, 'max'=>1073741823, 'tooShort'=>'内容 最少6个字'),
                array('sender, topic, jieuser, keys', 'length', 'max'=>50),
                array('BContent', 'length', 'max'=>500),
                array('lastuser', 'length', 'max'=>60),
                array('sendtime, overtime, ChangeTime, BDatetime', 'safe'),
                array('verifyCode', 'captcha','allowEmpty'=>app()->user->id),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('ID, title, content, bu, sender, sendtime, overtime, ChangeTime, views, replys, topic, fenleiid, fatherID, jie, jieuser, shang, tui, niming, hashkey, attachid, notice, pnameid, cnameid, BContent, BDatetime, keys, state, lastuser', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
                'senduser'=>array(self::BELONGS_TO,'OaskUser','','on'=>'senduser.name=t.sender','select'=>'senduser.ID'),
                'reply' => array(self::HAS_MANY,'OaskReply','qid','with'=>'user', 'order'=>'reply.id desc'),
                'city'=>array(self::BELONGS_TO,'AskCityCname','cnameid'),
                'province'=>array(self::BELONGS_TO,'AskCityPname','pnameid'),
                'hfuser' => array(self::BELONGS_TO, 'OaskUser', '','on'=>'name=lastuser','select'=>'ID,name,TrueName,userClassID,IsStar' )
        );
    }

    /**
     * 得到已回复的人的名单
     * Enter description here ...
     */
    public function getReply() {
        $replyer = $this->reply;
        $tmp = array();
        foreach($replyer as $v) {
            $tmp[] = $v->replyer;
        } 
        return $tmp;
    }

    /**
     * 昨到咨询最后的回复人
     * Enter description here ...
     */
    public  function getLastReply() {
        $replyer = $this->reply;
        $count = count($replyer);
        if ($count==0) {
            return '';
        }
        return $replyer[$count-1]->user->TrueName;
    }

    /**
     * 根据ip返回常咨询列表
     * 未实现
     */
    public function getCjzixun() {

    }
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'ID' => 'ID',
                'title' => '标题',
                'content' => '内容',
                'bu' => 'Bu',
                'sender' => '发送者',
                'sendtime' => 'Sendtime',
                'overtime' => 'Overtime',
                'ChangeTime' => 'Change Time',
                'views' => 'Views',
                'replys' => 'Replys',
                'topic' => 'Topic',
                'fenleiid' => 'Fenleiid',
                'fatherID' => 'Father',
                'jie' => 'Jie',
                'jieuser' => 'Jieuser',
                'shang' => 'Shang',
                'tui' => 'Tui',
                'niming' => 'Niming',
                'hashkey' => 'Hashkey',
                'attachid' => 'Attachid',
                'notice' => 'Notice',
                'pnameid' => 'Pnameid',
                'cnameid' => 'Cnameid',
                'BContent' => 'Bcontent',
                'BDatetime' => 'Bdatetime',
                'keys' => 'Keys',
                'state' => 'State',
                'lastuser' => 'Lastuser',
                'verifyCode'=>'验证码',
                'lastuser'=>'最后回复人',
                'xnameid'=>'县'
        );
    }

    public function beforeValidate() {
        if ($this->isNewRecord) {
            $this->sendtime = $this->ChangeTime = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
            if(!app()->user->isguest) {
                $this->sender = app()->user->name;
            }else {
                $this->sender = 'ask_guest';
            }
        }
        return true;
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
        $criteria->compare('title',$this->title,true);
        $criteria->compare('content',$this->content,true);
        $criteria->compare('bu',$this->bu,true);
        $criteria->compare('sender',$this->sender,true);
        $criteria->compare('sendtime',$this->sendtime,true);
        $criteria->compare('overtime',$this->overtime,true);
        $criteria->compare('ChangeTime',$this->ChangeTime,true);
        $criteria->compare('views',$this->views);
        $criteria->compare('replys',$this->replys);
        $criteria->compare('topic',$this->topic,true);
        $criteria->compare('fenleiid',$this->fenleiid);
        $criteria->compare('fatherID',$this->fatherID);
        $criteria->compare('jie',$this->jie);
        $criteria->compare('jieuser',$this->jieuser,true);
        $criteria->compare('shang',$this->shang);
        $criteria->compare('tui',$this->tui);
        $criteria->compare('niming',$this->niming);
        $criteria->compare('hashkey',$this->hashkey,true);
        $criteria->compare('attachid',$this->attachid);
        $criteria->compare('notice',$this->notice);
        $criteria->compare('pnameid',$this->pnameid);
        $criteria->compare('cnameid',$this->cnameid);
        $criteria->compare('BContent',$this->BContent,true);
        $criteria->compare('BDatetime',$this->BDatetime,true);
        $criteria->compare('keys',$this->keys,true);
        $criteria->compare('state',$this->state);
        $criteria->compare('lastuser',$this->lastuser,true);
         $criteria->compare('xnameid',$this->xnameid);
        return new CActiveDataProvider(get_class($this), array(
                        'criteria'=>$criteria,
        ));
    }
}