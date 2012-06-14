<?php

/**
 * This is the model class for table "oask_user".
 *
 * The followings are the available columns in table 'oask_user':
 * @property integer $ID
 * @property string $name
 * @property string $pwd
 * @property string $qq
 * @property string $email
 * @property string $question
 * @property string $answer
 * @property integer $jifen
 * @property integer $fa
 * @property integer $qtfa
 * @property string $touxian
 * @property integer $asknum
 * @property integer $replynum
 * @property integer $helpnum
 * @property string $time
 * @property integer $del
 * @property string $logintime
 * @property string $jianjie
 * @property integer $PostNum
 * @property string $UserGroup
 * @property string $RegTime
 * @property string $Sign
 * @property integer $LockUser
 * @property integer $LoginCount
 * @property string $LastIP
 * @property string $Friends
 * @property string $homepage
 * @property string $FriendGroup
 * @property integer $userstatus
 * @property string $CheckAlter
 * @property string $Rights
 * @property string $favq
 * @property integer $sex
 * @property integer $userClassID
 * @property string $userpic
 * @property string $TrueName
 * @property string $Birthday
 * @property integer $pnameid
 * @property integer $cnameid
 * @property string $WorkNum
 * @property integer $WorkID
 * @property string $Specaility
 * @property string $Code
 * @property string $jiazhi
 * @property string $Phone
 * @property string $mobile
 * @property string $Address
 * @property string $Zip
 * @property string $Fax
 * @property string $MSN
 * @property integer $IsPass
 * @property string $PassDate
 * @property integer $IsStar
 * @property string $vipstime
 * @property string $vipktime
 * @property string $vipetime
 * @property integer $Score
 * @property string $userlog
 * @property string $tjUser
 * @property string $tjDate
 * @property integer $tjuserfen
 * @property boolean $jump
 * @property integer $hide
 * @property string $memo
 * @property string $issn
 * @property string $refuse
 * @property string $uptime
 * @property integer $iscj
 * @property string $lpname
 * @property string $lwork
 * @property integer $istuijian
 * @property integer $iszhuren
 * @property integer $isurl
 * @property integer $nomob
 * @property string $isemail
 * @property string $linkpage
 * @property string $fenjiphone
 * @property integer $nolink
 * @property integer $xnameid
 * @property string  $vipnav
 */
class OaskUser extends CActiveRecord
{
	public $image4upload;
	/**
	 * Returns the static model of the specified AR class.
	 * @return OaskUser the static model class
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
		return 'oask_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('jifen, fa, qtfa, asknum, replynum, helpnum, del, PostNum, LockUser, LoginCount, userstatus, sex, userClassID, pnameid, cnameid, WorkID, IsPass, IsStar, Score, tjuserfen, hide, iscj, istuijian, iszhuren, isurl, nomob, nolink', 'numerical', 'integerOnly'=>true),
			array('name, pwd, qq, email, question, answer, touxian, UserGroup, TrueName, WorkNum, Specaility, jiazhi, Zip, Fax, tjUser, issn, lpname, isemail, fenjiphone', 'length', 'max'=>50),
			array('jianjie, Friends, userlog, memo', 'length', 'max'=>1073741823),
			array('Sign, homepage, FriendGroup, Rights, favq, Phone, lwork, linkpage', 'length', 'max'=>100),
			array('LastIP', 'length', 'max'=>40),
			array('userpic', 'length', 'max'=>150),
			array('image4upload', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true,),
			array('Code', 'length', 'max'=>1000),
            array('name', 'required','message'=>'登录名不能为空'),
            array('TrueName', 'required','message'=>'真实姓名不能为空'),
            array('email', 'email'),
            array('viptitle,vipnav','safe'),
			array('mobile', 'length', 'max'=>12),
			array('Address', 'length', 'max'=>200),
			array('MSN', 'length', 'max'=>20),
			array('refuse', 'length', 'max'=>500),
			array('time, logintime, RegTime, CheckAlter, Birthday, PassDate, vipstime, vipktime, vipetime, tjDate, jump, uptime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, name, pwd, qq, email, question, answer, jifen, fa, qtfa, touxian, asknum, replynum, helpnum, time, del, logintime, jianjie, PostNum, UserGroup, RegTime, Sign, LockUser, LoginCount, LastIP, Friends, homepage, FriendGroup, userstatus, CheckAlter, Rights, favq, sex, userClassID, userpic, TrueName, Birthday, pnameid, cnameid, WorkNum, WorkID, Specaility, Code, jiazhi, Phone, mobile, Address, Zip, Fax, MSN, IsPass, PassDate, IsStar, vipstime, vipktime, vipetime, Score, userlog, tjUser, tjDate, tjuserfen, jump, hide, memo, issn, refuse, uptime, iscj, lpname, lwork, istuijian, iszhuren, isurl, nomob, isemail, linkpage, fenjiphone, nolink', 'safe', 'on'=>'search'),
		);
	}
    //主键
	public function primaryKey()
	{
	  return 'ID';
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'city'=>array(self::BELONGS_TO, 'AskCityCname', 'cnameid'),
			'prov'=>array(self::BELONGS_TO, 'AskCityPname', 'pnameid'),
			'work'=>array(self::BELONGS_TO,'AskWork','WorkID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'name' => 'Name',
			'pwd' => 'Pwd',
			'qq' => 'Qq',
			'email' => 'Email',
			'question' => 'Question',
			'answer' => 'Answer',
			'jifen' => 'Jifen',
			'fa' => 'Fa',
			'qtfa' => 'Qtfa',
			'touxian' => 'Touxian',
			'asknum' => 'Asknum',
			'replynum' => 'Replynum',
			'helpnum' => 'Helpnum',
			'time' => 'Time',
			'del' => 'Del',
			'logintime' => 'Logintime',
			'jianjie' => 'Jianjie',
			'PostNum' => 'Post Num',
			'UserGroup' => 'User Group',
			'RegTime' => 'Reg Time',
			'Sign' => 'Sign',
			'LockUser' => 'Lock User',
			'LoginCount' => 'Login Count',
			'LastIP' => 'Last Ip',
			'Friends' => 'Friends',
			'homepage' => 'Homepage',
			'FriendGroup' => 'Friend Group',
			'userstatus' => 'Userstatus',
			'CheckAlter' => 'Check Alter',
			'Rights' => 'Rights',
			'favq' => 'Favq',
			'sex' => 'Sex',
			'userClassID' => 'User Class',
			'userpic' => 'Userpic',
			'TrueName' => 'True Name',
			'Birthday' => 'Birthday',
			'pnameid' => 'Pnameid',
			'cnameid' => 'Cnameid',
			'WorkNum' => 'Work Num',
			'WorkID' => 'Work',
			'Specaility' => 'Specaility',
			'Code' => 'Code',
			'jiazhi' => 'Jiazhi',
			'Phone' => 'Phone',
			'mobile' => 'Mobile',
			'Address' => 'Address',
			'Zip' => 'Zip',
			'Fax' => 'Fax',
			'MSN' => 'Msn',
			'IsPass' => 'Is Pass',
			'PassDate' => 'Pass Date',
			'IsStar' => 'Is Star',
			'vipstime' => 'Vipstime',
			'vipktime' => 'Vipktime',
			'vipetime' => 'Vipetime',
			'Score' => 'Score',
			'userlog' => 'Userlog',
			'tjUser' => 'Tj User',
			'tjDate' => 'Tj Date',
			'tjuserfen' => 'Tjuserfen',
			'jump' => 'Jump',
			'hide' => 'Hide',
			'memo' => 'Memo',
			'issn' => 'Issn',
			'refuse' => 'Refuse',
			'uptime' => 'Uptime',
			'iscj' => 'Iscj',
			'lpname' => 'Lpname',
			'lwork' => 'Lwork',
			'istuijian' => 'Istuijian',
			'iszhuren' => 'Iszhuren',
			'isurl' => 'Isurl',
			'nomob' => 'Nomob',
			'isemail' => 'Isemail',
			'linkpage' => 'Linkpage',
			'fenjiphone' => 'Fenjiphone',
			'nolink' => 'Nolink',
                        'xnameid' => 'Xnameid',
                        'vipnav' => 'vipnav' 
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('pwd',$this->pwd,true);
		$criteria->compare('qq',$this->qq,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('jifen',$this->jifen);
		$criteria->compare('fa',$this->fa);
		$criteria->compare('qtfa',$this->qtfa);
		$criteria->compare('touxian',$this->touxian,true);
		$criteria->compare('asknum',$this->asknum);
		$criteria->compare('replynum',$this->replynum);
		$criteria->compare('helpnum',$this->helpnum);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('del',$this->del);
		$criteria->compare('logintime',$this->logintime,true);
		$criteria->compare('jianjie',$this->jianjie,true);
		$criteria->compare('PostNum',$this->PostNum);
		$criteria->compare('UserGroup',$this->UserGroup,true);
		$criteria->compare('RegTime',$this->RegTime,true);
		$criteria->compare('Sign',$this->Sign,true);
		$criteria->compare('LockUser',$this->LockUser);
		$criteria->compare('LoginCount',$this->LoginCount);
		$criteria->compare('LastIP',$this->LastIP,true);
		$criteria->compare('Friends',$this->Friends,true);
		$criteria->compare('homepage',$this->homepage,true);
		$criteria->compare('FriendGroup',$this->FriendGroup,true);
		$criteria->compare('userstatus',$this->userstatus);
		$criteria->compare('CheckAlter',$this->CheckAlter,true);
		$criteria->compare('Rights',$this->Rights,true);
		$criteria->compare('favq',$this->favq,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('userClassID',$this->userClassID);
		$criteria->compare('userpic',$this->userpic,true);
		$criteria->compare('TrueName',$this->TrueName,true);
		$criteria->compare('Birthday',$this->Birthday,true);
		$criteria->compare('pnameid',$this->pnameid);
		$criteria->compare('cnameid',$this->cnameid);
		$criteria->compare('WorkNum',$this->WorkNum,true);
		$criteria->compare('WorkID',$this->WorkID);
		$criteria->compare('Specaility',$this->Specaility,true);
		$criteria->compare('Code',$this->Code,true);
		$criteria->compare('jiazhi',$this->jiazhi,true);
		$criteria->compare('Phone',$this->Phone,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('Zip',$this->Zip,true);
		$criteria->compare('Fax',$this->Fax,true);
		$criteria->compare('MSN',$this->MSN,true);
		$criteria->compare('IsPass',$this->IsPass);
		$criteria->compare('PassDate',$this->PassDate,true);
		$criteria->compare('IsStar',$this->IsStar);
		$criteria->compare('vipstime',$this->vipstime,true);
		$criteria->compare('vipktime',$this->vipktime,true);
		$criteria->compare('vipetime',$this->vipetime,true);
		$criteria->compare('Score',$this->Score);
		$criteria->compare('userlog',$this->userlog,true);
		$criteria->compare('tjUser',$this->tjUser,true);
		$criteria->compare('tjDate',$this->tjDate,true);
		$criteria->compare('tjuserfen',$this->tjuserfen);
		$criteria->compare('jump',$this->jump);
		$criteria->compare('hide',$this->hide);
		$criteria->compare('memo',$this->memo,true);
		$criteria->compare('issn',$this->issn,true);
		$criteria->compare('refuse',$this->refuse,true);
		$criteria->compare('uptime',$this->uptime,true);
		$criteria->compare('iscj',$this->iscj);
		$criteria->compare('lpname',$this->lpname,true);
		$criteria->compare('lwork',$this->lwork,true);
		$criteria->compare('istuijian',$this->istuijian);
		$criteria->compare('iszhuren',$this->iszhuren);
		$criteria->compare('isurl',$this->isurl);
		$criteria->compare('nomob',$this->nomob);
		$criteria->compare('isemail',$this->isemail,true);
		$criteria->compare('linkpage',$this->linkpage,true);
		$criteria->compare('fenjiphone',$this->fenjiphone,true);
		$criteria->compare('nolink',$this->nolink);
                $criteria->compare('xnameid',$this->xnameid);
                $criteria->compare('vipnav',$this->vipnav);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}