<?php

class SiteController extends Controller {
    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
                // captcha action renders the CAPTCHA image displayed on the contact page
                'captcha'=>array(
                        'class'=>'CCaptchaAction',
                        'backColor'=>0xFFFFFF,
                ),
                // page action renders "static" pages stored under 'protected/views/site/pages'
                // They can be accessed via: index.php?r=site/page&view=FileName
                'page'=>array(
                        'class'=>'CViewAction',
                ),
        );
    }
    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if($error=Yii::app()->errorHandler->error) {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model=new ContactForm;
        if(isset($_POST['ContactForm'])) {
            $model->attributes=$_POST['ContactForm'];
            if($model->validate()) {
                $headers="From: {$model->email}\r\nReply-To: {$model->email}";
                mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
                Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact',array('model'=>$model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model=new LoginForm;
        //获取自定义的referer
        $referer = '';
        if (isset($_POST['referer']) || isset($_GET['referer'])) {
            $referer = empty($_POST['referer']) ? $_GET['referer'] : $_POST['referer'];
        }

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm'])) {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login()) {//新增函数，记录用户的最后登录时间
                UserTool::user()->SetLastLoginState();//设置用户最后登录日期

                //同步登录
                $url_yb="http://www.9ask.cn/login_test.asp?username=" . $model->username ."&password=" . AskTool::MD5($model->password)   ;
                echo "<script src=\"$url_yb\"></script>";
               // $this->redirect(Yii::app()->user->returnUrl);
                empty($referer) && $referer = app()->user->returnUrl;
                $this->redirect($referer);

            }
        }
        // display the login form
        $this->renderPartial('login',array('model'=>$model, 'referer'=>$referer));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        isset($_GET['referer']) && $referer = $_GET['referer'];
        empty($referer) && $referer = app()->homeUrl;
        $this->redirect($referer);
    }

    /**
     * ajax login
     */
    public function actionAjaxLogin() {
        $model=new LoginForm;
        // collect user input data
        if(isset($_POST['username']) || isset($_POST['password'])) {
            $model->username = $_POST['username'];
            $model->password = $_POST['password'];
            $model->rememberMe = 1;
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login()) {//新增函数，记录用户的最后登录时间
                UserTool::user()->SetLastLoginState();//设置用户最后登录日期
                echo '1';
            }
        }
    }
    public function actionCommonlogin() {
        $model=new LoginForm;
        // collect user input data
        if(isset($_POST['username']) || isset($_POST['password'])) {
            $model->username = $_POST['username'];
            $model->password = $_POST['password'];
            $model->rememberMe = 1;
            // validate user input and redirect to the previous page if valid
            $urlrefer=$_SERVER[ 'HTTP_REFERER'];
            if($model->validate() && $model->login()) {//新增函数，记录用户的最后登录时间
                UserTool::user()->SetLastLoginState();//设置用户最后登录日期
                $url_yb="http://www.9ask.cn/login_test.asp?username=" . $_POST['username'] ."&password=" . AskTool::MD5($_POST['password'])   ;
                echo "<script src=\"$url_yb\"></script>";
                if(empty ($urlrefer)) {
                    AskTool::GoUrl('','/');
                }
                else {
                    AskTool::GoUrl('',$urlrefer   );
                }
            }
            else {
                if(empty ($urlrefer)) {
                    AskTool::GoUrl('登录失败！','/'  );
                }
                else {
                    AskTool::GoUrl('登录失败！', $urlrefer);
                }
            }
        }
    }
   //站点同步登录
   public function actioSynclogin() {
        $model=new LoginForm;
        // collect user input data
        if(isset($_POST['username']) || isset($_POST['password'])) {
            $model->username = $_get['username'];
            $model->password = $_get['password'];
            $model->rememberMe = 1;
            // validate user input and redirect to the previous page if valid
            $urlrefer=$_SERVER[ 'HTTP_REFERER'];
            if($model->validate() && $model->login2()) {//新增函数，记录用户的最后登录时间
                UserTool::user()->SetLastLoginState();//设置用户最后登录日期
                //$url_yb="http://www.9ask.cn/login_test.asp?username=" . $_POST['username'] ."&password=" . AskTool::MD5($_POST['password'])   ;
               // echo "<script src=\"$url_yb\"></script>";
                if(empty ($urlrefer)) {
                    AskTool::GoUrl('','/');
                }
                else {
                    AskTool::GoUrl('',$urlrefer   );
                }
            }
            else {
                if(empty ($urlrefer)) {
                    AskTool::GoUrl('登录失败！','/'  );
                }
                else {
                    AskTool::GoUrl('登录失败！', $urlrefer);
                }
            }
        }
    }
    public function actionJsloginform() {

        $this->renderPartial('jsloginform',array());


    }

}