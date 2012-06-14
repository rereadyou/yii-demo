<?php
if(empty (app()->user->id)) {
    ?>
 document.writeln("<div id=\"topnav\">");
document.writeln("    <ul>");
document.writeln("        <form id=\"login-form\" action=\"<?php echo url('site/commonlogin', array('referer'=>app()->request->getUrl())); ?>\" method=\"post\"> ");
document.writeln("            <li>用户名<\/li>");
document.writeln("            <li>");
document.writeln("                <input  name=\"username\" id=\"username\"  size=\"8\" style=\"height: 14px;\">");
document.writeln("                 <\/li>");
document.writeln("            <li>密码<\/li>");
document.writeln("            <li>");
document.writeln("                <input id=\"pwd\" style=\"height: 14px;\" name=\"password\" id=\"password\" size=\"8\"");
document.writeln("                       type=\"password\">");
document.writeln("                 ");
document.writeln("            <\/li>");
document.writeln("            <li class=\"S1\">");
document.writeln("                <input name=\"login\" value=\"登录\" type=\"hidden\">");
document.writeln("                <input name=\"image\" type=\"image\" id=\"login_img\" tabindex=\"1\"");
document.writeln("                       src=\"http:\/\/www.9ask.cn\/images\/login.gif\" border=\"0\" \/> <\/li>");
document.writeln("            <li class=\"S2\"><a href=\"http:\/\/www.9ask.cn\/reg\/reg.html\" target=\"_blank\">[3秒免费注册]<\/a> <\/li>");
document.writeln("                    ");
document.writeln("            <li class=\"S2\"> <a href=\"http:\/\/ask.9ask.cn\/ask.php\" target=\"_blank\">免费法律咨询<\/a> <\/li>");

document.writeln("            <li><a href=\"http:\/\/www.9ask.cn\/about\/checkip.asp\" target=\"_blank\">ip纠错");
document.writeln("                <\/a> <\/li>");
document.writeln("        <\/form>");
document.writeln("    <\/ul>");
document.writeln("    <ul class=\"top_xij\"><li>");
document.writeln("            <a> <span>统一客服热线：<font color=\"#ff6600\"><b>4007-088-099<\/b><\/font>(免长途费)");
document.writeln("                <\/span><\/a>");
document.writeln("            <a onclick=\"setHomePage(this)\" href=\"#\" target=\"_self\">设为首页<\/a>&nbsp;");
document.writeln("            <a href=\"#\" target=\"_self\" onclick=\"addFavorite()\">加入收藏<\/a>&nbsp;");
document.writeln("            <a href=\"http:\/\/news.9ask.cn\/help\" target=\"_blank\">使用帮助<\/a>  <a href=\"http:\/\/www.9ask.cn/10yingxiao/sjyxwy/\" target=\"_blank\"><font color=\"#ff6600\">手机站<\/font><\/a>  <\/li><\/ul>");
document.writeln("<\/div>")
    <?
}
else {
    ?>
 document.writeln("<div id=\"topnav\">");
document.writeln(" <ul  >");

document.writeln("    <li >欢迎回来！<?php echo app()->user->name?><\/li>");
document.writeln("    <li><a href=\"\/user\/\" target=\'_blank\'>用户中心<\/a> <\/li>");

 document.writeln("<li><a href=\"http:\/\/www.9ask.cn\/blog\/user\/<?php echo app()->user->name?>\" target=\"_blank\">我的博客<\/a><\/li>");
  document.writeln("    <li> <a href=\"\/ask.php\" target=\"_blank\">免费法律咨询<\/a><\/li>");
 document.writeln("    <li> <a href='<?php echo url('site/logout')?>'>退出<\/a><\/li>");

 document.writeln("  <\/ul>");
document.writeln("    <ul class=\"top_xij\"><li>");
 document.writeln(" <span> &nbsp; 统一客服热线：<font color=\'#ff6600\'><b>4007-088-099<\/b><\/font>(免长途费) &nbsp; <a onclick=\"setHomePage(this)\" href=\"#\" target='_self'>设为首页<\/a>&nbsp;<a href=\'#\' target='_self' onclick=\"addFavorite()\">加入收藏<\/a>&nbsp;<a href=\'http:\/\/news.9ask.cn\/help\' target=\'_blank\'>使用帮助<\/a> <\/span></li> ");
  document.writeln("<\/ul><\/div>")
    <?php
}
?>