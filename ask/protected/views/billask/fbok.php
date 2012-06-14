document.write("<form action='<?php echo url('duanxin/addcontents');?>' name='frmmsgs' id='frmmsgs' method='post'  target='_blank' >");
document.write("<ul>");
    <?php
    for($i=0;$i<6;$i++) {
        //如果是正常广告位，
        if($allls[$i]['name']=='0') {
            echo "document.write(\"<li><a href='http://www.9ask.cn/fa/' target=_blank ><img border=0 src='/images/clicksq.jpg' width='131' height='51' /></a></li>'\");";
        }
        else {
            echo "document.write(\"<li> <div><input name='chkid[]' id='chkid' type='checkbox' value='{$allls[$i]['class']}' />&nbsp;<a href='{$allls[$i]['lsurl']}' target='_blank' >{$allls[$i]['Truename']}律师</a></div><div>{$allls[$i]['Mobile']}</div> </li>\");";
        }
    }
    ?>
document.write("</ul>");

document.write("<span style='clear:both;height:1px;display:block;border-top:1px dotted #ccc;padding:10px 0'></span><input name='newid' type='hidden' id='newid' value='<?php echo((int)$_GET['newid']) ?>' >");
document.write("<input name='senderid' type='hidden' id='senderid' value='<?php echo(app()->user->id) ?>'   >");

document.write("<ul>");


 <?php
    for($i=6;$i<12;$i++) {
        if($allls[$i]['name']=='0') {
            echo "document.write(\"<li><a href='http://www.9ask.cn/fa/' target=_blank ><img border=0 src='/images/clicksq.jpg' width='131' height='51' /></a></li>\");";
        }
        else {
            echo "document.write(\"<li> <div><input name='chkid[]' id='chkid' type='checkbox' value='{$allls[$i]['class']}' />&nbsp;<a href='{$allls[$i]['lsurl']}'>{$allls[$i]['Truename']}律师</a></div><div>{$allls[$i]['Mobile']}</div> </li>\");";
        }
    }    
    ?>   
document.write("</ul>");
document.write("<div class='margin_top_10'>");
document.write("    <span><a href='javascript:void(0)' onclick=CheckAll() target='_self'><img border='0' src='/images/allselectbtn.gif' /></a></span>");
document.write("  <span><input name='bttijiao' type='image'  src='/images/onevone.gif' /></span>");
document.write("     <span><a href='http://news.9ask.cn/help/ask/200910/259801.html'>什么是一对一咨询?</a></span>");
document.write("</div>");
document.write(" </form>");
 function CheckAll() //传一个表单作参数
{
var frmmsgs1=document.getElementById('frmmsgs');
for (var i=0;i<frmmsgs1.elements.length;i++) //对这个表单里的元素进行循环
 {
 var e = frmmsgs1.elements[i]; //一个一个元素判断
 if (e.Name != "chkid"&&e.disabled!=true) //如果该元素的name属性为chkAll并且disabled!=true.即:该控件可用时.
 e.checked = true; //控元素的checked与当前选中的控件checked保持一致.即:全选/全不选.
}

}
<?php
exit();
?>