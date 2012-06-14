<?php
/**
 *
 * 邮件发送
 * @author weihan
 *
 */
class sendMail {
	private static $email = '';
	private static $content = '';
	/**
	 * 邮件发送接口
	 *
	 * @param string $subject	邮件标题
	 * @param string $uid		问题发布者ID
	 * @param string $qid		问题ID
	 * @param string $title		问题标题
	 * @param string $templateID数据库中存放模板的ID
	 * @param string $tpl		外围模板，暂时没有用到
	 */
	public static function send($subject, $uid, $qid, $title, $templateID, $tpl = 'mymail'){
		self::getEmailTemplate($templateID);
		self::fillEmailTemplate($uid, $qid, $title);
		//邮件为空，直接返回
    	if(empty(self::$email)) return ; 
		self::sendEmail(self::$email, $subject, self::$content, $tpl);
	}
    //邮件发送接口,多个地址，传递数组
    private static function sendEmail($address, $subject, $message, $tpl = 'mymail') {
        $mail = Yii::app()->mailer;
        $mail->IsSMTP(); // telling to send this mail using SMTP
        $mail->SetFrom($mail->Username, $mail->realname);
        $mail->AddReplyTo($mail->Username,$mail->realname);
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->getView($tpl);

        if (is_array($address)) {
            foreach ($address as $v)
                $mail->AddAddress($address, $address);
        }else
            $mail->AddAddress($address, $address);

        if(!$mail->Send()) {
//            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
//            echo "Message sent!";
        }
    }
    /**
     * 根据ID，获取邮件发送模板
     *
     * @param int $templateID
     * 
     */
    private static function getEmailTemplate($templateID){
    	$templateID = (int)$templateID;
    	if (!self::$content = cache()->get('email_template_' + $templateID)){
    		$mailTemplate = MakemailTemplate::model()->findByAttributes(array('id'=>$templateID));
    		self::$content = $mailTemplate->content;
    		cache()->set('email_template_' + $templateID, self::$content, 3600);
    	}
    }
    /**
     * 替换模板中的信息，为正确的信息
     *
     * @param string $uname
     * @param string $qid
     * @param string $title
     */
    private static function fillEmailTemplate($uid, $qid, $title){
    	$uid = (int)$uid;
    	$user = OaskUser::model()->findByPk($uid, array('select'=>'name, lpname, email, pnameid, cnameid'));
    	self::$email = $user->email;
    	//邮件为空，直接返回
    	if(empty(self::$email)) return ; 
    	    	
    	self::$content = str_replace('[登录名]', $user->name, self::$content);
    	self::$content = str_replace('[用户名]', $user->name, self::$content);	
    	self::$content = str_replace('[密码]', $user->lpname, self::$content);
    	$url = url('zixun/show&id='.$qid);
    	self::$content = str_replace('[问题地址]', $url, self::$content);
    	self::$content = str_replace('[问题URL]', $url, self::$content);
    	$question = OaskQuestion::model()->findByPk($qid, array('select'=>'title, pnameid, cnameid'));
    	self::$content = str_replace('[问题标题]', $question->title, self::$content);
    	//推荐律师
    	if (!$tuijian = cache()->get('tuijian_' . $question->pnameid)){
	    	$criteria = new CDbCriteria();
	    	$criteria->select = 'TrueName,Tel,ProID,CityID,UserName';
	    	$criteria->limit = 6;
	    	$criteria->addCondition(array('ProID='.$question->pnameid));
	    	$lvshi = Lawtuijian::model()->findAll($criteria);
	    	$tuijian = '';
	    	foreach ($lvshi as $k=>$v){
	    		$city = AskCityCname::model()->findByPk($v->CityID, array('select'=>'cname'));
	    		$tuijian .= $city->cname."律师--" .$v->TrueName . '(电话：' . $v->Tel .')&nbsp;&nbsp;';
	    		$k !=0 && $k % 3 == 0 && $tuijian .= '<br />';
	    	}
	    	cache()->set('tuijian_' . $question->pnameid, $tuijian, 3600);
    	}
    	self::$content = str_replace('[推荐律师]', $tuijian, self::$content);
    	//省市
    	
    	self::$content = str_replace('[地区]', $question->province->pname, self::$content);
    }
    
    
	/**
	 * 邮件发送接口
	 *
	 * @param string $subject	邮件标题
	 * @param string $uid		问题发布者ID
	 * @param string $qid		问题ID
	 * @param string $title		问题标题
	 * @param string $templateID数据库中存放模板的ID
	 * @param string $tpl		外围模板，暂时没有用到
	 */
	public static function send4best($subject, $replyer, $qid, $templateID, $tpl = 'mymail'){
		self::getEmailTemplate($templateID);
		self::fillEmailTemplate4best($replyer, $qid);
		//邮件为空，直接返回
    	if(empty(self::$email)) return ; 
		self::sendEmail(self::$email, $subject, self::$content, $tpl);
	}
	/**
     * 替换模板中的信息，为正确的信息
     *
     * @param string $uname
     * @param string $qid
     * @param string $title
     */
    private static function fillEmailTemplate4best($replyer, $qid){
    	$user = OaskUser::model()->findByAttributes(array('name'=>$replyer), array('select'=>'name, lpname, email, pnameid, cnameid, TrueName'));
    	self::$email = $user->email;
    	//邮件为空，直接返回
    	if(empty(self::$email)) return ; 
    	self::$content = str_replace('[真实姓名]', $user->TrueName, self::$content);
    	//
    	$question = OaskQuestion::model()->findByPk($qid);
    	
    	self::$content = str_replace('[发布人]', $question->sender, self::$content);	
    	$url = url('zixun/show&id='.$qid);
    	self::$content = str_replace('[咨询标题]', '<a href="'.$url.'" target="_blank">'.$question->title.'</a>', self::$content);
    	self::$content = str_replace('[咨询内容]', $question->content, self::$content);
    	self::$content = str_replace('[咨询时间]', $question->sendtime, self::$content);
    	self::$content = str_replace('[最佳时间]', $question->BDatetime, self::$content);
    	
    	//省市
    	$oaskQuestion = OaskQuestion::model();
    	$oaskQuestion->pnameid = $user->pnameid;
//    	$oaskQuestion->cnameid = $user->cnameid;
    	self::$content = str_replace('[地区]', $oaskQuestion->province->pname, self::$content);
    }
}