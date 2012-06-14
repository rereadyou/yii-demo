<?php

class DefaultController extends Controller
{
	//根据主键读取
	public function actionIndex()
	{
		$user = Users::model()->findByPk(12);
// 		var_dump($user);
		echo $user->username;
		exit;
	}
	
	//插入新数据到相应的表中
	public function actionInsert(){
		$user = new User();
		$user->username = 'weihan';
		$user->save();
		$userid = $user->id;
		
		$users = new Users();
		$users->updateMeta($userid);
		$users->id = $userid;
		$users->username = 'weihan';
		$users->password = '1111';
		var_dump($users->save());
// 		var_dump($users->errors);
		exit;
	}
	
	//更新
	public function actionUpdate(){
		$users = Users::model();
		
		$userid = 11;
		
		$users->updateMeta($userid);
		
		var_dump($users->updateByPk($userid, array('username'=>'username11')));
		var_dump($users->errors);
	}
	
	//关联查询，使用主表查询， 不使用分表
	public function actionRelation(){
		$post = Post::model();
		$post_arr = $post->findAll();
		$info = array();
		foreach ($post_arr as $v){
			$info[$v->id]['post'] =  Posts::model()->findByPk($v->id);
			echo '问题内容：'.$info[$v->id]['post']->content.'<br>';
			
			$info[$v->id]['user'] =  Users::model()->findByPk($v->userid);
			echo '用 户 名：'.$info[$v->id]['user']->username.'<br>'; 
		}
		
		
// 		var_dump($info);
	}
}