var gg_openflag=false;
var gg_clocks;
document.writeln("<style>");
document.writeln("{");
document.writeln("	PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px");
document.writeln("}");
document.writeln("BODY {");
document.writeln("	FONT-SIZE: 12px; FONT-FAMILY: 宋体, Arial, Helvetica, sans-serif; BACKGROUND-COLOR: #fff; TEXT-ALIGN: left");
document.writeln("}");
document.writeln("UL {");
document.writeln("	LIST-STYLE-TYPE: none");
document.writeln("}");
document.writeln("LI {");
document.writeln("	LIST-STYLE-TYPE: none");
document.writeln("}");
document.writeln("IMG {");
document.writeln("	BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px");
document.writeln("}");
document.writeln(".blank {");
document.writeln("	CLEAR: both; MARGIN: 0px auto; OVERFLOW: hidden; HEIGHT: 10px");
document.writeln("}");
document.writeln(".changse {");
document.writeln("	COLOR: #f60");
document.writeln("}");
document.writeln(".changse A {");
document.writeln("	COLOR: #0066ff");
document.writeln("}");
document.writeln(".changse A:hover {");
document.writeln("	COLOR: #0066ff");
document.writeln("}");
document.writeln(".changse A:visited {");
document.writeln("	COLOR: #0066ff");
document.writeln("}"); 
document.writeln(".layer01 {");
document.writeln("	 BORDER-RIGHT: #b1d4ea 1px solid; PADDING-RIGHT: 5px; BORDER-TOP: #b1d4ea 1px solid; PADDING-LEFT: 5px; BACKGROUND: #ffffff; PADDING-BOTTOM: 5px; BORDER-LEFT: #b1d4ea 1px solid; WIDTH: 230px; PADDING-TOP: 5px; BORDER-BOTTOM: #b1d4ea 1px solid; POSITION:absolute;  ");
document.writeln("}");
document.writeln(".layer01 H5 {");
document.writeln("	FLOAT: left; MARGIN: 0px; WIDTH: 60px");
document.writeln("}");
document.writeln(".layer01 H5 IMG {");
document.writeln("	FLOAT: left; MARGIN: 0px");
document.writeln("}");
document.writeln(".layer01 H2 {");
document.writeln("	FONT-WEIGHT: normal; FONT-SIZE: 12px; FLOAT: right; WIDTH: 160px; LINE-HEIGHT: 18px");
document.writeln("}");
document.writeln("</style>");
document.writeln("<div class='thead1 margin_top_10'><div class='c'></div><div class='text ft14 ftb grey' style='margin-left:50px; _margin-left:30px;'><?php echo $topic?>律师</div></div>");
document.writeln(" <div class='cbody dlistbody2' ><ul>");
document.writeln("<?php        echo $ads[0] ,$ads[1] ,$ads[2],$ads[3],$ads[4],$ads[5]  ;?>");
document.writeln("</ul><div style='clear:both'></div> ");
document.writeln("</div>");
//广告位调用开始
function getggsss(flags,jgs)
{
 var content="";
 jg=jgs.split(";");
 lsname=jg[0];
 lsurl=jg[1];
 lspic=jg[2];
 lsmobile=jg[3];
 lvsuo=jg[4];
 zcnames=jg[5];
 askme=jg[6];
 isfirst=jg[7];
 topex="-1000px";
 hideAds_all_gg();
 content=" <DIV onmouseout=fun(event,this)  onmouseover='clearTimeout(gg_clocks);'    class=layer01   id='g_dibugg" + flags + "' style='z-index:9990;'     >";
 content=content  +"  <DIV  >"
 content=content +"  <H5><A href='" +lsurl + "' target=_blank><IMG height=80 src='" +  lspic  + "' width=60></A></H5>";
 content=content +"  <H2 style='background-color:#FFFFFF;text-align:left;height:100px'><B>"+ lsname.replace('律师','') +"律师</B><br>"+lvsuo+"";
 content=content +"<br><SPAN  class=changse >"+lsmobile+"</SPAN><BR>专长:"+ zcnames+"   </H2></DIV>";
 content=content +"  <DIV><A href='"  + lsurl + "' target=_blank><IMG ";
  content=content +"  src='http://www.9ask.cn/entrust/images/layerx1.gif'></A>&nbsp;&nbsp;<A ";
 content=content +"  href='" +  askme  + "' target=_blank><IMG ";
 content=content +"  height=22 src='http://www.9ask.cn/entrust/images/layerx2.gif' width=84></A></DIV></DIV>";
 //content=content +"</DIV></DIV>";
 document.getElementById('ndwflagleftgg'+flags).innerHTML= content;
 document.getElementById('ndwflagleftgg'+flags).style.display='';
 if(flags<4)
 {
  document.getElementById('ndwflagleftgg'+flags).style.top='-140px';
  }
  else
  {
  document.getElementById('ndwflagleftgg'+flags).style.top='20px';
  } 
}
 function get_Y(obj){
    var ParentObj=obj;
    var top=obj.offsetTop;
    while(ParentObj=ParentObj.offsetParent){
        top+=ParentObj.offsetTop;
    }
    return top;
}

 function fun(e,o) {
        /* FF 下判断鼠标是否离开DIV */
        if(window.navigator.userAgent.indexOf("Firefox")>=1) {            
             gg_clocks=setTimeout(" hideAds_all_gg()",5000);
            }
            else
            { gg_clocks=setTimeout(" hideAds_all_gg()",5000);
            }

    }
function hideAds_all_gg()
{
 for(var i=1;i<=6;i++)
 { try{
    var thisobj=document.getElementById("g_dibugg" + i);
    thisobj.style.display="none";
	}
	catch(err)
	{
	}
 }
}
function showAds_one(sid,r_wz)
{  hideAds_all_gg();
   var thisobj=document.getElementById("g_dibugg" + sid);
    var  thismuban=document.getElementById("muban_left");
   if(r_wz!=1)
   {
   thisobj.style.top=(get_Y(thismuban)-110)+'px';
  }
  else
  {
   thisobj.style.top=(get_Y(thismuban)+90)+'px';
  }
  thisobj.style.display="";
  gg_openflag=true;

}
 
 
<?php exit();//防止输出调试信息，导致广告位不显示?>
