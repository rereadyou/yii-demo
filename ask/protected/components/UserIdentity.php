<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	private $_user = array();

	public function authenticate()
	{
//		$users=array(
//			// username => password
//			'demo'=>'demo',
//			'admin'=>'admin',
//		);
//		if(!isset($users[$this->username]))
//			$this->errorCode=self::ERROR_USERNAME_INVALID;
//		else if($users[$this->username]!==$this->password)
//			$this->errorCode=self::ERROR_PASSWORD_INVALID;
//		else
//			$this->errorCode=self::ERROR_NONE;
//		return !$this->errorCode;

		$user = OaskUser::model()->findByAttributes(array('name'=>$this->username));

		if ($user == NULL){
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		}elseif ($user->pwd != $this->md5_16($this->password)){
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		}else {
			$this->_user = $user;

			$this->setState(app()->params['UID'], $user->ID);
			$this->setState(app()->params['UNM'], $user->name);
			$this->setState(app()->params['UPW'], $user->pwd);
			$this->setState(app()->params['UJF'], $user->Score);
			$this->setState(app()->params['UTY'], $user->userClassID);
			$this->setState(app()->params['STR'], $user->IsStar);
			$this->errorCode = self::ERROR_NONE;
		}

		return !$this->errorCode;
	}
        public function authenticate2()
	{
//		$users=array(
//			// username => password
//			'demo'=>'demo',
//			'admin'=>'admin',
//		);
//		if(!isset($users[$this->username]))
//			$this->errorCode=self::ERROR_USERNAME_INVALID;
//		else if($users[$this->username]!==$this->password)
//			$this->errorCode=self::ERROR_PASSWORD_INVALID;
//		else
//			$this->errorCode=self::ERROR_NONE;
//		return !$this->errorCode;

		$user = OaskUser::model()->findByAttributes(array('name'=>$this->username));

		if ($user == NULL){
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		}elseif ($user->pwd != $this->password){
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		}else {
			$this->_user = $user;

			$this->setState(app()->params['UID'], $user->ID);
			$this->setState(app()->params['UNM'], $user->name);
			$this->setState(app()->params['UPW'], $user->pwd);
			$this->setState(app()->params['UJF'], $user->Score);
			$this->setState(app()->params['UTY'], $user->userClassID);
			$this->setState(app()->params['STR'], $user->IsStar);
			$this->errorCode = self::ERROR_NONE;
		}

		return !$this->errorCode;
	}
	public function getId(){
		return $this->_user->ID;
	}

	//16位密码加密
	public function md5_16($password){
		return substr(md5($password),8,16);
	}
}