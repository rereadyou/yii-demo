<?php
/**
 *
 * 公用工具类
 * @author terry
 *
 */
class AskTool {

    /**
     * 获取客户端IP地址
     * @return string 客户端IP地址
     */
    public static function getClientIp() {
        if(isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $ip='222.173.27.114';//测试期间的临时ip
        return $ip;
    }
    //md5 16加密,返回md5的16位加密，中间为密码传参
    public static function MD5($psw) {
        return substr(md5($psw),8,16);
    }
    //js跳转类，用于弹出页面提示，并跳转到制定页面
    //title 提示内容，url 页面要跳转的地方
    //power by ndw
    //调用例子： AskTool::GoUrl("您的回复信息已经保存", url('user/message/answermessage', array('id'=> $messageid )));
    public static function GoUrl($title='',$url="") { //替换单引号
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        $title=str_replace("'", "", $title);
        $url=str_replace("'", "", $url);
        if(!empty($title)) {
            echo "<script   >alert('$title');location.href='$url'</script>";
        }
        else {
            echo "<script  >location.href='$url'</script>";
        }
    }
    //js后退类，用于给出提示或不给提示，直接页面进行后台，可用户服务器登录类验证时调用
    //title 提示内容
    //power by ndw
    //调用例子： AskTool::GoToback("对不起，您没有填写正文，不能提交");
    public static function GoToback($title='') { //替换单引号
        $title=str_replace("'", "", $title);
        if(!empty($title)) {
            echo "<script  >alert('$title');history.go(-1)</script>";
        }
        else {
            echo "<script   >history.go(-1)</script>";
        }
    }
    //获取到县
    public static function Area_getXname($id) {
        $cachename="Area_xname_" . $id;
        $xname='';
        if(cache()->get($cachename)) {
            $xname=cache()->get($cachename);
        }
        else {

            $xname=AskCityXname::model()->findbyPk($id);
            cache()->set($cachename,$xname,3600*48);//缓存两天
        }
        return $xname;
    }
    // 获取到省份名称，缓存一周
    //返回一个二唯数组
    public static function Area_GetPname() {
        $cachename="Area_caches_bypname_pname"; //缓存名称
        //缓存数据,如果缓存存在就从缓存中取
        $area_p_arr=array();
        if(cache()->get($cachename)) {
            $area_p_arr= unserialize(cache()->get($cachename));
        }else {
            //建立管理数组
            $Area_Provs=AskCityPname::model()->findall();
            foreach($Area_Provs as $k=>$v) {
                $area_p_arr[$v->pNameID]=$v->pname;
            }
            cache()->set($cachename,serialize($area_p_arr),3600*24*7); //缓存一周
        }
        return $area_p_arr  ;  //返回关联数组
    }
    //获取到县
    //伪静态需要，建立缓存拼音
    public static function Area_GetPnameforpinyin() {
        $cachename="Area_caches_bypname_pnameforpinyins"; //缓存名称
        //缓存数据,如果缓存存在就从缓存中取
        $area_p_arr=array();
        if(cache()->get($cachename)) {
            $area_p_arr= unserialize(cache()->get($cachename));
        }else {
            //建立管理数组
            $Area_Provs=AskCityPname::model()->findall();
            foreach($Area_Provs as $k=>$v) {
                $area_p_arr[$v->pNameID]=$v->paixu;
            }
            cache()->set($cachename,serialize($area_p_arr),3600*24*7); //缓存一周
        }
        return $area_p_arr  ;  //返回关联数组
    }
    //获取到城市名称，缓存一周,
    public static  function Area_GetCname() {
        $cachename="Area_caches_bycname_cname"; //缓存名称
        //缓存数据,如果缓存存在就从缓存中取
        $area_c_arr=array();
        if(cache()->get($cachename)  ) {
            //读取缓存
            $area_c_arr=unserialize(cache()->get($cachename));
        }else {
            //从数据库中查询
            //建立管理数组
            $Area_ctitys=AskCityCname::model()->findall(array('select'=>'cnameID,cname'));
            foreach($Area_ctitys as $k=>$v) {
                $area_c_arr[$v->cnameID]=$v->cname;
            }
            cache()->set($cachename,serialize($area_c_arr),3600*24*7); //缓存一周
        }
        return $area_c_arr  ; //返回关联数组
    }
    //获取到省份拼音
    public static  function Area_GetPname_forpinyins() {
        $cachename="Area_caches_bypname_pnameforpinyins"; //缓存名称
        //缓存数据,如果缓存存在就从缓存中取
        $area_c_arr=array();
        if(cache()->get($cachename)   ) {
            //读取缓存
            $area_c_arr=unserialize(cache()->get($cachename));
        }else {
            //从数据库中查询
            //建立管理数组
            $Area_ctitys=AskCityPname::model()->findall(array('select'=>'pNameID,paixu'));
            foreach($Area_ctitys as $k=>$v) {
                $area_c_arr[$v->pNameID]=$v->paixu;
            }
            cache()->set($cachename,serialize($area_c_arr),3600*24*7); //缓存一周
        }
        return $area_c_arr  ; //返回关联数组
    }
    //获取到城市拼音
    public static  function Area_GetCname_forpinyins() {
        $cachename="Area_caches_bycname_cname_forpinyins"; //缓存名称
        //缓存数据,如果缓存存在就从缓存中取
        $area_c_arr=array();
        if(cache()->get($cachename)  ) {
            //读取缓存
            $area_c_arr=unserialize(cache()->get($cachename));
        }else {
            //从数据库中查询
            //建立管理数组
            $Area_ctitys=AskCityCname::model()->findall(array('select'=>'cnameID,paixu'));
            foreach($Area_ctitys as $k=>$v) {
                $area_c_arr[$v->cnameID]=$v->paixu;
            }
            cache()->set($cachename,serialize($area_c_arr),3600*24*7); //缓存一周
        }
        return $area_c_arr  ; //返回关联数组
    }
    //地区搜索，根据搜索值 返回数据 ，比如搜索 济南， 山东
    public static  function Area_search($areaname) {
        $jgarray=array();
        $city=AskCityCname::model()->find(array('condition'=>" cname like '%$areaname%'"));
        if($city!=null) {
            $jgarray['iscity']=1;
            $jgarray['id']=$city['cnameID'];
            $jgarray['name']=$city['cname'];
            return $jgarray;  //返回省份
        }
        else {
            $prov=AskCityPname::model()->find(array('condition'=>" pname like '%$areaname%'"));
            if($prov!=null) {
                $jgarray['iscity']=0;
                $jgarray['id']=$prov['pNameID'];
                $jgarray['name']=$prov['pname'];
                return $jgarray; //返回城市
            }
            else {
                return null; //返回空
            }

        }
    }


    //中顾类别通用搜索,比如结果是婚姻家庭，刑事辩护等，返回一个数组
    public static function OaskClass_search($classname) {
        $searchclass=OaskClass::model()->find(array('condition'=>" topic like  '%$classname%'"));
        return $searchclass;//返回结果集
    }
    //根据省份id,获取到城市的拼音，比如输入 1 输出 beijing
    public static function AskProv_getpaixu($id) {
        $cachename="Area_caches_bypname_pnameforpinyins"; //缓存名称
        $result=array();
        if(cache()->get($cachename)  ) {
            $result=unserialize(cache()->get($cachename));//直接从缓存中读取
        }
        else {
            $result=self::Area_GetPname_forpinyins();//如果没有缓存，则调用函数生成并且缓存
        }
        return $result[$id];
    }
    //根据城市id,获取到城市的拼音，比如输入 86 输出 jinan
    public static function AskCity_getpaixu($id) {
        $cachename="Area_caches_bycname_cname_forpinyins"; //缓存名称
        $result=array();
        if(cache()->get($cachename)  ) {
            $result=unserialize(cache()->get($cachename));//直接从缓存中读取
        }
        else {
            $result=self::Area_GetCname_forpinyins();//如果没有缓存，则调用函数生成并且缓存
        }
        return $result[$id];
    }
    //根据类别id获取到拼音字母，比如输入11 获取到的是hyjt
    public static function oask_class_getpaixu($id) {
        $cachename="Area_caches_byclass_class_forpinyins";
        $result=array();
        if(cache()->get($cachename)) {
            $result=unserialize(cache()->get($cachename));//直接从缓存中读取
        }
        else {
            $result=self::OaskClass_GetClass_forpinyin();//如果没有缓存，则调用函数生成并且缓存
        }
        // print_r($result);
        return $result[$id];
    }
    //根据类别id,获取到咨询类别拼音，通常用于咨询列表页伪静态
    public static function OaskClass_GetClass_forpinyin() {
        $cachename="Area_caches_byclass_class_forpinyins"; //缓存名称
        //缓存数据,如果缓存存在就从缓存中取
        $area_c_arr=array();
        if(cache()->get($cachename)) {
            //读取缓存
            $area_c_arr=unserialize(cache()->get($cachename));
        }else {
            //从数据库中查询
            //建立管理数组
            $Area_class=OaskClass::model()->findall(array('select'=>'ID,dir'));
            foreach($Area_class as $k=>$v) {
                $area_c_arr[$v->ID]=$v->dir;
            }
            cache()->set($cachename,serialize($area_c_arr),3600*24*7); //缓存一周
        }
        return $area_c_arr  ; //返回关联数组_类别
    }
    //根据类别id,获取到咨询类别
    public static function OaskClass_GetClass() {
        $cachename="Area_caches_byclass_class"; //缓存名称
        //缓存数据,如果缓存存在就从缓存中取
        $area_c_arr=array();
        if(cache()->get($cachename)) {
            //读取缓存
            $area_c_arr=unserialize(cache()->get($cachename));
        }else {
            //从数据库中查询
            //建立管理数组
            $Area_class=OaskClass::model()->findall(array('select'=>'ID,topic'));
            foreach($Area_class as $k=>$v) {
                $area_c_arr[$v->ID]=$v->topic;
            }
            cache()->set($cachename,serialize($area_c_arr),3600*24*7); //缓存一周
        }
        return $area_c_arr; //返回关联数组_类别
    }
    //获取咨询路径
    public static function Question_GetUrl($qid) {
        return "http://ask.9ask.cn/question/2011/$qid.html";
    }
    //字符串截取类，默认编码是utf8
    public static function  str_cut($string, $length, $dot = '...', $charset='utf-8') {
        $strlen = strlen($string);
        if($strlen <= $length) return $string;
        $string = str_replace(array('&nbsp;', '&amp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;'), array(' ', '&', '"', "'", '“', '”', '—', '<', '>', '·', '…'), $string);
        $strcut = '';
        if(strtolower($charset) == 'utf-8') {
            $n = $tn = $noc = 0;
            while($n < $strlen) {
                $t = ord($string[$n]);
                if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
                    $tn = 1;
                    $n++;
                    $noc++;
                } elseif(194 <= $t && $t <= 223) {
                    $tn = 2;
                    $n += 2;
                    $noc += 2;
                } elseif(224 <= $t && $t < 239) {
                    $tn = 3;
                    $n += 3;
                    $noc += 2;
                } elseif(240 <= $t && $t <= 247) {
                    $tn = 4;
                    $n += 4;
                    $noc += 2;
                } elseif(248 <= $t && $t <= 251) {
                    $tn = 5;
                    $n += 5;
                    $noc += 2;
                } elseif($t == 252 || $t == 253) {
                    $tn = 6;
                    $n += 6;
                    $noc += 2;
                } else {
                    $n++;
                }
                if($noc >= $length) break;
            }
            if($noc > $length) $n -= $tn;
            $strcut = substr($string, 0, $n);
        }
        else {
            $dotlen = strlen($dot);
            $maxi = $length - $dotlen - 1;
            for($i = 0; $i < $maxi; $i++) {
                $strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
            }
        }
        $strcut = str_replace(array('&', '"', "'", '<', '>'), array('&amp;', '&quot;', '&#039;', '&lt;', '&gt;'), $strcut);
        return $strcut;
    }

    /**
     * 生成随机用户
     * Enter description here ...
     */
    public static function makeRandUser($pnameid,$cnameid, $email, $phone,$qq,$xnameid) {

        $user = new OaskUser();

        $name = 'ask'.date('ymdHis').rand(0, 9);
        $user->name = $name;
        $pwd = 'ask'.rand(111111,999999);
        $user->pwd = AskTool::MD5($pwd);
        $user->sex = 0;
        $user->question = '我的宠物名字(公开咨询)？';
        $user->answer = '自动注册';
        //added by weihan  -->
        $user->TrueName = $name;
        $user->mobile = $phone;
        $user->email = $email;
        $user->lpname = $pwd;
        //added by weihan  <--
        $user->LastIP = AskTool::getClientIp();
        $user->jifen = 20;
        $user->pnameid = $pnameid ? $pnameid :5;
        $user->cnameid = $cnameid ? $cnameid :86;
        $user->xnameid = $xnameid ? $xnameid:0;
        $user->qq=$qq? $qq:0;
        $user->asknum = $user->replynum = $user->helpnum = 0;
        $user->RegTime = $user->time = $user->logintime = date('Y-m-d H:i:s');       
        $user->save();
        return array('name'=>$name,'pwd'=>$pwd);

    }
    public static function Qustion_GetUrl($id) {
        return "http://ask.9ask.cn/question/2011/$id.html";

    }
    public static function updateRandUser($uid,$name=null,$pwd=null) {
        $user = OaskUser::model()->findByPk($uid);

        if(!$name || !$pwd) return 0;

        $user->name = $name;
        $user->pwd = AskTool::MD5($pwd);
        $user->save(true,array('name','pwd'));
        //todo 更新用户发的所有咨询

        echo CHtml::errorSummary($user);
        return 1;

    }
    //采用递归的形式，根据路径，创建文件夹。
    public static function createFolder($path) {
        if (!file_exists($path)) {
            AskTool::createFolder(dirname($path));
            mkdir($path, 0777);
        }
    }

    /**
     * 处理ip，写入cookie
     * Enter description here ...
     * @param unknown_type $event
     */
    public static function appBeginRequest(CEvent $event) {

        if(!isset($_COOKIE['cnameid'])) {
            $ipdata = new IPData();
            $ip = AskTool::getClientIp();
            //$ip = '222.173.27.114';
            $pos = AskTool::getCustomerPosition($ip);
            if (empty ($pos['cnameid'])) {
                $pos['cnameid']=86;
                $pos['name']='济南';
            }
            setcookie('cnameid', $pos['cnameid'], time() + 3600 * 24 * 30,'/');
            setcookie('name', $pos['name'], time() + 3600 * 24 * 30,'/');

        }
        //设置省份id,省份到cooie之中
        if(!isset($_COOKIE['pnameid']) && isset($_COOKIE['cnameid'])) {
            $citys=AskCityCname::model()->with('province')->findByPk($_COOKIE['cnameid']);
            setcookie('pnameid',$citys->pnameID, time() + 3600 * 24 * 30,'/');
            setcookie('pname', $citys->province->pname, time() + 3600 * 24 * 30,'/');
            // echo $citys->province->pname;
        }
    }

    public static  function getCustomerPosition($ip = '') {
        $ipdata = new IPData();
        $isCity=false;
        $pos = $ipdata->get_ip_position($ip);
        if ($pos['isCity']) {
            $city = $pos['name'];
            $sql="cname  = '$city'";
            $cityArr = AskCityCname::model()->find(array('condition'=>$sql));
            //print_r($cityArr);
            if (empty($cityArr)) {
                $pos=array('isCity'=>false,'name'=>'北京','pnameid'=>1,'searchstr'=>'pnameid=1'); // 北京
            } else {
                $pos['cnameid'] = $cityArr->cnameID;
                $pos['searchstr'] = 'cnameid='.$cityArr->cnameID;
            }
        } else {
            if(!empty ($pos->name)) {
                $sql="pname ='$pos->name'";
                $provArr = AskCityPname::model()->find(array('condition'=>$sql));
                if (empty($provArr)) {
                    $pos=array('isCity'=>false,'name'=>'北京','pnameid'=>1,'searchstr'=>'pnameid=1'); // 北京
                } else {
                    $pos['pnameid'] = $provArr->pNameID;
                    $pos['searchstr'] = 'pnameid='.$provArr->pNameID;
                }
            }
        }
        return $pos;
    }

    /**
     * 返回周积分排行数据，以回复数量算。
     * 周泉 2011-03-30
     * @param $row    读取数据条数
     * @param $cityid 城市编码，也可以是省份编码
     * @param $isCity 默认$cityid是城市，false时是省份
     */
    public static function getWeekScoreLawyers($row, $cityid, $isCity=true) {
        $num=0;
        $result;
        if($isCity) $num=1;
        $cachename='weekscore_'.$row.$cityid.$num;
        if ($isCity) {
            $result=paihangbangclass::get($row,0,$cityid,0,1);
        } else {
            $result=paihangbangclass::get($row,$cityid,0,0,1);
        }
        return $result;
    }

    /**
     * 返回月积分排行数据，以回复数量算。
     * 周泉 2011-03-30
     * @param $row    读取数据条数
     * @param $cityid 城市编码，也可以是省份编码
     * @param $isCity 默认$cityid是城市，false时是省份
     */
    public static function getMonthScoreLawyers($row, $cityid, $isCity=true) {
        $num=0;
        $result;
        $ksdate=date("Y-m-d",mktime(0, 0 , 0,date("m"),date("d")-date("w")-130,date("Y")));
        $enddate=date("Y-m-d",mktime(0, 0 , 0,date("m"),date("d")-date("w")-100,date("Y")));
        if($isCity) $num=1;
        $cachename='weekscore_'.$row.$cityid.$num;
        if ($isCity) {
            $result=paihangbangclass::get($row,0,$cityid,0,1,$ksdate,$enddate);
        } else {
            $result=paihangbangclass::get($row,$cityid,0,0,1,$ksdate,$enddate);
        }
        return $result;
    }

    /**
     * 得到版主信息
     * 周泉 2011-03-30
     * @param $categoryid 专长编号
     */
    public static function getWebmaster($categoryid,$pnameid=0,$cnameid=0) {
        $cachename="wm_".$categoryid;
        if(cache()->get($cachename)    ) {
            $master=unserialize(cache()->get($cachename));
        }
        else {
            if(!empty ($categoryid)) {
                $where='classid='.$categoryid . " and t.pnameid=0 and t.cnameid=0";
            }
            else {
                //如果是地区版主
                if(!empty ($cnameid)) {
                    $where="cnameid=$cnameid and classid=0";//省份版主
                }
                else {
                    $where="t.pnameid=$pnameid and and classid=0";//城市版主
                }
            }
            //如果城市和专长都不为空
            if(!empty ($cnameid) && !empty ($categoryid) ) $where="t.cnameid=$cnameid and t.classid=$categoryid";
            $master = OaskWebmaster::model()->with(array('user'=>array('select'=>'ID,name,TrueName,IsStar,mobile,pnameid,cnameid,userpic,jifen')))->find(array('condition'=>$where,'order'=>'t.id desc','limit'=>1));
            cache()->set($cachename,serialize($master),3600*24*4);//缓存4天
        }

        //$master = OaskWebmaster::model()->findAll();
        return $master;
    }

    /**
     * 得到版主近期回复的问题列表
     * 周泉 2011-04-1
     * @param $username 用户名 oask_user.name
     * @param $row      问题数
     */
    public static function getWebmasterAnswer($username,$row) {
        $cachename="wm_reply_".$username. '_' .$row;
        if(cache()->get($cachename) ) {
            $askList=unserialize(cache()->get($cachename));
        }
        else {

            $crit_db = new CDbCriteria();
            $crit_db->limit = $row;
            $crit_db->condition = "replyer='".$username."'";
            $askList = OaskReply::model()->with('question')->findAll($crit_db);
            cache()->set($cachename,serialize($askList),3600*24);//缓存1天
        }
        return $askList;
    }
    /**
     * 得到用户的好评数量
     * 周泉 2011-04-1
     * @param $username 用户名 oask_user.name
     * @param $row      问题数
     */
    public static function getWebmasterComment($username,$row) {
        $cachename="wm_comment_".$username .'_' .$row;
        if(cache()->get($cachename) ) {
            $askList=unserialize(cache()->get($cachename));
        }
        else {

            $crit_db = new CDbCriteria();
            $crit_db->select='comment,adddate';
            $crit_db->limit = $row;
            $crit_db->condition = "username='".$username."'";
            $askList = OaskComment::model()->findAll($crit_db);
            cache()->set($cachename,serialize($askList),3600*24);//缓存1天
        }
        return $askList;
    }
    /**
     * 根据标题得到自动匹配答案库的编号
     * 周泉 2011-04-2
     * @param $title 文章标题
     */
    public static function getDefaultAnswer($title) {
        $keywordsArr = array();
        if (cache()->get('zixun_keywords_arr')) {
            $keywordsArr = unserialize(cache()->get('zixun_keywords_arr'));
        } else {
            $keywordsArr = OaskKnowledge::model()->findAll();
            cache()->set('zixun_keywords_arr',serialize($keywordsArr),36000);
        }
        foreach ($keywordsArr as $k=>$v) {
            if (strpos($title, $v->key)===TRUE) {
                return $v;
            }
        }
        return ;
    }
    /*
     * 随机获取分类
    */
    public static function randomFenlei() {
        $fenlei = array(
                0 => array('3', "11", "婚姻家庭"),
                1 => array('7', "35", "刑事辩护"),
                2 => array('4', "25", "知识产权"),
                3 => array('3', "15", "合同纠纷"),
                4 => array('3', "20", "债权债务"),
                5 => array('9', "51", "公司法务"),
                6 => array('3', "16", "劳动纠纷"),
                7 => array('4', "24", "房产律师"),
                8 => array('3', "21", "医疗纠纷"),
                9 => array('3', "17", "损害赔偿"),
                10 => array('3', "22", "交通事故"),
                11 => array('4', "23", "工程建筑")
        );
        $rand = mt_rand(0, 12);
        return $fenlei[$rand];
    }
    //获取到律师用户url
    public static function  GetLawyerurl($id,$name,$isstar) {
        if($isstar==2) //
        {
            return "http://www.9ask.cn/usersite/home/".$name . "/";
        }
        else {
            return "http://www.9ask.cn/souask/user/index.asp?id=".$id ;
        }
    }

    public static function  GetLawyeraskurl($id,$name,$isstar) {
        if($isstar==2) //
        {
            return "http://www.9ask.cn/usersite/home/".$name . "/ask.asp";
        }
        else {
            return "http://www.9ask.cn/souask/user/ask.asp?uid=".$id ;
        }
    }

    /**
     * 获取 您现在的位置
     *
     * @param int $fenleiID
     * @return 包含地址的面包屑导航
     */
    public static function getQuestionNav($fenleiID) {
        $cachename="Area_caches_byclass_class_all_" . $fenleiID; //缓存名称
        //缓存数据,如果缓存存在就从缓存中取
        $area_c_arr=array();
        if(!$area_c_arr = cache()->get($cachename)) {
            //从数据库中查询
            //建立管理数组
            $Area_class=OaskClass::model()->findall(array('order'=>'fatherID, paixu'));
            $vv = array('ID'=>3, 'fatherID'=>1, 'topic'=>'民事类');
            foreach($Area_class as $k=>$v) {
                $vv['ID'] = $v->ID;
                $vv['fatherID'] = $v->fatherID;
                $vv['topic'] = $v->topic;
                $area_c_arr[$v->ID]=$vv;
            }
            cache()->set($cachename,serialize($area_c_arr),3600*24*7); //缓存一周
        }else
            $area_c_arr = unserialize($area_c_arr);
        $str = '';
        $i = 0;	//防止死循环
        do {
            $str = " &gt; <a href='/souask/sort.asp?cid=$fenleiID'>{$area_c_arr[$fenleiID]['topic']}</a>" .$str;
            $fenleiID = $area_c_arr[$fenleiID]['fatherID'];
            $i ++ ;
        }while ($fenleiID != 0 && $i < 10);

        return $str;
    }
    //读取VIP用户的律法通年限
    public static function vip_years($vipstime) {
        $year = 1;
        if (!empty($vipstime)) {
            $times = time() - strtotime($vipstime);
            $year = floor($times / (60 * 60 * 24 * 360));
            $year < 1 && $year = 1;
        }
        return $year;
    }
    /**
     * 字符串安全过滤，去掉或者替换特殊字符
     *
     * @param string $str
     * @return string
     */
    public static function filterSpecialChars($str) {
        $str = str_replace("'", "‘", $str);	//单引号替换为中文的
        $str = str_replace(';', '', $str);	//去掉英文状态下的分号
        $str = strip_tags($str);	//去掉html标签
        return $str;
    }

    public static function QuestionState($jie) {
        if((int)$jie == 0) {
            return '解决中';
        }else if((int)$jie == 1) {
            return '已解决';
        }else {
            return'已过期';
        }
    }
    /**
     * 增加用户积分
     *
     * @param string $username
     * @param int $added
     */
    public static function addJifen($username, $added) {
        if (empty($username)) return ;
        OaskUser::model()->updateCounters(array('jifen'=>$added), array('condition'=>"name='$username'"));
    }
    /**
     * 更新回复数量
     *
     * @param $qid咨询的ID
     */
    public static function updateReplyNumbers($qid) {
        $qid = (int)$qid;
        if (empty($qid))return ;
        OaskQuestion::model()->updateCounters(array('replys'=>1), array('condition'=>"ID=$qid"));
    }
    /**
     * 更新查看次数
     *
     * @param int $qid
     */
    public static function updateViews($qid) {
        $qid = (int)$qid;
        if (empty($qid))return ;
        OaskQuestion::model()->updateCounters(array('views'=>1), array('condition'=>"ID=$qid"));
    }
    /**
     * 获取类别下的推荐专题
     *
     * @param string $fenleiName
     * @return TbZhuantiNew Model
     */
    public static function getZhuanti_keys($fenleiName) {
        if(!$fenleiName) return null;
        $cache_key = 'zhuanti_' . $fenleiName;
        if (!$zhuanti_keys = cache()->get($cache_key)) {
            //获取所有的
            $zhuanti_keys = Zhuanti::zhuanti_keys();
            $zhuanti_keys = $zhuanti_keys[$fenleiName];
            if($zhuanti_keys) {
                foreach ($zhuanti_keys as $v) {
                    $str .= "'$v',";
                }
                $str = rtrim($str, ',');
                if (strlen($str) < 2)return ;

                $zhuanti_keys = TbZhuantiNew::model()->findAllByAttributes(array(), array('condition'=>"title in ($str)", 'select'=>'title, mulu'));

                cache()->set($cache_key, $zhuanti_keys, 3600 * 24);
            }
        }
        return $zhuanti_keys;
    }
    /**
     * 根据分类id获取分类model
     *
     * @param int $fenleiid
     * @return OaskClass
     */
    public static function getOaskClass($fenleiid) {
        $cache_key = 'oaskClass_' . $fenleiid;
        if (!$oaskClass = cache()->get($cache_key)) {
            $oaskClass = OaskClass::model()->findByPk($fenleiid);
            cache()->set($cache_key, $oaskClass);
        }
        return $oaskClass;
    }
    /**
     * 获取分类相关专题
     *
     * @param int $fenleiid
     * @param int $nums
     * @return TbZhuantiNew
     */
    public static function getZhuanti($fenleiid, $nums) {
        $cache_key = "zhuanti_$fenleiid_$nums";
        if (!$zhuanti = cache()->get($cache_key)) {
            $zhuanti = TbZhuantiNew::model()->findAllByAttributes(array('classid'=>$fenleiid), array('select'=>'title, mulu', 'order'=>'id desc', 'limit'=>$nums));
            cache()->set($cache_key, $zhuanti, 3600 * 24);
        }
        return $zhuanti;
    }
    //统计律师，根据律所id,并增加缓存功能，本函数不适合大规模批量使用
    public static function getLvsuoById($workid) {
        $cache_key = "lvsuo_name_" .$workid;
        if (!$lvsuo = cache()->get($cache_key)) {
            $lvsuo = AskWork::model()->findByPk($workid, array('select'=>'WorkName'));
            cache()->set($cache_key, $lvsuo, 3600 * 24);
        }
        return $lvsuo['WorkName'];
    }
    /*
     * 生成上传的文件名
    */
    public static function makeUploadFileName($extension) {
        return 'cert/'.date('YmdHis_', $_SERVER['REQUEST_TIME'])
                . uniqid()
                . ($extension ? '.' . $extension : '');
    }

    /*
     * 数字转成流字
    */
    public static function num2char($num) {
        //$arr = array('零','壹','贰','叁','肆','伍','陆','柒','捌','玖');
        $arr = array('零','一','二','三','四','五','六','七','八','九');
        if($num < 10) {
            return $arr[$num];
        }else {
            $shi = (int)($num/10);
            $ge  = $num % 10;
            return $arr[$shi].'拾'.$arr[$ge];
        }

    }
}