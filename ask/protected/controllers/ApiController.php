<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
class ApiController extends Controller {
    public function actiontest() {
        /*
        echo "主站:" . $_COOKIE["souask[unm]"];
        exit();
        echo "mytest";
        echo "用户名：" . app()->user->id ."<br/>";
        echo Webmastertools::IsWebMaster(app()->user->id);
        //判断是否为省份攀住
        echo "是否为北京地区版主:" . Webmastertools::areamaster(1, 0, app()->user->id);
        echo "是婚姻家庭版主:" . Webmastertools::fenleimaster(11, app()->user->id);
         *
        */
        //测试异步登录

    }
    /*
     *  从主站到分站的登录入口
     * 密码采用md5加密后传输过来
    */
    public function actionsyslogin($name,$psw) {
        $username=$_GET['username']; //接收用户名
        $psw=$_GET['psw'];//接收密码
        if(strlen($username)>56) { //用户名不能太长
        return false;
        }
        $logins=new LoginForm();
        $logins->username=$username;
        $logins->password=$psw;
        $jg=$logins->login2();
        if($jg)//如果登录成功
        {//暂时不输出

        }
        else {
           //暂时不输出
        }
    }


    public function actiongetarea() {
        $pnameid=$_COOKIE['pnameid'];
        $cnameid=$_COOKIE['cnameid'];
        $askpnames=AskTool::Area_GetPname();
        $askcnames=AskTool::Area_GetCname();
        $pname=$askpnames[$pnameid];
        $cname=$askcnames[$cnameid];
        $pname_paixu=AskTool::Area_GetPname_forpinyins();
        $cname_paixu=AskTool::Area_GetCname_forpinyins();
        $pname_py=$pname_paixu[$pnameid];
        $cname_py=$cname_paixu[$cnameid];
        $this->renderpartial('getarea',array('pnameid'=>$pnameid,'cnameid'=>$cnameid,'pname'=>$pname,'cname'=>$cname,'pname_py'=>$pname_py,'cname_py'=>$cname_py));
    }
    public function actionnews_search() {
        $key=$_POST['query'];
        $key=iconv("UTF-8", "GBK", $key);
        $this->redirect("http://search.9ask.cn/search/search.jsp?query=$key");
    }
}
?>
