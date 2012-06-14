<?php
/*
  * 版主类，函数 功能， 判断是否为版主，删除垃圾咨询
  * 方法一律为静态方法
*/
class Webmastertools {
    //put your code here
    //类型bool, 判断某一用户是否为版主，参数为用户id,如果传入空值，那么就已当前用户作为参数
    public static function IsWebMaster($userid=0) {
        $findable=false;
        $cachename="wm_all_$fenleiid_$userid";
        if(cache()->get($cachename)) {
            $findable=cache()->get($cachename);
        }
        else {
            if(empty ($userid)) {
                if(app()->user->id) {
                    //构造查询条件，看用户是否为任一类别的版主
                    $findable=OaskWebmaster::model()->exists(array('condition'=>'userid='. app()->user->id));
                    return $findable;//返回查找结果
                }
                else {
                    //如果用户没有登录，直接诶返回
                    return false;
                }
            }
            else {//如果要查询年具体的人员
                $findable=OaskWebmaster::model()->exists(array('condition'=>'userid='. app()->user->id));
            }
            if($findable) {
                $findable="1";
            }
            else {
                $findable="00";
            }
            cache()->set($cachename,$findable,1800);//缓存半小时
        }
        return $findable;//返回查找结果

    }
    //判断是否为地区版主
    public static function areamaster($pnameid,$cnameid,$userid) {
            // echo "begin2";
        if(empty($userid)) {
            return false;
        }
             //  echo "begin3";
        if (empty ($pnameid) && empty($cnameid) ) {
            return false;
        }
        $findable=false;
        if($pnameid==null) $pnameid="0";
        $cachename="wm_area_" . $pnameid ."_" . $cnameid . "_" . $userid ;
        //echo "begin";
        if(cache()->get($cachename) && 1==2  ) {
            $findable=cache()->get($cachename);
        }
        else {
            if($cnameid) {
           // echo 'dfs';
                //判断是否为城市版主
                $sql=" userid=$userid and cnameid=$cnameid and classid=0 ";
                $findable=OaskWebmaster::model()->exists(array('condition'=>$sql));
            }
            else {
                //判断是否为省份版主
                $sql=" userid=$userid and cnameid=0 and pnameid=$pnameid and classid=0";
               // echo $sql;
                $findable=OaskWebmaster::model()->exists($sql);
            }
            if($findable) {
                $findable="1";
            }
            else {
                $findable="00";
            }
            cache()->set($cachename,$findable,1800);//缓存半小时
        }

        return $findable;
    }
    //判断用户是否为专长版主
    public static  function fenleimaster($fenleiid,$userid) {
        //为避免每次判断时访问数据库，增加缓存
        //如果任意一参数为空，那么就不能执行
        if(empty($userid) || empty($fenleiid)) {
            return false;
        }
        $cachename="wm_fenleiid_" . $fenleiid  ."_" . $userid;
       // echo $cachename;
        if(cache()->get($cachename) ) {
            $findable=cache()->get($cachename);
        }
        else {
            $sql=" userid=$userid and cnameid=0 and classid=$fenleiid ";
            $findable=OaskWebmaster::model()->exists(array('condition'=>$sql));
            if($findable) {
                $findable="1";
            }
            else {
                $findable="00";
            }
            cache()->set($cachename,$findable,1800);//缓存半小时
        }
        return $findable;
    }
    //删除咨询，一般用于版主，版主删除后，设置好用户设置的状态
    //$qid 为传入参数
    public static function Delquestion($qid) {
        //首先判断用户是否登录
        if(app()->user->id) {
            $question=OaskQuestion::model()->findbyPK($qid);
            //首先判断咨询是否存在
            if($question) {
                if($question->jie!=44) {
                    $question->jie=44;//已删除
                    //更新修改日期
                    $question->ChangeTime=date("Y") . "-" . date("m") . "-" .date("d") . " " . date("H") . ":". date("i") . ":". date("s");
                    $question->save(false);
                    //插入删除日志
                    $dellog=new Oaskdelquestion();
                    $dellog->qid=$question->ID;
                    $dellog->userid=app()->user->id;
                    $dellog->deldate=date("Y") . "-" . date("m") . "-" .date("d") . " " . date("H") . ":". date("i") . ":". date("s")   ;
                    $dellog->save(false);
                    return true;
                }
                else {
                    //不允许重复删除
                    return false;
                }

            }
            else {
                //如果咨询不存在，那么就进行删除
                return false;
            }
        }
        else {
            //如果没有登录，直接返回为false
            return false;
        }
    }

}
?>
