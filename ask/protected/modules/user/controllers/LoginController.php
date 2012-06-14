<?php

class LoginController extends CController {
    public function actionIndex() {
       $this->render('index');
    }
    //用户登录
    public function actionUserLogin() {
     //   echo "登录程序再次";
        $name=$_POST["name"];//获取到用户名
        $psw=$_POST["pwd"]; //获取到密码
        //echo ($name . "||" . $psw);
        if(empty ($name)||empty ($psw)) {
            echo "param error";
            return null; //如果用户名任何也不输入，就直接退出
        }
        else {
             //开始进行登录
            $psw=substr(md5($psw),8,16);//16位密码加密
            $criteria = new CDbCriteria();
           //总记录数放到缓存中600秒
             $criteria->select="ID,t.name,t.TrueName,t.userclassID,t.IsStar,t.Score"; //只取需要的字段
             $criteria->condition="t.pwd='$psw' and name='$name'"; //构建查询我的咨询
            //$criteria->order="t.ID desc"; //按最新的进行排序
             $criteria->limit=1; //只显示一条
             $users=OaskUser::model()->find($criteria);
            if($users==null  )
                {
                 echo "登录失败";
                }
                else
                    {                   
                    //登录成功后设置cookie ，保存两周
                    setcookie("souask[UID]",$users->ID,time()+3600*24*14,'/');
                    setcookie("souask[UNM]",$name,time()+3600*24*14,'/');
                    setcookie("souask[UPW]",$psw,time()+3600*24*14,'/');
                    setcookie("souask[UJF]",$users->Score,time()+3600*24*14,'/');
                    setcookie("souask[UTY]",$users->userClassID,time()+3600*24*14,'/');
                    setcookie("souask[STR]",$users->IsStar,time()+3600*24*14,'/');
                   $urlrefer=$_GET["refer"];
                   if(empty ($urlrefer))
                       {
                          AskTool::GoUrl('',url('user', array('refer'=>"user/login" )));
                       }
                       else
                           {
                           AskTool::GoUrl('',$urlrefer  ."&idnums=" . time());
                           }
                   // app()->request->redirect(url('message/listmessageaskme'));
                    $this->render('userlogin');
                    //echo "cookie=" .$_COOKIE['souask']['UID'];
                    }
            
        }

    }
     


}