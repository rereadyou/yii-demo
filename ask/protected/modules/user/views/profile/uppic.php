
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head><title>
	上传头像
</title>
    <style>
     body{ width:800px; font-size: 12px;}
.STYLE2 {color: #004592}
td{ line-height:22px; padding-left:10px;}
    </style>
    <script>
function divDisplay()
{
  document.location.href="HeadImg.aspx";
}
function GetDiv()
{
document.getElementById('updiv').style.display='block';
}

</script>

</head>
<body >
<center>

<div>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKLTEwNDQ0NDE1Nw9kFgICAw8WAh4HZW5jdHlwZQUTbXVsdGlwYXJ0L2Zvcm0tZGF0YRYCAgEPZBYCAgEPDxYCHghJbWFnZVVybAUjL3NvdWFzay91c2VycGljL24yMDA5MTAyMTA3NTcyNC5qcGdkZGTgIHxJWYrUusc492qUdtsgQ2BB3Q==" />
</div>

<div>


</div>

<table width="800" border="0" cellspacing="1" cellpadding="0" style="background:#a0cff1">
  <tr>
    <td colspan="2"   bgcolor="#eff7fc" align="left" height="20px"><span class="STYLE2"> 第一步：上传头像，显示在律师个人网站首页</span></td>
    </tr>
  <tr>
    <td bgcolor="#FFFFFF" align="center" height="190px" width="280px"><div id="currentImage">
                    <img src="http://img.9ask.cn/<?php echo $user->userpic;?>" name="img_CurrentHeadImage" id="img_CurrentHeadImage" style="height:140px;width:160px;border-width:0px;" /><br />
                     当前头像
    </div></td>
    <td bgcolor="#FFFFFF" align="left">
    对当照图片不满意？选择新照片上传（只支持gif或jpg格式的图片文件，大小不能超过200k)<br />
<iframe src="http://img.9ask.cn/ftpupload/upload.aspx?remoteurl=souask/userpic&noticeurl=http://192.168.1.169/?r=user/profile/noticepic"  frameborder="0" scrolling="no" width="350px"></iframe>
    </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#eff7fc"  height="5px"></td>
    </tr>
</table>





   </center>

</body>
</html>

