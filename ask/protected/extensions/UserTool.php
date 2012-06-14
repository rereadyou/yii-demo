<?php
class UserTool extends CComponent{
	private  static  $user;
	public  static function user(){
		if(!isset (app()->user->id) || empty (app()->user->id))
                        {
                        //self::$user =new OaskUser(); //构造一个新结构，避免报错
                        exit("需要重新登录");
                        }
                        else {
                       self::$user = OaskUser::model()->findByPk(app()->user->id);
                        }		
		return new UserTool();
	}
	
	public  function getEmail(){
		return self::$user->email;
	}
	
	public function getUserClassID(){
		return self::$user->userClassID;
	}
	
	public function getIsStar(){
		return self::$user->IsStar;
	}
	
	public function getMobile(){
		return self::$user->mobile;
	}
        public function getqq(){
		return self::$user->qq;
	}
	//获取真实姓名
        public function getTrueName(){
		return self::$user->TrueName;
	}
           //获取注册日期
        public function GetRegTime()
        {
            return self::$user->RegTime;
        }
        //获取最后登录日期
           public function GetLoginTime()
        {
            return self::$user->logintime;
        }
        //获取用户的积分
        public function GetJiFen()
        {
            return self::$user->jifen;
        }
        //我发布问题的总数
        public function GetAallQuestion()
        {   $QustionSum=0;
            if(isset (self::$user))
            {  
             $QustionSum=OaskQuestion::model()->count("sender='" .  self::$user->name  . "'");
            }
             return  $QustionSum;
        }
        //获取到好评总数
      public function GetCountGoods()
        {   $QustionSum=0;
            if(isset (self::$user))
            {
             //$QustionSum=OaskQuestion::model()->count("sender='" .  self::$user->name  . "'");
            $QustionSum=OaskUsercomment::model()->count("lawyer='" . app()->user->id ."'");
            }
             return  $QustionSum;
        }
        //获取到我回复问题的个数
        public function GetAllReplys()
        {
            $QustionSum=0;
            if(isset (self::$user))
            {
             $QustionSum=OaskReply::model()->count("replyer='" .  self::$user->name  . "'");
            }
             return  $QustionSum;
        }
        //获取被选择最佳答案的回复数
     public function GetAllReplys_jie()
        {
            $QustionSum=0;
            if(isset (self::$user))
            {
             $QustionSum=OaskReply::model()->count("replyer='" .  self::$user->name  . "' and best =1");
            }
             return  $QustionSum;
        }
        //设置最后登录时间,登录次数，登录ip等信息
        public function SetLastLoginState()
        {       self::$user->logintime =date('Y-m-d h:i:s',time());
                self::$user->LastIP=AskTool::getClientIp();//获取到ip信息
                self::$user->LoginCount=self::$user->LoginCount+1;
                self::$user->jifen=self::$user->jifen+10; //增加10个积分
                //其他的后续扩展，比如设置在线律师等
                self::$user->update(array('logintime','LastIP','LoginCount'));
                //如果是律师，那么就插入到在线库中
                if(self::$user->userClassID==1)
                        {
                        $this->InsertOnline(self::$user->name);
                        }
        }
        public function InsertOnline($username)
        {
            //获取到今日日期
             $today=date('Y-m-d',time());
             $online=Online::model(); //获取在线律师的模型
             $IsLogin=$online->count("username='$username' and intime>'$today'");
             if($IsLogin==0) //如果今日没有登录，那么就进行记录
                 {$online=new Online();
                 $online->intime=date('Y-m-d h:i:s',time());
                 $online->username=$username;
                 $online->save(false);//保存信息              
                 }
               
             
        }
	public function setEmail($email){
		self::$user->email = $email;
		self::$user->update(array('email'));
	}

	public function addScore($score){
		self::$user->updateCounters(array('Score'=>$score));
               }
}