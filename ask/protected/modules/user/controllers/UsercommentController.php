<?php

class UserCommentController extends CController {
    public function actionIndex() {
        $model = new UserComment();
        if (isset($_POST['UserComment'])) {
            $model->attributes = $_POST['UserComment'];
            $model->adddate = date('Y-m-d H:i:s', time());
            $model->username = app()->user->name;
            $isStar = app()->params['STR'];
            $model->commenttype = app()->user->$isStar;

            if ($model->save())
                $this->render('index', array('model'=>$model));
            app()->msg->message('保存成功，感谢您的参与',url('user/usercomment'));
        }
        else {
            $this->render('index', array('model'=>$model));
        }
    }

    public function filters() {
        return array(
                'accessControl'
        );
    }
    public function accessRules() {
        return array(
                array('allow',
                        'users' => array('@'),
                ),
                array('deny',
                        'users' => array('*'),
                )
        );
    }


}