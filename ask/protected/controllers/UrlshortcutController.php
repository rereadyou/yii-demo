<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
class urlshortcutController extends Controller {
    public function actioncreate() {


        $Shortcut = "[InternetShortcut]



URL=http://www.9ask.cn/login_test.asp?username=$user&password=$pw



IDList=
IconFile=C:\Windows\system32\SHELL32.dll


IconIndex=1



[{000214A0-0000-0000-C000-000000000046}]



Prop3=19,2



                ";

        Header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=9ask.url;");
        echo $Shortcut;
    }
    public function actionget()
    {   $name=app()->user->name;
        $myuser=OaskUser::model()->findbyPK(app()->user->id);
        $psw=$myuser->pwd;
        //echo 'fds';
      $this->redirect("/index.php/urlshortcut/make/user/$name/pw/$psw");
    }
    //url 生成2
    public function  actionmake($user,$pw) {
        //$myuser=OaskUser::model()->findbyPK(app()->user->id);         
        $Shortcut = "[InternetShortcut]
        URL=http://www.9ask.cn/login_test.asp?username=$user&password=$pw
        IDList=
        IconIndex=43
        IconFile=C:\Windows\system32\SHELL32.dll
        HotKey=1626
        [{000214A0-0000-0000-C000-000000000046}]Prop3=19,2";
        Header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=9ask.url;");
        echo $Shortcut;
   }
   //获取密码
 }
?>
