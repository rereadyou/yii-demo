<?php
class DuanxinController extends Controller{
//保存一对一咨询，批量
public $title;
public $content;
public $senderid;
public function actionIndex()
    {
  
    }
public function  actionaddcontents()
    {
     $chkid=$_POST['chkid'];
     $newid=(int)$_POST['newid'];
     $senderid=(int)$_POST['senderid'];     
     $result=array_unique($chkid);//消除重复数组
     if(empty($newid) || !is_array($result) || empty($senderid)) //参数不正确的情况下
         {
         exit('error');
         }
    //读取咨询的标题，内容等信息
    $question=OaskQuestion::model()->findByPk($newid);
    if($question==NULL)
        {
        exit("nodata");
        }
     $this->title=$question->title;
     $this->content=$question->content;
     $this->senderid=$senderid;//发布者id
     //echo $this->title;
     $icount=count($chkid);
     for($i=0;$i<$icount;$i++)
     {
     if($result[$i]!=null) $this->message_add($result[$i]);
     }
     //添加完毕后给出成功提示
     $this->renderpartial('questiontomessage',array('qid'=>$newid));
    }
//编写函数，插入一条短信
  public function message_add($addressid)
  {    //开始发布信息
      $onemsg=new Message();
      $onemsg->Title=$this->title;
      $onemsg->Content=$this->content;
      $onemsg->SenderID=$this->senderid;
      $onemsg->AddresseeID=$addressid;
      $onemsg->AddDate=date('Y-m-d h:i:s',time());
      $onemsg->ReplyDate=date('Y-m-d h:i:s',time());
      $onemsg->FatherID=0;
      $onemsg->LastReply=0;
      $onemsg->save(false);

  }
}