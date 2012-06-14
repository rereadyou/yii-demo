function addFavorite(){
var aUrls=document.URL.split("/");
var vDomainName="http://"+aUrls[2]+"/";
var description=document.title;
try{//IE
window.external.AddFavorite(vDomainName,description);
}catch(e){//FF
window.sidebar.addPanel(description,vDomainName,"");
}
}
//高级功能制
function addFavorite2(title,url){
var aUrls=url.split("/");
var vDomainName="http://"+aUrls[2]+"/";
var description=title;
try{//IE
window.external.AddFavorite(vDomainName,description);
}catch(e){//FF
window.sidebar.addPanel(description,vDomainName,"");
}
}
function getOs()
{
   if(navigator.userAgent.indexOf("MSIE")>0)return 1;
   if(isFirefox=navigator.userAgent.indexOf("Firefox")>0)return 2;
   if(isSafari=navigator.userAgent.indexOf("Safari")>0)return 3;
   if(isCamino=navigator.userAgent.indexOf("Camino")>0)return 4;
   if(isMozilla=navigator.userAgent.indexOf("Gecko/")>0)return 5;
   return 0;
}
function setHomePage(obj){
var aUrls=document.URL.split("/");
var vDomainName="http://"+aUrls[2]+"/";
try{//IE
obj.style.behavior="url(#default#homepage)";
obj.setHomePage(vDomainName);
}catch(e){//other
if(window.netscape) {//ff
try {
netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
}
catch (e) {
alert("此操作被浏览器拒绝！/n请在浏览器地址栏输入“about:config”并回车/n然后将[signed.applets.codebase_principal_support]设置为'true'");
}
var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
prefs.setCharPref('browser.startup.homepage',vDomainName);
}
}
if(window.netscape)alert("ff");
}
 