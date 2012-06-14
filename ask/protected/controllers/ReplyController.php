<?php
/**
 * 处理咨询回复的
 * Enter description here ...
 * @author Administrator
 *
 */
class ReplyController extends CController {
	
	public function actions() {
        return array(
                // captcha action renders the CAPTCHA image displayed on the contact page
                'captcha'=>array(
                        'class'=>'CCaptchaAction',
                        'backColor'=>0xFFFFFF,
                        'width' => 70,
                        'maxLength' => 4,
                        'minLength' => 4,
                        'foreColor' => 0xFF0000,
                        'padding' => 3,
                ),
        );
    }

    /**
     * 点评，要判断ip
     * 鲜花，鸡蛋
     * Enter description here ...
     */
    public function actionPing($id,$p) {
        //查询日志
        if(app()->user->isguest) {
            echo '0';//未登陆
            app()->end();
        }
        $ip = AskTool::getClientIp();
        $time = date('Y-m-d');
        $log = OaskUsercomment::model()->findByAttributes(array('ip'=>$ip,'adddate'=>$time,'senderid'=>app()->user->id,'qid'=>$id));
        if($log) {
            echo '-1';//已经评过
            app()->end();
        }else {
            $log = new OaskUsercomment();
            $log->adddate = $time;
            $log->senderid = app()->user->id;
            $log->qid = $id;
            $log->ip = $ip;
             if($p == 'egg') {
                 $log->pltype=1;
             }
             else
                 {
                 $log->pltype=0;
                 }

            $log->lawyer=$this->GetLawyerByReplyId($id);//保存谁的好评
            $log->save();
            //echo 1;//评论成功

        }

        if($p == 'egg') {
            OaskReply::model()->updateCounters(array('egg'=>1),'id = '.$id);
            $r = OaskReply::model()->findByPk($id);
            echo "不好:".$r->egg;
        }elseif ($p == 'flower') {
            OaskReply::model()->updateCounters(array('flower'=>1),'id = '.$id);
            $r = OaskReply::model()->findByPk($id);
            echo "好:".$r->flower;
        }

        //$ip = AskTool::getClientIp();
    }

    /**
     * 发表回复
     * Enter description here ...
     */

    public function actionInsert() {
        $reply = new OaskReply();
        $reply->verifyCode = $_POST['verifyCode'];
        $reply->qid = (int)$_POST['id'];
        $reply->content = $_POST['content'];
        $reply->replyer = app()->user->isguest ? '9askcn' : app()->user->name;
	   	
        //过滤特殊标签
        $reply->content = AskTool::filterSpecialChars($reply->content);
        
        //referer
        $referer = app()->request->urlReferrer;
        //回复内容，不可以为空
        (empty($reply->content)) && app()->msg->message('回复内容不可以为空！', $referer);
        
        //处理违禁词
        (!Banner::filter($reply->content)) && app()->msg->message('你发布的信息中有敏感词，请修改后再发', $referer);
       	//
       	$OaskQuestion = OaskQuestion::model()->findByPk($reply->qid, array('select'=>'title, sender, replys, lastuser'));
       	(count($OaskQuestion) != 1) && app()->msg->message('此问题不存在！', $referer);
       	($OaskQuestion->sender == app()->user->name) && app()->msg->message('您不能回复自己的发布的信息！', $referer); 
       	
       	//是否已经回复过，如果回复过，则禁止再次回复
       	if (!app()->user->isguest){
       		$hasReplied = OaskReply::model()->countByAttributes(array('qid'=>$reply->qid, 'replyer'=>$reply->replyer));
       		((int)$hasReplied > 0) && app()->msg->message('您已经回复过，请不要重复回复！', $referer);
       	}
       	//查看是否是第一个回复
       	$isFirst = FALSE;
       	$hsaReply = OaskReply::model()->countByAttributes(array('qid'=>$reply->qid));
       	((int)$hsaReply == 0) && $isFirst = TRUE;
       	
       	//保存失败，
        if (!$reply->save()){
        	//保存失败
        	$errors = $reply->getErrors();
        	$msg = '';
        	foreach ($errors as $error){
        		$msg .= $error[0] . ','; 
        	}
        	app()->msg->message($msg, $referer);
        }
        //更新最后回复者
        OaskQuestion::model()->updateByPk($reply->qid, array('lastuser'=>$reply->replyer));
        
        //更新回复数量
        AskTool::updateReplyNumbers($reply->qid);
        
        //增加积分
        AskTool::addJifen($reply->replyer, 5);
        
        //如果是首个回复，发邮件
    	$isFirst && sendMail::send('您在中顾法律网的咨询有回复啦', app()->user->id, $reply->qid, $OaskQuestion->title, 16);
        
//        app()->request->redirect($referer);
		app()->msg->message('回复成功，感谢您的参与！', $referer);
    }

    /**
     * 补充回复
     * Enter description here ...
     * @param unknown_type $id
     */
    public function actionEdit() {
		//参数不合法
    	$rid = (int)$_POST['rid'];
    	$answer = $_POST['answer'];
    	if(empty($rid) || empty($answer)) 
    		exit('0');
    	$answer = AskTool::filterSpecialChars($answer);
    	//处理违禁词
        if(!Banner::filter($answer))exit('-1');
        
    	$model = OaskReply::model()->findByPk($rid);
    	//必须回复者自己才能修改，自己的回复
    	if (empty(app()->user->name) || $model->replyer != app()->user->name) 
    		exit('0');
    	$model->content = $answer;
    	$model->update();
    	echo '1';
    	
    }

    /**
     * 最佳答案
     * Enter description here ...
     */
    public function actionGood($replyid) {

    }
    /**
     * 根据问题回复者id,获取问题的作者的用户id
     *ndw
     */
    public function GetLawyerByReplyId($rid) {
        $uid=OaskReply::model()->with(array('user'=>array('select'=>'ID')))->findByPk($rid);
        if($uid!=null) {
            return $uid->user->ID;
        }
        else {
            return 0;
        }


    }


}