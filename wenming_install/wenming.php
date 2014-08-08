<?php
include_once("view/common/htmlHeader.php");
?>
<body>
<div class="tbody">

<div class="log">
<?php
include_once("view/common/header.php");
?>
</div>
 
<?php
 include("view/common/nav.php"); 
?>
 
<div class="content"> 
<div class="leftBox2">
<div class="photos2">
<ul class="gongyu">
<?php
$Dname=array();
$Did=array();
 
$sql="select did,dname  from gongyu";
$handle=mysql_query($sql,$select)or die('querry error!'.mysql_error()); ; 
$num=mysql_num_rows($handle);

if($num==0)
{
echo "<script type=\"text/javascript\">alert(\" not exsit usr \");</script>";
}else
{
	 
	for($i=0;$i<$num;$i++)
	{	
		$row=mysql_fetch_row($handle);
   
		$Did[]=$row[0];
		$Dname[]=$row[1]; 
		
	}
}
 
$href="javascript:void(0);";
 
 
$str0="<li class=\"photo2\" id=\"ablums";
$st1="\" ><a href=\"";
$str3="\">";
$str4="<div class=\"photoCaption2\" id=\"cap";

$str5="\">";
$str6="</div></a></li>";
for($i=0;$i<$num;$i++)
	echo $str0.$Did[$i].$st1.$href.$str3.$Dname[$i]."公寓".$str4.$Did[$i].$str5.$Dname[$i]."公寓".$str6;

?>
</ul>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
$(".photo2").click(function(){ 
var indexs=$(this).attr("id"); 
var index=(/\d+/).exec(indexs)[0];
var newIndex="cap"+index; 
 
var nextAlbumId=index;
 

 $.post("ajaxDoc/ajaxWenming.php",{"Did":nextAlbumId},function(data){
 
 
  $(".roomList").empty();
 
	if(data!="ERROR")
	{  
		   dataobj=eval(data);
		   dnum=dataobj[0][0]["num"] ;
		   var imgid="roomlist";
		   var newid="";
		   $href="javascript:void(0);";
		   for(i=0;i< dnum;i++)
		   {
		   str="<li class=\"rlist\" id=\"roomlist"+
			dataobj[i+1][0]["outId"]+"\" ><div class=\"listcap\">"+dataobj[i+1][1]["roomId"]+"</div>"
			+"<div class=\"mon\"><div class=\"monitor\">寝室长："+dataobj[i+1][2]["monitor"]
			+"</div>"+"<div class=\"plan\">寝室介绍："+dataobj[i+1][3]["plan"]+"</div>"
			+"<div class=\"editRecord\"><a href=\"changeRecord.php?pra=room&pid="+dataobj[i+1][0]["outId"]+"\">修改</a></div>"
			+"</div></li>";
			
			/* str="<li class=\"rlist\" id=\"roomlist"+
			dataobj[i+1][0]["outId"]+"\" ><div>"+dataobj[i+1][1]["roomId"]+"</div> </li>";*/
			
			$(str).appendTo(".roomList"); 
		   
		   } 	
	}
	 
});

 
});

$(".rlist").live("mouseover",function(){ 

$(".mon").hide();
$(this).find(".mon").show();
var indexs=$(this).attr("id"); 
var index=(/\d+/).exec(indexs)[0];
var newIndex="cap"+index; 
/* alert(index); */
});
$(".rlist").live("mouseleave",function(){ 

$(".mon").hide();
 
/* alert(index); */
});


});
</script> 
<div class="rightBoxShow"> 
<div class="righttop">
<img id="righttop"height="45px" width="700px" src="static/image/qinshi.jpg">
<div class="room">

<ul class="roomList">

</ul>
</div>
</div>
 

 </div>
<?php
include("view/common/footer.php");
?>
</div>
</body>
</html>

