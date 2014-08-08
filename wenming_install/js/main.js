$(document).ready(function(){


});

function gotoIndex()
{
	location.href="/wenming/";
}

function gotoMonitor()
{
	location.href="/wenming/wenmingMonitor.php";
}
function gotoAlbum()
{
	location.href="/wenming/album.php";
}
function gotoAdmin()
{
	location.href="/wenming/admin.php";
	//location.href="/wenming/";
}
function gotoLogin()
{
	location.href="/wenming/login.php";
} 

function deleteNode(parent)
{
var f = document.getElementById(parent);  
var childs = f.childNodes;   
for(var i = childs.length - 1; i >= 0; i--) {  
   // alert(childs[i].nodeName);  
    f.removeChild(childs[i]);  
}  
}

function makeHideNode(name, pras)
{
	
	document.write("<input id=\""+name+"\" type=\"hidden\" value=\""+pras+"\"> ");

} 
function flush()
{
	location.reload() ;
}
function pre()
{	
	history.go(-1);
}