<?php

class LogOutController extends CController {
    public function actionIndex() {
  
         $this->render('index');
         // setcookie("souask[UID]",'',time()-3600*24*14,'/');
         // setcookie("souask[UNM]",'',time()-3600*24*14,'/');
         //setcookie("souask[UPW]",'',time()-3600*24*14,'/');
         //setcookie("souask[UJF]",'',time()-3600*24*14,'/');
         //setcookie("souask[UTY]",'',time()-3600*24*14,'/');
        // setcookie("souask[STR]",'',time()-3600*24*14,'/');
         //如果有refer ，那么就进行退出后进入该页
         app()->user->logout();//退出       

    }
    //用户登录



}