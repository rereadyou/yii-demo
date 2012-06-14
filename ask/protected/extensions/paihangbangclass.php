<?php 
/**
 * 排行榜核心类
 * 为了性能尽可能把的把所有方法都做成静态方法
 * 默认所有数据自访问起缓存3天
 * @author ndw
 */
class paihangbangclass {
    private static $weekbeginday;//上周开始日期
    private static $weekendday;//统计结束日期
    private static $condition; //查询条件
    private static $area_citys;
    private static $area_provs;
    private static $oask_classes;
    private static $pnameid;//省份id
    private static $cnameid;//城市id
    //初始化函数，主要用于设置日期等选项
    private static  function init($ksdate,$jsdate) {
        if (empty ($ksdate) || empty ($jsdate)) {
            // self::$weekbeginday=date("Y-m-d",mktime(0, 0 , 0,date("m"),date("d")-date("w")-6,date("Y")));
            self::$weekbeginday=date("Y-m-d",mktime(0, 0 , 0,date("m"),date("d")-date("w")-250,date("Y")));
            self::$weekendday= date("Y-m-d",mktime(23,59,59,date("m"),date("d")-date("w")-220,date("Y")));
        }
        else {
            self::$weekbeginday=$ksdate;
            self::$weekendday=$jsdate;
        }
        self::$area_provs=AskTool::Area_GetPname();
        self::$area_citys=AskTool::Area_GetCname();
        self::$oask_classes=AskTool::OaskClass_GetClass();
    }
    //辅助函数，根据用户名获取一个律师的回复数量
    public static function replynum_count($name,$ksdate=0,$jsdate=0) {
        $cachename="replynum_count_" . $name ."-" .$ksdate . "-" . $jsdate;
        $countnum=0;
        if(cache()->get($cachename)  ) {
            $countnum=cache()->get($cachename);
        }
        else {
            self::init($ksdate, $jsdate);
            $countnum=OaskReply::model()->count(array('condition'=>"replyer='$name' and replytime between '" . self::$weekbeginday ." ' and '". self::$weekendday. "' "));//统计回复数量
            cache()->set($cachename,$countnum,3600*24*3);
        }

        return $countnum;
    }
    //省份专长+地区
    public static function get($nums,$pnameid,$cnameid,$fenleiid,$typeid=1,$ksdate=0,$jsdate=0) {
        $cachename="ph_".$pnameid . '_' .$cnameid . '_'. $fenleiid .'_'  .'_'. $typeid .'_'.$nums .'_'.$ksdate .'_'.$jsdate ;//启用缓存
        $aretype="";
        if(cache()->get($cachename)     ) {
            $lvshi=unserialize(cache()->get($cachename));
        }
        else {
            self::init($ksdate, $jsdate);
            
            if($cnameid>0) {
                $aretype=" and u.cnameid=$cnameid";//城市
            }
            else {
                if($pnameid>0) {
                    $aretype=" and u.pnameid=$pnameid"; //省份
                }
            }
           if(!empty($fenleiid)) $aretype .="  and q.fenleiid=$fenleiid";//类别
            $ordertype="count(*)";
            // echo $typeid;
            if($typeid==2) {
                $ordertype="count(*)";
                $aretype.=" and best=1  ";
                // echo 'test' . $aretype;
            }
            else {
                if($typeid==3) {
                    $ordertype="sum(flower)";
                }
            }

            $lvshi=array();
            //$sql=" select top $nums  replyer,count(*) as num from oask_reply  where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."'     group by replyer  order by COUNT(*) desc ";
            $sql="select top $nums   replyer,$ordertype as num from oask_reply r left join oask_question q on r.qid=q.id left join oask_user u on r.replyer=u.name where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."' and u.userclassid=1  ". $aretype ."    group by replyer order by $ordertype desc";
            $ph=self::select($sql);//获取到排行数据
            //echo $sql;
            $icount=0;
            $tmeplslist='';//中间变量，获取到律师信息
            while(($row=$ph->read())!=false) { //循环读取数据
                //第一层循环，只能取得用户名信息
                $lvshi[$icount]['replyer']=$row['replyer'];//回复者
                $lvshi[$icount]['replynum']=$row['num'];//总的条数
                $tmeplslist.="'" .$row['replyer'] ."',";
                $icount++;
            }
            if($icount==0) {
                return NULL;
            }
            else {//如果找到数据
                $tmeplslist.="'0sdfdfds'";
                //开始获取到律师的详细信息
                $icount=0;
                $ph=self::select("select ID,name,TrueName,IsStar,pnameid,cnameid,jifen,Specaility,mobile,userclassid from oask_user where name in ($tmeplslist)");
               while(($row=$ph->read())!=false) { //循环读取数据
                    if($row['userclassid']==1) {
                        $lsurl=AskTool::GetLawyerurl($row['ID'], $row['name'],$row['IsStar']);
                        $lsaskurl=AskTool::GetLawyeraskurl($row['ID'], $row['name'],$row['IsStar']);
                    }
                    $lvshi[$icount]['truename']=$row['TrueName'];
                    $lvshi[$icount]['pname']=self::$area_provs[$row['pnameid']];
                    $lvshi[$icount]['cname']=self::$area_citys[$row['cnameid']];
                    $lvshi[$icount]['jifen']=$row['jifen'];
                    $lvshi[$icount]['mobile']=$row['mobile'];
                    $lvshi[$icount]['spec']=self::getspec($row['Specaility']);
                    $lvshi[$icount]['url']=$lsurl;
                    $lvshi[$icount]['askme']=$lsaskurl;
                    $icount++;
                }
            }
            cache()->set($cachename,serialize($lvshi),3600*24*3);//缓存3天
        }
        return $lvshi;
    }
    //专长好评排行榜
    public static function class_usercomment($fenleiid=11,$nums,$ksdate=0,$jsdate=0) {
        $cachename="class_usercomment".$fenleiid . '_' . $nums;//启用缓存
        $lvshi=array();
        if(cache()->get($cachename) ) {
            $lvshi=unserialize(cache()->get($cachename));
        }
        else {
            self::init($ksdate, $jsdate);
            //$sql=" select top $nums  replyer,count(*) as num from oask_reply  where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."'     group by replyer  order by COUNT(*) desc ";

            $sql="select top $nums   replyer,sum(flower) as num from oask_reply r left join oask_question q on r.qid=q.id left join oask_user u on r.replyer=u.name where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."' and u.userclassid=1 and q.fenleiid=". $fenleiid ."   group by replyer order by sum(flower) desc";
            $ph=self::select($sql);//获取到排行数据
            $icount=0;
            $tmeplslist='';//中间变量，获取到律师信息
            while(($row=$ph->read())!=false) { //循环读取数据
                //第一层循环，只能取得用户名信息
                $lvshi[$icount]['replyer']=$row['replyer'];//回复者
                $lvshi[$icount]['replynum']=$row['num'];//总的条数
                $tmeplslist.="'" .$row['replyer'] ."',";
                $icount++;
            }
            if($icount==0) {
                return NULL;
            }
            else {//如果找到数据
                $tmeplslist.="'0sdfdfds'";
                //开始获取到律师的详细信息
                $icount=0;
                $ph=self::select("select ID,name,TrueName,IsStar,pnameid,cnameid,jifen,Specaility,mobile,userclassid from oask_user where name in ($tmeplslist)");
                while(($row=$ph->read())!=false) { //循环读取数据
                    if($row['userclassid']==1) {
                        $lsurl=AskTool::GetLawyerurl($row['ID'], $row['name'],$row['IsStar']);
                        $lsaskurl=AskTool::GetLawyeraskurl($row['ID'], $row['name'],$row['IsStar']);
                    }
                    $lvshi[$icount]['truename']=$row['TrueName'];
                    $lvshi[$icount]['pname']=self::$area_provs[$row['pnameid']];
                    $lvshi[$icount]['cname']=self::$area_citys[$row['cnameid']];
                    $lvshi[$icount]['jifen']=$row['jifen'];
                    $lvshi[$icount]['mobile']=$row['mobile'];
                    $lvshi[$icount]['spec']=self::getspec($row['Specaility']);
                    $lvshi[$icount]['url']=$lsurl;
                    $lvshi[$icount]['askme']=$lsaskurl;
                    // echo $row['TrueName'],'<br>';
                    $icount++;
                }

            }
            cache()->set($cachename,serialize($lvshi),3600*24*3);//缓存3天
        }
        return $lvshi;
    }
    //专长最佳答案采纳排行
    public static function class_reply_best($fenleiid=11,$nums,$ksdate=0,$jsdate=0) {
        $cachename="class_replynum".$fenleiid. '_' . $nums;//启用缓存
        $lvshi=array();
        if(cache()->get($cachename)  ) {
            $lvshi=unserialize(cache()->get($cachename));
        }
        else {
            self::init($ksdate, $jsdate);
            //$sql=" select top $nums  replyer,count(*) as num from oask_reply  where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."'     group by replyer  order by COUNT(*) desc ";
            $sql="select top $nums   replyer,count(*) as num from oask_reply r left join oask_question q on r.qid=q.id left join oask_user u on r.replyer=u.name where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."' and best =1 and u.userclassid=1 and q.fenleiid=". $fenleiid ."   group by replyer order by count(*) desc";
            if($fenleiid<11)
                {
                $sql="select top $nums   replyer,count(*) as num from oask_reply r left join oask_question q on r.qid=q.id left join oask_user u on r.replyer=u.name where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."' and best =1 and u.userclassid=1 and q.fatherID=". $fenleiid ."   group by replyer order by count(*) desc";
                }
            $ph=self::select($sql);//获取到排行数据
            $icount=0;
            $tmeplslist='';//中间变量，获取到律师信息
            while(($row=$ph->read())!=false) { //循环读取数据
                //第一层循环，只能取得用户名信息
                $lvshi[$icount]['replyer']=$row['replyer'];//回复者
                $lvshi[$icount]['replynum']=$row['num'];//总的条数
                $tmeplslist.="'" .$row['replyer'] ."',";
                $icount++;
            }
            if($icount==0) {
                return NULL;
            }
            else {//如果找到数据
                $tmeplslist.="'0sdfdfds'";
                //开始获取到律师的详细信息
                $icount=0;
                $ph=self::select("select ID,name,TrueName,IsStar,pnameid,cnameid,jifen,Specaility,mobile,userclassid from oask_user where name in ($tmeplslist)");
                while(($row=$ph->read())!=false) { //循环读取数据
                    if($row['userclassid']==1) {
                        $lsurl=AskTool::GetLawyerurl($row['ID'], $row['name'],$row['IsStar']);
                        $lsaskurl=AskTool::GetLawyeraskurl($row['ID'], $row['name'],$row['IsStar']);
                    }
                    $lvshi[$icount]['truename']=$row['TrueName'];
                    $lvshi[$icount]['pname']=self::$area_provs[$row['pnameid']];
                    $lvshi[$icount]['cname']=self::$area_citys[$row['cnameid']];
                    $lvshi[$icount]['jifen']=$row['jifen'];
                    $lvshi[$icount]['mobile']=$row['mobile'];
                    $lvshi[$icount]['spec']=self::getspec($row['Specaility']);
                    $lvshi[$icount]['url']=$lsurl;
                    $lvshi[$icount]['askme']=$lsaskurl;
                    // echo $row['TrueName'],'<br>';
                    $icount++;
                }

            }
            cache()->set($cachename,serialize($lvshi),3600*24*3);//缓存3天
        }
        return $lvshi;

    }
    //专长回复排行
    public static function class_replynum($fenleiid=11,$nums,$ksdate=0,$jsdate=0) {
        $cachename="class_replynum".$fenleiid. '_' . $nums;//启用缓存
        $lvshi=array();
        if(cache()->get($cachename) ) {
            $lvshi=unserialize(cache()->get($cachename));
        }
        else {
            self::init($ksdate, $jsdate);
            //$sql=" select top $nums  replyer,count(*) as num from oask_reply  where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."'     group by replyer  order by COUNT(*) desc ";
            $sql="select top $nums   replyer,count(*) as num from oask_reply r left join oask_question q on r.qid=q.id left join oask_user u on r.replyer=u.name where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."' and u.userclassid=1 and q.fenleiid=". $fenleiid ."   group by replyer order by count(*) desc";

            $ph=self::select($sql);//获取到排行数据
            $icount=0;
            $tmeplslist='';//中间变量，获取到律师信息
            while(($row=$ph->read())!=false) { //循环读取数据
                //第一层循环，只能取得用户名信息
                $lvshi[$icount]['replyer']=$row['replyer'];//回复者
                $lvshi[$icount]['replynum']=$row['num'];//总的条数
                $tmeplslist.="'" .$row['replyer'] ."',";
                $icount++;
            }
            if($icount==0) {
                return NULL;
            }
            else {//如果找到数据
                $tmeplslist.="'0sdfdfds'";
                //开始获取到律师的详细信息
                $icount=0;
                $ph=self::select("select ID,name,TrueName,IsStar,pnameid,cnameid,jifen,Specaility,mobile,userclassid from oask_user where name in ($tmeplslist)");
                while(($row=$ph->read())!=false) { //循环读取数据
                    if($row['userclassid']==1) {
                        $lsurl=AskTool::GetLawyerurl($row['ID'], $row['name'],$row['IsStar']);
                        $lsaskurl=AskTool::GetLawyeraskurl($row['ID'], $row['name'],$row['IsStar']);
                    }
                    $lvshi[$icount]['truename']=$row['TrueName'];
                    $lvshi[$icount]['pname']=self::$area_provs[$row['pnameid']];
                    $lvshi[$icount]['cname']=self::$area_citys[$row['cnameid']];
                    $lvshi[$icount]['jifen']=$row['jifen'];
                    $lvshi[$icount]['mobile']=$row['mobile'];
                    $lvshi[$icount]['spec']=self::getspec($row['Specaility']);
                    $lvshi[$icount]['url']=$lsurl;
                    $lvshi[$icount]['askme']=$lsaskurl;
                    // echo $row['TrueName'],'<br>';
                    $icount++;
                }

            }
            cache()->set($cachename,serialize($lvshi),3600*24*3);//缓存3天
        }
        return $lvshi;
    }
    //按城市好评最多的律师
    public static function Area_usercomment_city($cnameid=0,$nums,$ksdate=0,$jsdate=0) {
        //如果什么都不输入，那么就获取到ip所在省份
        if(empty ($pnameid)) {
            self::$cnameid=$_COOKIE['cnameid'];
        }
        else {
            self::$cnameid=$cnameid;
        }
        if(empty(self::$cnameid)) {
            exit('error');//参数
        }
        //获取到回复数量排行
        $cachename="Area_usercomment_city" . self::$cnameid . '_' . $nums;//启用缓存
        $lvshi=array();
        if(cache()->get($cachename)) {
            $lvshi=unserialize(cache()->get($cachename));
        }
        else {
            self::init($ksdate, $jsdate);
            //$sql=" select top $nums  replyer,count(*) as num from oask_reply  where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."'     group by replyer  order by COUNT(*) desc ";
            $sql="select top $nums   replyer,sum(flower) as num from oask_reply r left join oask_user u on u.name=r.replyer where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."' and u.userclassid=1 and u.cnameid=" . self::$cnameid  ."  group by replyer order by sum(flower) desc";
            $ph=self::select($sql);//获取到排行数据
            $icount=0;
            $tmeplslist='';//中间变量，获取到律师信息
            while(($row=$ph->read())!=false) { //循环读取数据
                //第一层循环，只能取得用户名信息
                $lvshi[$icount]['replyer']=$row['replyer'];//回复者
                $lvshi[$icount]['replynum']=$row['num'];//总的条数
                $tmeplslist.="'" .$row['replyer'] ."',";
                $icount++;
            }
            if($icount==0) {
                return NULL;
            }
            else {//如果找到数据
                $tmeplslist.="'0sdfdfds'";
                //开始获取到律师的详细信息
                $icount=0;
                $ph=self::select("select ID,name,TrueName,IsStar,pnameid,cnameid,jifen,Specaility,mobile,userclassid from oask_user where name in ($tmeplslist)");
                while(($row=$ph->read())!=false) { //循环读取数据
                    if($row['userclassid']==1) {
                        $lsurl=AskTool::GetLawyerurl($row['ID'], $row['name'],$row['IsStar']);
                        $lsaskurl=AskTool::GetLawyeraskurl($row['ID'], $row['name'],$row['IsStar']);
                    }
                    $lvshi[$icount]['truename']=$row['TrueName'];
                    $lvshi[$icount]['pname']=$row['pnameid'];
                    $lvshi[$icount]['cname']=$row['cnameid'];
                    $lvshi[$icount]['jifen']=$row['jifen'];
                    $lvshi[$icount]['mobile']=$row['mobile'];
                    $lvshi[$icount]['spec']=self::getspec($row['Specaility']);
                    $lvshi[$icount]['url']=$lsurl;
                    $lvshi[$icount]['askme']=$lsaskurl;
                    //echo $row['TrueName'],'<br>';
                    $icount++;
                }

            }
            cache()->set($cachename,serialize($lvshi),3600*24*3);//缓存3天
        }
        return $lvshi;
    }
    //按省份好评最多的律师
    public static function Area_usercomment_prov($pnameid,$nums,$ksdate=0,$jsdate=0) {
        //如果什么都不输入，那么就获取到ip所在省份
        if(empty ($pnameid)) {
            self::$pnameid=$_COOKIE['pnameid'];
        }
        else {
            self::$pnameid=$pnameid;
        }
        if(empty(self::$pnameid)) {
            exit('error');//参数
        }
        //获取到回复数量排行
        $cachename="Area_usercomment_prov" . self::$pnameid . '_' . $nums;//启用缓存
        $lvshi=array();
        if(cache()->get($cachename)) {
            $lvshi=unserialize(cache()->get($cachename));
        }
        else {
            self::init($ksdate, $jsdate);
            //$sql=" select top $nums  replyer,count(*) as num from oask_reply  where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."'     group by replyer  order by COUNT(*) desc ";
            $sql="select top $nums   replyer,sum(flower) as num from oask_reply r left join oask_user u on u.name=r.replyer where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."' and u.userclassid=1 and u.pnameid=" . self::$pnameid  ."  group by replyer order by sum(flower) desc";
            $ph=self::select($sql);//获取到排行数据
            $icount=0;
            $tmeplslist='';//中间变量，获取到律师信息
            while(($row=$ph->read())!=false) { //循环读取数据
                //第一层循环，只能取得用户名信息
                $lvshi[$icount]['replyer']=$row['replyer'];//回复者
                $lvshi[$icount]['replynum']=$row['num'];//总的条数
                $tmeplslist.="'" .$row['replyer'] ."',";
                $icount++;
            }
            if($icount==0) {
                return NULL;
            }
            else {//如果找到数据
                $tmeplslist.="'0sdfdfds'";
                //开始获取到律师的详细信息
                $icount=0;
                $ph=self::select("select ID,name,TrueName,IsStar,pnameid,cnameid,jifen,Specaility,mobile,userclassid from oask_user where name in ($tmeplslist)");
                while(($row=$ph->read())!=false) { //循环读取数据
                    if($row['userclassid']==1) {
                        $lsurl=AskTool::GetLawyerurl($row['ID'], $row['name'],$row['IsStar']);
                        $lsaskurl=AskTool::GetLawyeraskurl($row['ID'], $row['name'],$row['IsStar']);
                    }
                    $lvshi[$icount]['truename']=$row['TrueName'];
                    $lvshi[$icount]['pname']=$row['pnameid'];
                    $lvshi[$icount]['cname']=$row['cnameid'];
                    $lvshi[$icount]['jifen']=$row['jifen'];
                    $lvshi[$icount]['mobile']=$row['mobile'];
                    $lvshi[$icount]['spec']=self::getspec($row['Specaility']);
                    $lvshi[$icount]['url']=$lsurl;
                    $lvshi[$icount]['askme']=$lsaskurl;
                    // echo $row['TrueName'],'<br>';
                    $icount++;
                }

            }
            cache()->set($cachename,serialize($lvshi),3600*24*3);//缓存3天
        }
        return $lvshi;
    }
    //城市最佳答案最多
    public static  function Area_replynum_best_city($cnameid=0,$nums,$ksdate=0,$jsdate=0) {
        //如果什么都不输入，那么就获取到ip所在省份
        if(empty ($pnameid)) {
            self::$cnameid=$_COOKIE['cnameid'];
        }
        else {
            self::$cnameid=$cnameid;
        }
        if(empty(self::$cnameid)) {
            exit('error');//参数
        }
        //获取到回复数量排行
        $cachename="Area_replynum_best_city" . self::$cnameid . '_' . $nums;//启用缓存
        $lvshi=array();
        if(cache()->get($cachename)   ) {
            $lvshi=(cache()->get($cachename) );
        }
        else {
            self::init($ksdate, $jsdate);
            //$sql=" select top $nums  replyer,count(*) as num from oask_reply  where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."'     group by replyer  order by COUNT(*) desc ";
            $sql="select top $nums   replyer,count(*) as num from oask_reply r left join oask_user u on u.name=r.replyer where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."' and u.userclassid=1 and best=1 and  u.cnameid=" . self::$cnameid  ."  group by replyer order by count(*) desc";
            $ph=self::select($sql);//获取到排行数据
            $icount=0;
            $tmeplslist='';//中间变量，获取到律师信息
            while(($row=$ph->read())!=false) { //循环读取数据
                //第一层循环，只能取得用户名信息
                $lvshi[$icount]['replyer']=$row['replyer'];//回复者
                $lvshi[$icount]['replynum']=$row['num'];//总的条数
                $tmeplslist.="'" .$row['replyer'] ."',";
                $icount++;
            }
            if($icount==0) {
                return NULL;
            }
            else {//如果找到数据
                $tmeplslist.="'0sdfdfds'";
                //开始获取到律师的详细信息
                $icount=0;
                $ph=self::select("select ID,name,TrueName,IsStar,pnameid,cnameid,jifen,Specaility,mobile,userclassid,userpic from oask_user where name in ($tmeplslist)");
                while(($row=$ph->read())!=false) { //循环读取数据
                    if($row['userclassid']==1) {
                        $lsurl=AskTool::GetLawyerurl($row['ID'], $row['name'],$row['IsStar']);
                        $lsaskurl=AskTool::GetLawyeraskurl($row['ID'], $row['name'],$row['IsStar']);
                    }
                    $lvshi[$icount]['name']=$row['name'];
                    $lvshi[$icount]['truename']=$row['TrueName'];
                    $lvshi[$icount]['pname']=$row['pnameid'];
                    $lvshi[$icount]['cname']=$row['cnameid'];
                    $lvshi[$icount]['jifen']=$row['jifen'];
                    $lvshi[$icount]['mobile']=$row['mobile'];
                     $lvshi[$icount]['userpic']='http://img.9ask.cn' .$row['userpic'];
                    $lvshi[$icount]['spec']=self::getspec($row['Specaility']);
                    $lvshi[$icount]['url']=$lsurl;
                    $lvshi[$icount]['askme']=$lsaskurl;
                    // echo $row['TrueName'],'<br>';
                    $icount++;
                }
            }
            cache()->set($cachename,$lvshi,3600*24*3);//缓存3天
        }
        return $lvshi;
    }
    //省份最佳答案最多
    public static  function Area_replynum_best_prov($pnameid=0,$nums,$ksdate=0,$jsdate=0) {
        //如果什么都不输入，那么就获取到ip所在省份
        if(empty ($pnameid)) {
            self::$pnameid=$_COOKIE['pnameid'];
        }
        else {
            self::$pnameid=$pnameid;
        }
        if(empty(self::$pnameid)) {
            exit('error');//参数
        }
        //获取到回复数量排行
        $cachename="Area_replynum_best_prov" . self::$pnameid . '_' . $nums;//启用缓存
        $lvshi=array();
        if(cache()->get($cachename)) {
            $lvshi=unserialize(cache()->get($cachename));
        }
        else {
            self::init($ksdate, $jsdate);
            //$sql=" select top $nums  replyer,count(*) as num from oask_reply  where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."'     group by replyer  order by COUNT(*) desc ";
            $sql="select top $nums   replyer,count(*) as num from oask_reply r left join oask_user u on u.name=r.replyer where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."' and u.userclassid=1 and best=1 and  u.pnameid=" . self::$pnameid  ."  group by replyer order by count(*) desc";
            $ph=self::select($sql);//获取到排行数据
            $icount=0;
            $tmeplslist='';//中间变量，获取到律师信息
            while(($row=$ph->read())!=false) { //循环读取数据
                //第一层循环，只能取得用户名信息
                $lvshi[$icount]['replyer']=$row['replyer'];//回复者
                $lvshi[$icount]['replynum']=$row['num'];//总的条数
                $tmeplslist.="'" .$row['replyer'] ."',";
                $icount++;
            }
            if($icount==0) {
                return NULL;
            }
            else {//如果找到数据
                $tmeplslist.="'0sdfdfds'";
                //开始获取到律师的详细信息
                $icount=0;
                $ph=self::select("select ID,name,TrueName,IsStar,pnameid,cnameid,jifen,Specaility,mobile,userclassid,userpic from oask_user where name in ($tmeplslist)");
                while(($row=$ph->read())!=false) { //循环读取数据
                    if($row['userclassid']==1) {
                        $lsurl=AskTool::GetLawyerurl($row['ID'], $row['name'],$row['IsStar']);
                        $lsaskurl=AskTool::GetLawyeraskurl($row['ID'], $row['name'],$row['IsStar']);
                    }
                    $lvshi[$icount]['name']=$row['name'];
                    $lvshi[$icount]['truename']=$row['TrueName'];
                    $lvshi[$icount]['pname']=$row['pnameid'];
                    $lvshi[$icount]['cname']=$row['cnameid'];
                    $lvshi[$icount]['jifen']=$row['jifen'];
                    $lvshi[$icount]['mobile']=$row['mobile'];
                    $lvshi[$icount]['userpic']='http://img.9ask.cn' .$row['userpic'];
                    $lvshi[$icount]['spec']=self::getspec($row['Specaility']);
                    $lvshi[$icount]['url']=$lsurl;
                    $lvshi[$icount]['askme']=$lsaskurl;
                    // echo $row['TrueName'],'<br>';
                    $icount++;
                }

            }
            cache()->set($cachename,serialize($lvshi),3600*24*3);//缓存3天
        }
        return $lvshi;
    }
    //城市地区排行
    public static  function Area_replynum_city($cnameid=0,$nums,$ksdate=0,$jsdate=0) {
        //如果什么都不输入，那么就获取到ip所在省份
        if(empty ($pnameid)) {
            self::$cnameid=$_COOKIE['cnameid'];
        }
        else {
            self::$cameid=$cnameid;
        }
        if(empty(self::$cnameid)) {
            exit('error');//参数
        }
        //获取到回复数量排行
        $cachename="Area_replynum_city" . self::$cnameid . '_' . $nums;//启用缓存
        $lvshi=array();
        if(cache()->get($cachename) ) {
            $lvshi=unserialize(cache()->get($cachename));
        }
        else {
            self::init($ksdate, $jsdate);
            //$sql=" select top $nums  replyer,count(*) as num from oask_reply  where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."'     group by replyer  order by COUNT(*) desc ";
            $sql="select top $nums   replyer,count(*) as num from oask_reply r left join oask_user u on u.name=r.replyer where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."' and u.userclassid=1 and u.cnameid=" . self::$cnameid  ."  group by replyer order by count(*) desc";
            $ph=self::select($sql);//获取到排行数据
            $icount=0;
            $tmeplslist='';//中间变量，获取到律师信息
            while(($row=$ph->read())!=false) { //循环读取数据
                //第一层循环，只能取得用户名信息
                $lvshi[$icount]['replyer']=$row['replyer'];//回复者
                $lvshi[$icount]['replynum']=$row['num'];//总的条数
                $tmeplslist.="'" .$row['replyer'] ."',";
                $icount++;
            }
            if($icount==0) {
                return NULL;
            }
            else {//如果找到数据
                $tmeplslist.="'0sdfdfds'";
                //开始获取到律师的详细信息
                $icount=0;
                $ph=self::select("select ID,name,TrueName,IsStar,pnameid,cnameid,jifen,Specaility,mobile,userclassid,userpic from oask_user where name in ($tmeplslist)");
                while(($row=$ph->read())!=false) { //循环读取数据
                    if($row['userclassid']==1) {
                        $lsurl=AskTool::GetLawyerurl($row['ID'], $row['name'],$row['IsStar']);
                        $lsaskurl=AskTool::GetLawyeraskurl($row['ID'], $row['name'],$row['IsStar']);
                    }
                    $lvshi[$icount]['truename']=$row['TrueName'];
                    $lvshi[$icount]['pname']=$row['pnameid'];
                    $lvshi[$icount]['cname']=$row['cnameid'];
                    $lvshi[$icount]['jifen']=$row['jifen'];
                    $lvshi[$icount]['mobile']=$row['mobile'];
                    $lvshi[$icount]['spec']=self::getspec($row['Specaility']);
                    $lvshi[$icount]['userpic']='http://img.9ask.cn' . $row['mobile'];
                    $lvshi[$icount]['url']=$lsurl;
                    $lvshi[$icount]['askme']=$lsaskurl;
                    // echo $row['TrueName'],'<br>';
                    $icount++;
                }

            }
            cache()->set($cachename,serialize($lvshi),3600*24*3);//缓存3天
        }
        return $lvshi;
    }
    //省份地区排行
    public static  function Area_replynum_prov($pnameid=0,$nums,$ksdate=0,$jsdate=0) {
        //如果什么都不输入，那么就获取到ip所在省份
        if(empty ($pnameid)) {
            self::$pnameid=$_COOKIE['pnameid'];
        }
        else {
            self::$pnameid=$pnameid;
        }
        if(empty(self::$pnameid)) {
            exit('error');//参数
        }
        //获取到回复数量排行
        $cachename="Area_replynum_prov" . self::$pnameid . '_' . $nums;//启用缓存
        $lvshi=array();
        if(cache()->get($cachename)) {
            $lvshi=unserialize(cache()->get($cachename));
        }
        else {
            self::init($ksdate, $jsdate);
            //$sql=" select top $nums  replyer,count(*) as num from oask_reply  where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."'     group by replyer  order by COUNT(*) desc ";
            $sql="select top $nums   replyer,count(*) as num from oask_reply r left join oask_user u on u.name=r.replyer where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."' and u.userclassid=1 and u.pnameid=" . self::$pnameid  ."  group by replyer order by count(*) desc";
            $ph=self::select($sql);//获取到排行数据
            $icount=0;
            $tmeplslist='';//中间变量，获取到律师信息
            while(($row=$ph->read())!=false) { //循环读取数据
                //第一层循环，只能取得用户名信息
                $lvshi[$icount]['replyer']=$row['replyer'];//回复者
                $lvshi[$icount]['replynum']=$row['num'];//总的条数
                $tmeplslist.="'" .$row['replyer'] ."',";
                $icount++;
            }
            if($icount==0) {
                return NULL;
            }
            else {//如果找到数据
                $tmeplslist.="'0sdfdfds'";
                //开始获取到律师的详细信息
                $icount=0;
                $ph=self::select("select ID,name,TrueName,IsStar,pnameid,cnameid,jifen,Specaility,mobile,userclassid from oask_user where name in ($tmeplslist)");
                while(($row=$ph->read())!=false) { //循环读取数据
                    if($row['userclassid']==1) {
                        $lsurl=AskTool::GetLawyerurl($row['ID'], $row['name'],$row['IsStar']);
                        $lsaskurl=AskTool::GetLawyeraskurl($row['ID'], $row['name'],$row['IsStar']);
                    }
                    $lvshi[$icount]['truename']=$row['TrueName'];
                    $lvshi[$icount]['pname']=$row['pnameid'];
                    $lvshi[$icount]['cname']=$row['cnameid'];
                    $lvshi[$icount]['jifen']=$row['jifen'];
                    $lvshi[$icount]['mobile']=$row['mobile'];
                    $lvshi[$icount]['spec']=self::getspec($row['Specaility']);
                    $lvshi[$icount]['url']=$lsurl;
                    $lvshi[$icount]['askme']=$lsaskurl;
                    // echo $row['TrueName'],'<br>';
                    $icount++;
                }

            }
            cache()->set($cachename,serialize($lvshi),3600*24*3);//缓存3天
        }
        return $lvshi;
    }

    //全国律师好评排行榜
    public static function Area_replynum_usercomment_all($nums,$ksdate=0,$jsdate=0) {//统计全国律师回复次数
        $cachename="Area_replynum_usercomment_all" . '_' . $nums;//启用缓存
        $lvshi=array();
        if(cache()->get($cachename)) {
            $lvshi=unserialize(cache()->get($cachename));
        }
        else {
            self::init($ksdate, $jsdate);
            //$sql=" select top $nums  replyer,count(*) as num from oask_reply  where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."'     group by replyer  order by COUNT(*) desc ";
            $sql="select top $nums   replyer,sum(flower) as num from oask_reply r left join oask_user u on u.name=r.replyer where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."' and u.userclassid=1    group by replyer order by sum(flower) desc";
            $ph=self::select($sql);//获取到排行数据
            $icount=0;
            $tmeplslist='';//中间变量，获取到律师信息
            while(($row=$ph->read())!=false) { //循环读取数据
                //第一层循环，只能取得用户名信息
                $lvshi[$icount]['replyer']=$row['replyer'];//回复者
                $lvshi[$icount]['replynum']=$row['num'];//总的条数
                $tmeplslist.="'" .$row['replyer'] ."',";
                $icount++;
            }
            if($icount==0) {
                return NULL;
            }
            else {//如果找到数据
                $tmeplslist.="'0sdfdfds'";
                //开始获取到律师的详细信息
                $icount=0;
                $ph=self::select("select ID,name,TrueName,IsStar,pnameid,cnameid,jifen,Specaility,mobile,userclassid from oask_user where name in ($tmeplslist)");
                while(($row=$ph->read())!=false) { //循环读取数据
                    if($row['userclassid']==1) {
                        $lsurl=AskTool::GetLawyerurl($row['ID'], $row['name'],$row['IsStar']);
                        $lsaskurl=AskTool::GetLawyeraskurl($row['ID'], $row['name'],$row['IsStar']);
                    }
                    $lvshi[$icount]['truename']=$row['TrueName'];
                    $lvshi[$icount]['pname']=$row['pnameid'];
                    $lvshi[$icount]['cname']=$row['cnameid'];
                    $lvshi[$icount]['jifen']=$row['jifen'];
                    $lvshi[$icount]['mobile']=$row['mobile'];
                    $lvshi[$icount]['spec']=self::getspec($row['Specaility']);
                    $lvshi[$icount]['url']=$lsurl;
                    $lvshi[$icount]['askme']=$lsaskurl;
                    // echo $row['TrueName'],'<br>';
                    $icount++;
                }

            }
            cache()->set($cachename,serialize($lvshi),3600*24*3);//缓存3天
        }
        return $lvshi;
    }
    //全国律师采纳数量排行榜
    public static function Area_replynum_best_all($nums,$ksdate=0,$jsdate=0) {//统计全国律师回复次数
        $cachename="Area_replynum_best_all" . '_' . $nums;
        $lvshi=array();
        if(cache()->get($cachename)) {
            $lvshi=unserialize(cache()->get($cachename));
        }
        else {
            self::init($ksdate, $jsdate);
            //$sql=" select top $nums  replyer,count(*) as num from oask_reply  where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."'     group by replyer  order by COUNT(*) desc ";
            $sql="select top $nums   replyer,count(*) as num from oask_reply r left join oask_user u on u.name=r.replyer where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."' and u.userclassid=1 and best=1  group by replyer order by COUNT(*) desc";
            $ph=self::select($sql);//获取到排行数据

            $icount=0;
            $tmeplslist='';//中间变量，获取到律师信息
            while(($row=$ph->read())!=false) { //循环读取数据
                //第一层循环，只能取得用户名信息
                $lvshi[$icount]['replyer']=$row['replyer'];//回复者
                $lvshi[$icount]['replynum']=$row['num'];//总的条数
                $tmeplslist.="'" .$row['replyer'] ."',";
                $icount++;
            }
            if($icount==0) {
                return NULL;
            }
            else {//如果找到数据
                $tmeplslist.="'0sdfdfds'";
                //开始获取到律师的详细信息
                $icount=0;
                $ph=self::select("select ID,name,TrueName,IsStar,pnameid,cnameid,jifen,Specaility,mobile,userclassid from oask_user where name in ($tmeplslist)");
                while(($row=$ph->read())!=false) { //循环读取数据
                    if($row['userclassid']==1) {
                        $lsurl=AskTool::GetLawyerurl($row['ID'], $row['name'],$row['IsStar']);
                        $lsaskurl=AskTool::GetLawyeraskurl($row['ID'], $row['name'],$row['IsStar']);
                    }
                    $lvshi[$icount]['truename']=$row['TrueName'];
                    $lvshi[$icount]['pname']=$row['pnameid'];
                    $lvshi[$icount]['cname']=$row['cnameid'];
                    $lvshi[$icount]['jifen']=$row['jifen'];
                    $lvshi[$icount]['mobile']=$row['mobile'];
                    $lvshi[$icount]['spec']=self::getspec($row['Specaility']);
                    $lvshi[$icount]['url']=$lsurl;
                    $lvshi[$icount]['askme']=$lsaskurl;
                    // echo $row['TrueName'],'<br>';
                    $icount++;
                }

            }
            cache()->set($cachename,serialize($lvshi),3600*24*3);//缓存3天
        }
        return $lvshi;
    }
    //全国律师回复排行榜
    public static function Area_replynum_all($nums,$ksdate=0,$jsdate=0) {//统计全国律师回复次数
        $cachename="Area_replynum_all" . '_' . $nums;
        $lvshi=array();
        if(cache()->get($cachename)) {
            $lvshi=unserialize(cache()->get($cachename));
        }
        else {
            self::init($ksdate, $jsdate);
            //$sql=" select top $nums  replyer,count(*) as num from oask_reply  where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."'     group by replyer  order by COUNT(*) desc ";
            $sql="select top $nums   replyer,count(*) as num from oask_reply r left join oask_user u on u.name=r.replyer where replytime between '" .self::$weekbeginday ."' and '". self::$weekendday ."' and u.userclassid=1  group by replyer order by COUNT(*) desc";
            $ph=self::select($sql);//获取到排行数据

            $icount=0;
            $tmeplslist='';//中间变量，获取到律师信息
            while(($row=$ph->read())!=false) { //循环读取数据
                //第一层循环，只能取得用户名信息
                $lvshi[$icount]['replyer']=$row['replyer'];//回复者
                $lvshi[$icount]['replynum']=$row['num'];//总的条数
                $tmeplslist.="'" .$row['replyer'] ."',";
                $icount++;
            }
            if($icount==0) {
                return NULL;
            }
            else {//如果找到数据
                $tmeplslist.="'0sdfdfds'";
                //开始获取到律师的详细信息
                $icount=0;
                $ph=self::select("select ID,name,TrueName,IsStar,pnameid,cnameid,jifen,Specaility,mobile,userclassid from oask_user where name in ($tmeplslist)");
                while(($row=$ph->read())!=false) { //循环读取数据
                    if($row['userclassid']==1) {
                        $lsurl=AskTool::GetLawyerurl($row['ID'], $row['name'],$row['IsStar']);
                        $lsaskurl=AskTool::GetLawyeraskurl($row['ID'], $row['name'],$row['IsStar']);
                    }
                    $lvshi[$icount]['truename']=$row['TrueName'];
                    $lvshi[$icount]['pname']=$row['pnameid'];
                    $lvshi[$icount]['cname']=$row['cnameid'];
                    $lvshi[$icount]['jifen']=$row['jifen'];
                    $lvshi[$icount]['mobile']=$row['mobile'];
                    $lvshi[$icount]['spec']=self::getspec($row['Specaility']);
                    $lvshi[$icount]['url']=$lsurl;
                    $lvshi[$icount]['askme']=$lsaskurl;
                    // echo $row['TrueName'],'<br>';
                    $icount++;
                }

            }
            cache()->set($cachename,serialize($lvshi),3600*24*3);//缓存3天
        }
        return $lvshi;
    }
    /*诚信通总排行
    * param 条数，可选参数，开始日期，结束日期
    */
    public static function ScorePaihangByWeek_vip($nums,$ksdate=0,$jsdate=0) {  //初始化
        $cachename="paihang_vip_jifen" . '_' . $nums;
        $lvshi=array();
        if(cache()->get($cachename)) {
            $lvshi=unserialize(cache()->get($cachename));
        }
        else {
            self::init($ksdate, $jsdate);
          //  echo self::$weekbeginday ,'|' ,self::$weekendday ,'<br/>';
            self::$condition=' isstar=2';
            $sql="select top $nums ID,name,TrueName,IsStar,pnameid,cnameid,jifen,Specaility,mobile from oask_user where  " . self::$condition . "  order by jifen desc ";
            $ph=self::select($sql);
            $icount=0;
            while(($row=$ph->read())!=false) { //循环读取数据
                $lsurl=AskTool::GetLawyerurl($row['ID'], $row['name'],$row['IsStar']);
                $lsaskurl=AskTool::GetLawyeraskurl($row['ID'], $row['name'],$row['IsStar']);
                $lvshi[$icount]['truename']=$row['TrueName'];
                $lvshi[$icount]['pname']=self::$area_provs[$row['pnameid']];
                $lvshi[$icount]['cname']=self::$area_citys[$row['cnameid']];
                $lvshi[$icount]['jifen']=$row['jifen'];
                $lvshi[$icount]['mobile']=AskTool::str_cut($row['mobile'], 11);
                $lvshi[$icount]['spec']=self::getspec($row['Specaility']);
                $lvshi[$icount]['url']=$lsurl;
                $lvshi[$icount]['askme']=$lsaskurl;
                $icount++;
            }
            cache()->set($cachename,serialize($lvshi),3600*24*3);//缓存3天
        }
        return $lvshi;//返回数据
    }
    //普通律师排行
    public static function ScorePaihangByWeek_lawyer($nums,$ksdate=0,$jsdate=0) {  //初始化
        $cachename="paihang_lawyer_jifen" . '_' . $nums;
        $lvshi=array();
        if(cache()->get($cachename)) {
            $lvshi=unserialize(cache()->get($cachename));
        }
        else {
            self::init($ksdate, $jsdate);
           // echo self::$weekbeginday ,'|' ,self::$weekendday ,'<br/>';
            self::$condition=' isstar=0 and userclassid=1 and ispass=1 ' ;
            $sql="select top $nums ID,name,TrueName,IsStar,pnameid,cnameid,jifen,Specaility,mobile from oask_user where  " . self::$condition . "  order by jifen desc ";
            $ph=self::select($sql);
            $icount=0;
            while(($row=$ph->read())!=false) { //循环读取数据
                $lsurl=AskTool::GetLawyerurl($row['ID'], $row['name'],$row['IsStar']);
                $lsaskurl=AskTool::GetLawyeraskurl($row['ID'], $row['name'],$row['IsStar']);
                $lvshi[$icount]['truename']=$row['TrueName'];
                $lvshi[$icount]['pname']=self::$area_provs[$row['pnameid']];
                $lvshi[$icount]['cname']=self::$area_citys[$row['cnameid']];
                $lvshi[$icount]['jifen']=$row['jifen'];
                $lvshi[$icount]['mobile']=AskTool::str_cut($row['mobile'],11) ;
                $lvshi[$icount]['spec']=self::getspec($row['Specaility']);
                $lvshi[$icount]['url']=$lsurl;
                $lvshi[$icount]['askme']=$lsaskurl;
                $icount++;
            }
            cache()->set($cachename,serialize($lvshi),3600*24*3);//缓存3天
        }
        return $lvshi;//返回数据
    }
    //公众 排行
    public static function ScorePaihangByWeek_public($nums,$ksdate=0,$jsdate=0) {  //初始化
        $cachename="paihang_public_jifen" . '_' . $nums;
        $lvshi=array();
        if(cache()->get($cachename)  ) {
            $lvshi=unserialize(cache()->get($cachename));
        }
        else {
            self::init($ksdate, $jsdate);
            //echo self::$weekbeginday ,'|' ,self::$weekendday ,'<br/>';
            self::$condition=' isstar=0 and userclassid=0   ' ;
            $sql="select top $nums ID,name,TrueName,IsStar,pnameid,cnameid,jifen,Specaility,mobile from oask_user where  " . self::$condition . "  order by jifen desc ";
            $ph=self::select($sql);
            $icount=0;
            while(($row=$ph->read())!=false) { //循环读取数据
                //  $lsurl=AskTool::GetLawyerurl($row['ID'], $row['name'],$row['IsStar']);
                // $lsaskurl=AskTool::GetLawyeraskurl($row['ID'], $row['name'],$row['IsStar']);
                $lvshi[$icount]['truename']=$row['name'];
                $lvshi[$icount]['pname']=self::$area_provs[$row['pnameid']];
                $lvshi[$icount]['cname']=self::$area_citys[$row['cnameid']];
                $lvshi[$icount]['jifen']=$row['jifen'];
                $lvshi[$icount]['mobile']=$row['mobile'];
                //$lvshi[$icount]['spec']=self::getspec($row['Specaility']);
                //$lvshi[$icount]['url']=$lsurl;
                //$lvshi[$icount]['askme']=$lsaskurl;
                $icount++;
            }
            cache()->set($cachename,serialize($lvshi),3600*24*3);//缓存3天
        }
        return $lvshi;//返回数据
    }
    //积分排行通用查询
    private static  function select($sql) {
        //if($nums<1) return array();//如果条数正确，返回一个空数组
        $command=Yii::app()->db->createCommand($sql);//查询条件
        $ph=$command->query();//获取查询数据
        return $ph;
    }
    //获取到律师的专长,参数$nums,用于控制显示多少个，默认为2个
    private static function getspec($specs,$nums=2) {
        if(empty($specs) || !strpos($specs,',')) return ""; //如果找不到，返回为空

        $spec_array=explode(',', $specs);
        $strjg="";//返回值
        if(is_array($spec_array)) {
            $icount=count($spec_array);
            if ($icount<$nums) $nums=$icount;
            for($ii=0;$ii<$nums;$ii++) {
                if($ii==$nums-1) {
                    $strjg.= self::$oask_classes[$spec_array[$ii]];
                }
                else {
                    $strjg.= self::$oask_classes[$spec_array[$ii]] .',';

                }
            }
            return $strjg;

        }
    }

}
?>
