<?php
class BillaskController extends Controller {
    //首页右侧广告表
    public  $pnameid=0;//省份id
    public  $cnameid=0; //城市id
    public  $zcid=11; //专长id,默认为婚姻家庭
    public  $pname='北京';
    public  $cname='东城区';
    public  $pnames;
    public  $cnames;
    public  $fenleiids;
    public function actionIndex() {
        echo  date('W');
        echo 'cookie='. $_COOKIE['souask']['UNM'];
    }
    //咨询中心右侧广告位
    public function actionSearchright()
    {
        $this->SetArea();//设置好地区
        $cachename="zx_search_" . $this->pnameid;//为提高性能使用缓存
        $allls=array();
        if(cache()->get($cachename) && 1==2  ) {
            $allls=cache()->get($cachename);
        }
        else {
                $sql="select top 9 username as name,Truename,picadd as UserPic,tel as Mobile,CityID    from [tuijiandata]..LawTuiJian where proid =$this->pnameid";
                $command=Yii::app()->db->createCommand($sql);
                $command->text=$sql;
                $drls=$command->query();
                $citys=AskTool::Area_GetCname();
               // echo $sql;
                $icount=0;
                while(($row=$drls->read())!=false) {                     
                    $allls[$icount]['UserPic']=$row['UserPic'];
                    $allls[$icount]['name']=$row['name'];
                    $allls[$icount]['Truename']=$row['Truename'];
                    $allls[$icount]['Mobile']=$row['Mobile'];
                    $allls[$icount]['cname']=$citys[$row['CityID']];
                    $allls[$icount]['pname']=$this->pname;
                    $icount++;
                }
            //写入缓存
            cache()->set($cachename,$allls,6000);//缓存100分钟
        }
        $this->renderpartial('searchright',array('ads'=>$allls));
    }
    //咨询首页中间广告位
    public function actionIndexmiddel() {
        $this->SetArea();//设置好地区
        $cachename='indexmiddel_' . $this->pnameid ;
        $listarray=array();
        if(cache()->get($cachename)) {
            $listarray=unserialize(cache()->get($cachename));
        }
        else {
            $sql=" typeid=0  and  prov='$this->pname'";//如果是直辖市，取省份搜索

            for($i=1;$i<=6;$i++) {
                $listarray[$i]['img']="http://img.9ask.cn/souask/aa_images/ima_zs0$i.gif";
                $listarray[$i]['txt']="申请此位置";
                $listarray[$i]['link']="http://www.9ask.cn/fa/index.asp";
            }
            $criteria = new CDbCriteria();
            $criteria->select='Btitle,BLink,Baddress,flag';
            $criteria->condition=$sql;
            $criteria->order='flag  asc';
            $criteria->limit=6;
            $ads=AskBillAllinfo::model()->findall($criteria);
            foreach($ads as $k=>$v) {
                $listarray[6-$v->flag]['img']=$v->Baddress;
                $listarray[6-$v->flag]['txt']=$v->Btitle;
                $listarray[6-$v->flag]['link']=$v->BLink;
            }
            cache()->set($cachename,serialize($listarray),3600);//缓存1小时
        }

        $this->renderpartial('indexmiddel',array('ads'=>$listarray));
    }
    //咨询发布成功页
    public function actionFbok() {
        $this->SetArea();//设置好地区
        if(!isset ($_GET['zcid']) || !isset($_GET['cnameid']) ) {
            exit("error");//如果参数不够，直接退出
        }
        $zcid=(int)$_GET['zcid'];//转换为数字
        $allls=array();
        $icount=0;
        $cachename="fboks_" . $zcid .$this->cnameid;
        if(cache()->get($cachename))
            $allls=unserialize(cache()->get($cachename)) ;
        else {
            //首先调用律师右侧广告位
            for($i=0;$i<12;$i++) {
                $allls[$i]['UserPic']='0';
                $allls[$i]['name']='0';
                $allls[$i]['Truename']='0';
                $allls[$i]['Mobile']='0';
                $allls[$i]['class']=0;
            }
            $bigclassid=11;
            $sql=" typename='s' and zcid=$zcid and t.cnameid=$this->cnameid";
            if($this->pnameid<5) $sql=" typename='s' and zcid=$zcid and t.pnameid=$this->pnameid";//如果是直辖市，取省份搜索
            $criteria = new CDbCriteria();
            //总记录数放到缓存中600秒
            $criteria->select="t.flag,t.pnameID,t.cnameID";
            $criteria->condition=$sql; //构建我发布过的咨询
            $criteria->order='flag asc';
            $criteria->limit=6;
            $criteria->with='oaskuser';
            $ad=Askadcommand::model()->findall($criteria);
            foreach($ad as  $k=>$v) {
                $lsurl=AskTool::GetLawyerurl($v->oaskuser->ID, $v->oaskuser->name,$v->oaskuser->IsStar);
                $allls[$icount]['UserPic']=$v->oaskuser->userpic;
                $allls[$icount]['name']=$v->oaskuser->name;
                $allls[$icount]['Truename']=$v->oaskuser->TrueName;
                $allls[$icount]['Mobile']=$v->oaskuser->mobile;
                $allls[$icount]['lsurl']=$lsurl;
                $allls[$icount]['class']=$v->oaskuser->ID; //用户的id
                $icount++;
            }
            //调用左侧广告位
            $bigclassid=0;
            $sql=" city=$this->cnameid and zcid=$zcid and bigclass=$bigclassid";
            if($this->pnameid<5)  $sql=" prov=$this->pnameid and bigclass=$bigclassid";
            //echo $sql;
            $ad=AskBillAll::model()->findall(array('condition'=>$sql,'order'=>'flag','limit'=>'6'));
            $inum=1;//计数器
            //if(empty($this->fenleiids)) $this->fenleiids=AskTool::OaskClass_GetClass();
            $allnames='';
            foreach($ad as  $k=>$v) {
                $allls[$icount]['UserPic']=$v->baddress;
                $allls[$icount]['Truename']=$v->btitle;
                $allls[$icount]['Mobile']=$v->mobile;
                $allls[$icount]['lsurl']=$v->blink;
                $name=$v->blink;
                $name=substr($name, strpos($name,'/home/')+6);
                $name=str_replace('/','', $name);
                $name=str_replace('index.asp','', $name);
                $allnames.="'" .$name ."',";
                $allls[$icount]['name']=$name;
                $allls[$icount]['class']=0;
                $icount++;
            }
            //下面的方法用于获取到用户的id

            $arrids=array();
            if(!empty ($allnames)) {//如果存在
                $allnames.="'000ss'";//构建结尾
                $users=OaskUser::model();
                $sql="name in ($allnames)";
                //  echo $sql;
                $lsids=$users->findall(array('condition'=>$sql,'select'=>'ID,name'));
                foreach($lsids as  $k=>$v) {
                    $arrids["$v->name"]=$v->ID;
                }
            }
            $ids_count=count($arrids);
            for($i=6;$i<12;$i++) {
                if(!empty ($allls[$i]['name']) && $allls[$i]['name']!='0') {
                    $allls[$i]['class']=$arrids[$allls[$i]['name']];
                }
            }
            //如果没有缓存，就设置
            cache()->set($cachename,serialize($allls),3600);//缓存1小时
        }
        $this->renderpartial('fbok',array('allls'=>$allls));
    }

    //咨询首页中部ip广告
    public function actionContentLeft() {
        $this->SetArea();//设置好地区
        if(!isset ($_GET['zcid']) || !isset($_GET['cnameid']) ) {
            exit("error");//如果参数不够，直接退出
        }
        $zcid=(int)$_GET['zcid'];//转换为数字
        $ads=array();
        for($i=0;$i<6;$i++) {
            //古猗县律师&nbsp;&nbsp;15622233598&nbsp;&nbsp;【咨询我】
            //$ads[$i]="<a href='http://www.9ask.cn/fa/' target=_blank >我要申请</a>&nbsp;&nbsp;15622233598&nbsp;&nbsp;【咨询我】";
            $ads[$i]="<li><a href='http://www.9ask.cn/fa/' target=_blank >我要申请</a>&nbsp;&nbsp;0531-55511555&nbsp;&nbsp;&nbsp;&nbsp;<div id='ndwflagleftgg$i+1'></div></li>";
        }
        $bigclassid=0;
        $sql=" city=$this->cnameid and zcid=$zcid and bigclass=$bigclassid";
        if($this->pnameid<5)  $sql=" prov=$this->pnameid and bigclass=$bigclassid";
        $ad=AskBillAll::model()->findall(array('condition'=>$sql,'order'=>'flag','limit'=>'6'));
        $inum=1;//计数器
        if(empty($this->fenleiids)) $this->fenleiids=AskTool::OaskClass_GetClass();
        foreach($ad as  $k=>$v) {
            //数组合并
            $aryzcname=explode(',', $v->zcname);
            //开始对数组数据进行处理
            $aryzcnamecount=count($aryzcname);
            for($iii=0;$iii<$aryzcnamecount;$iii++) {
                $aryzcname[$iii]=$this->fenleiids[$aryzcname[$iii]];
            }
            $zcnames=implode(",",$aryzcname);
            //格式化律所和专长，防止其为空时页面变形
            $lvsuo=$v->lvsuo;
            if(empty($lvsuo))  $lvsuo="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            if(empty($zcnames))   $zcnames="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            $this->GetFloat($v->flag, $v->btitle, $v->baddress, $v->blink, $v->mobile, $lvsuo, $zcnames, $v->askme,0);
            //$ads[$v->flag-1]="<li><p><a href='{$v->blink}' target='_blank'><img src='{$v->baddress}' width='60' height='80' /></a></p><p><a href='<{$v->blink}' target='_blank' > $v->btitle </a></p><p>{$this->pname}-{$this->cname}</p><p><a href='{$v->askme}' target='_blank' ><img src='/images/askme.jpg' width='50' height='17' /></a></p><p>{$v->mobile}</p></li>";
            $ads[$v->flag-1]="<li style='position:relative;z-index:1' onmouseover='getggsss($v->flag,array_flages$v->flag);' ><a href='{$v->blink}' target=_blank >$v->btitle</a>&nbsp;&nbsp;{$v->mobile}&nbsp;&nbsp;【<a href='{$v->askme}' target=_blank >咨询我</a>】<div id='ndwflagleftgg$v->flag'  style='position:absolute;left:5px '  ></div></li>";
            //调用浮动层的数据
            //获取到专长
        }
        $class_f=AskTool::OaskClass_GetClass();
        $areaname=$this->cname;
        if(!empty ($areaname)) {
            $areaname=$this->pname . $this->cname;
        }
        $topic=$areaname . "<span class='ftred'>" . $class_f[$zcid] ."</span>";
        $this->renderpartial('contentleft',array('ads'=>$ads,'topic'=>$topic));
    }
    //咨询最终页作则浮动层，隶属于左侧广告位
    public function GetFloat($flags,$lsname,$lspic,$lsurl,$lsmobile,$lvsuos,$zcnames,$askurl,$rs_fx) {
        if(substr($lspic,0,4)!='http') {
            $lspic="http://img.9ask.cn" .$lspic;//修复路径不兼容问题
        }
        $lspic=str_replace('www.9ask.cn', 'img.9ask.cn',$lspic);
        //获取到咨询我的路径
        $lsaskurl=str_replace('//', '/',$lsurl . "/ask.asp");
        $lsaskurl=str_replace('askonline.asp', 'ask.asp',$lsurl . "/ask.asp");
        echo "array_flages$flags='$lsname;$lsurl;$lspic;$lsmobile;$lvsuos;$zcnames;$askurl;$rs_fx';";
    }
    //咨询最终页右侧广告位
    public function actionContentRight() {
        $this->SetArea();//设置好地区
        //echo $this->pname ,'==',$this->cname;
        if(!isset ($_GET['zcid']) || !isset($_GET['cnameid']) ) {
            exit("error");//如果参数不够，直接退出
        }
        $zcid=(int)$_GET['zcid'];//转换为数字
        $ads=array();
        for($i=0;$i<6;$i++) {
            $ads[$i]="<li><p><a href='http://www.9ask.cn/fa/'><img src='http://news.9ask.cn/images/nopic.gif' width='60' height='80' /></a></p><p><a href='http://www.9ask.cn/fa/'>申请加入</a></p><p>&nbsp;</p><p><img src='/images/askme.jpg' width='50' height='17' /></p><p>电话</p></li>";
        }
        $bigclassid=11;
        $sql=" typename='s' and zcid=$zcid and t.cnameid=$this->cnameid";
        if($this->pnameid<5) $sql=" typename='s' and zcid=$zcid and t.pnameid=$this->pnameid";//如果是直辖市，取省份搜索
        $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
        $criteria->select="t.flag,t.pnameID,t.cnameID";
        $criteria->condition=$sql; //构建我发布过的咨询
        $criteria->order='flag asc';
        $criteria->limit=6;
        $criteria->with='oaskuser';
        $ad=Askadcommand::model()->findall($criteria);
        $inum=1;//计数器
        foreach($ad as  $k=>$v) {
            $lsurl=AskTool::GetLawyerurl($v->oaskuser->ID, $v->oaskuser->name,$v->oaskuser->IsStar);
            $lsaskurl=AskTool::GetLawyeraskurl($v->oaskuser->ID, $v->oaskuser->name,$v->oaskuser->IsStar);
            if($this->cnameid==$v->cnameID) {
                $areaname=$this->pname . "-"  .$this->cname;
                if (strlen($areaname)>15) $areaname=$this->cname;
                $ads[$v->flag-1]="<li ><p><a href='$lsurl' target='_blank'><img src='http://img.9ask.cn{$v->oaskuser->userpic}' width='60' height='80' /></a></p><p><a href='<{$lsurl}' target='_blank' > {$v->oaskuser->TrueName}律师 </a></p><p>$areaname</p><p><a href='$lsaskurl' target=_blank ><img src='/images/askme.jpg' width='50' height='17' /></a></p><p>{$v->oaskuser->mobile}</p></li>";
            }
            else {

                $ads[$v->flag-1]="<li><p><a href='$lsurl' target='_blank'><img src='http://img.9ask.cn{$v->oaskuser->userpic}' width='60' height='80' /></a></p><p><a href='<{$lsurl}' target='_blank' > {$v->oaskuser->TrueName}律师</a></p><p>{$this->pnames[$v->pnameID]}-{$this->cnames[$v->cnameID]}</p><p><a href='$lsaskurl' target=_blank ><img src='/images/askme.jpg' width='50' height='17' /></a></p><p>{$v->oaskuser->mobile}</p></li>";
            }
        }
        $class_f=AskTool::OaskClass_GetClass();
        $areaname=$this->cname;
        if(empty ($areaname)) {
            $areaname=$this->pname;
        }
        $topic=$areaname . $class_f[$zcid];
        $this->renderpartial('contentright',array('ads'=>$ads,'topic'=>$topic));
    }
    // 咨询首页右侧广告位

    public function actionIndexright() {

        $this->SetArea();//设置好地区
        //广告数组
        $ads=array();
        $ads[0]="<div><a target='_blank' href='http://www.9ask.cn/fa/'><img src='http://img.9ask.cn/souask/aa_images/aa_souk.jpg' width='240' height='60'></a></div>";
        $ads[1]="<div class='margin_top_7'><a target='_blank' href='http://www.9ask.cn/fa/'><img src='http://img.9ask.cn/souask/aa_images/aa_souk1.jpg' width='240' height='60'></a></div>";
        $ads[2]="<div class='margin_top_7'><a target='_blank' href='http://www.9ask.cn/fa/'><img src='http://img.9ask.cn/souask/aa_images/aa_souk.jpg' width='240' height='60'></a></div>";
        $bigclassid=13;
        $sql=" prov=$this->pnameid and bigclass=$bigclassid";
        $ad=AskBillAll::model()->findall(array('condition'=>$sql,'order'=>'flag','limit'=>3));
        $inum=1;//计数器
        foreach($ad as  $k=>$v) {
            $flag=$v->flag;
            if(inums==1) {
                $ads[ $flag-1]="<div><a target='_blank' href='{$v->blink}'><img src='{$v->baddress}' width='240' height='60'></a></div>";
            }
            else {
                $ads[ $flag-1]="<div class='margin_top_7'><a target='_blank' href='{$v->blink}'><img src='{$v->baddress}' width='240' height='60'></a></div>";
            }

            $inum++;
        }
        $this->renderpartial('indexright',array('ads'=>$ads));
    }
    //地区咨询列表页右侧广告位，根据省份ip进行调用
    public function actionArealistright() {
        $this->SetArea();//设置好地区
        // echo $this->pnameid;        echo $this->pname;
        //echo $this->cnameid;        echo $this->cname;
        //默认广告位
        $ads=array();
        for($i=0;$i<6;$i++) {
            $ads[$i]="<li><p><a href='http://www.9ask.cn/fa/'><img src='http://news.9ask.cn/images/nopic.gif' width='60' height='80' /></a></p><p><a href='http://www.9ask.cn/fa/'>申请加入</a></p><p>&nbsp;</p><p><img src='/images/askme.jpg' width='50' height='17' /></p><p>电话</p></li>";
        }
        $bigclassid=11;
        $sql=" prov=$this->pnameid and bigclass=$bigclassid";
        $ad=AskBillAll::model()->findall(array('condition'=>$sql,'order'=>'flag','limit'=>'6'));
        $inum=1;//计数器
        foreach($ad as  $k=>$v) {
            if(empty($v->mobile))$v->mobile='&nbsp;';
            $ads[$v->flag-1]="<li><p><a href='{$v->blink}' target='_blank'><img src='{$v->baddress}' width='60' height='80' /></a></p><p><a href='<{$v->blink}' target='_blank' > $v->btitle </a></p><p>{$this->pname}-{$this->cname}</p><p><a href='{$v->askme}' target='_blank' ><img src='/images/askme.jpg' width='50' height='17' /></a></p><p>{$v->mobile}</p></li>";
        }
        $this->renderpartial('arealistright',array('ads'=>$ads));
    }
    //最新咨询（不是列别地区）广告调用规则
    //根据ip，调去本城市下的前6位律师（而且是随机调用哦）
    //如果数量不足，那么就调用 tuijiandata下的律师进行补齐
    //因为灵活性要求比较强，不使用ar,使用yii的dao实现，只需要根据省份
    //Add By ndw
    //2011-03-29
    public function actionNewListRight() {
        $this->SetArea();//设置好地区
        $cachename="zx_list_" . $this->cnameid;//为提高性能使用缓存
        $allls=array();
        if(cache()->get($cachename)   ) {
            $allls=unserialize(cache()->get($cachename));
        }
        else {
            //首先获取到该地区的总数
            $sql="select count(*) as jg from  oask_user where userclassid=1 and isstar=2 and ispass=1  and cnameid=" .$this->cnameid;
            $command=Yii::app()->db->createCommand($sql);
            $counts=$command->queryScalar();
            $totalcount=0;
            if(!empty($counts)) $totalcount=$counts;
            $rndlist="";
            if($totalcount>0) {
                $icount=1;
                $zcount=1; //防止调试时候出错，死循环
                $maxrecord=6;
                if($totalcount<6)  $maxrecord=$totalcount;
                while($icount<=$maxrecord && zcount<30) {
                    ;
                    $newnum=rand(1,$totalcount);//生成一个新的随机数
                    if(strpos("a,$rndlist,",",$newnum,")==false ) {
                        //echo "weizhi=" . strpos(",$rndlist,",",$newnum,") . "<br/>";
                        if($icount==$maxrecord) {
                            $rndlist.=$newnum ;
                        }
                        else {
                            $rndlist.=$newnum."," ;
                        }
                        $icount++;
                    }
                    $zcount++;
                }
                $sql= "select top  6 *,'$this->pname' as pname,'$this->cname' as cname  from (select name,Truename,'http://img.9ask.cn'+UserPic as UserPic,Mobile,ROW_NUMBER() over (order by ID asc) as _rn_ from oask_user where userClassID=1 and isPass=1 and IsStar=2 and    cnameID=" .$this->cnameid .") a where _rn_ in ($rndlist)";
                $command->text=$sql; //查询随机律师
                //echo $sql;
                $allls=$command->queryall();
            }
            //如果律师数量小于6个
            if ($totalcount<6) {
                $sql="select top " . (6-$totalcount) ." username as name,Truename,picadd as UserPic,tel as Mobile,CityID    from [tuijiandata]..LawTuiJian where proid =$this->pnameid";
                $command->text=$sql;
                $drls=$command->query();
                $citys=AskTool::Area_GetCname();
                // echo $sql;
                $icount=0;
                while(($row=$drls->read())!=false) {
                    $icount++;
                    $allls[$totalcount+$icount]['UserPic']=$row['UserPic'];
                    $allls[$totalcount+$icount]['name']=$row['name'];
                    $allls[$totalcount+$icount]['Truename']=$row['Truename'];
                    $allls[$totalcount+$icount]['Mobile']=$row['Mobile'];
                    $allls[$totalcount+$icount]['cname']=$citys[$row['CityID']];
                    $allls[$totalcount+$icount]['pname']=$this->pname;
                }
            }
            //写入缓存
            cache()->set($cachename,serialize($allls),600);//缓存十分钟
        }
        $this->renderpartial('newlistright',array('ads'=>$allls));
    }
    //获取到省份id
    public function SetArea() {
        if(isset ($_GET['pnameid'])) {
            $this->pnameid=$_GET['pnameid'];//如果已经赋值，那么就直接进行接收参数
        }
        if(isset ($_GET['cnameid'])) {
            $this->cnameid=$_GET['cnameid'];
        }
        else {
            if(isset($_COOKIE['cnameid'])) {
                $this->cnameid=$_COOKIE['cnameid'];
            }
        }
        $this->Getpnameid();
    }
    //设置省份id，加入cookie中不存在的话
    public function Getpnameid() {
        if( !isset($_GET['cnameid']) && !isset($_GET['pnameid']) &&    isset($_COOKIE['pnameid'])) {
            //如果已经设置
            $this->pname=$_COOKIE['pname'];
            $this->pnameid=$_COOKIE['pnameid'];
            $this->cname=$_COOKIE['name'];
            $this->cnameid=$_COOKIE['cnameid'];
        }
        else {//如果有城市id,但没有传入省份id
            if(empty ($this->pnameid) && !empty ($this->cnameid)) {
                $citys=AskCityCname::model()->with(array('province'=>array('select'=>'pname')))->findByPk($this->cnameid,array('select'=>'cname,t.pnameID'));
                $this->cname=$citys->cname;
                $this->pnameid=$citys->pnameID;
                $this->pname=$citys->province->pname;
            }
            else {
                //如果只传入pnameid
                if(isset ($_GET['pnameid']) && !isset ($_GET['cnameid'])) {
                    $this->pnameis=AskTool::Area_GetPname();
                    $this->cnames=AskTool::Area_GetCname();
                    $this->pname=$this->pnameis[$_GET['pnameid']];
                    $this->cnameid=0;
                    $this->cname='';
                }
            }
            if($this->cnameid<5) {
                $this->cname=$this->pname;
            }
        }
    }
 }

?>
