$(document).ready(function(){


});

function gotoIndex()
{
	location.href="/graduate/";
}

function gotoMonitor()
{
	location.href="/graduate/graduateMonitor.php";
}
function gotoAlbum()
{
	location.href="/graduate/album.php";
}
function gotoAdmin()
{
	location.href="/graduate/admin.php";
	//location.href="/graduate/";
}
function gotoLogin()
{
	location.href="/graduate/login.php";
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