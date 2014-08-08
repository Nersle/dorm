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
<div class="leftBoxadmin">
<?php
include_once("view/common/leftown.php");
?>
 
</div>
<script type="text/javascript">
$(document).ready(function(){
$(".left_nav").mouseover(function(){
 
$(this).find(".left_nav2").show();
});
$(".left_nav").mouseout(function(){
 
$(this).find(".left_nav2").hide();
});

$("#addRecord").click(function(){ 
var dormitoryId=$("#dormitoryId").val();
var dormitoryName=$("#dormitoryName").val(); 
var dormitoryMonitor=$("#dormitoryMonitor").val();
var dormitoryIntro=$("#dormitoryIntro").val();
var rewardType=$("#reward").val(); 
 
 
 
$.post("ajaxDoc/addRecord.php",{"dormitoryId":dormitoryId,
"dormitoryName":dormitoryName,
"dormitoryMonitor":dormitoryMonitor,"dormitoryIntro":dormitoryIntro,
"rewardType":rewardType
},function(data)
{ alert(data); 

 $("#dormitoryId").val("");
 
 $("#dormitoryMonitor").val("");
 $("#dormitoryIntro").val("");
 

}); 
});

});
</script> 
<div class="rightBox2"> 

<?php
include_once("core/database.php");
$str="select did,dname from gongyu order by did desc";
$handle=mysql_query($str,$select)or die('querry error!'.mysql_error()); ;

$num=mysql_num_rows($handle);
$did=array();
$dname=array(); 
if($num==0)
{
echo "<script type=\"text/javascript\">alert(\" not exsit usr \");</script>";
}else
{ while($row=mysql_fetch_row($handle))
	{
		$did[]=$row[0];
		$dname[]=$row[1]; 
	} 
} 
?>
<?php
include_once("core/database.php");
$str="select rewardId,rewardName from reward where rewardId<3 order by rewardId desc";
$handle=mysql_query($str,$select)or die('querry error!'.mysql_error()); ;

$num=mysql_num_rows($handle);
$rewardId=array();
$rewardName=array(); 
if($num==0)
{
echo "<script type=\"text/javascript\">alert(\" not exsit usr \");</script>";
}else
{ while($row=mysql_fetch_row($handle))
	{
		$rewardId[]=$row[0];
		$rewardName[]=$row[1]; 
	} 
} 
?>
<div class="rightcontent"> 
<div class="roomadmin"> 
<div class="makeRecord">
<table class="record" cellspacing="5px" cellpadding="5px">
	<tr>
		<td>公寓 </td>
		<td> 
		<select class="select" id="dormitoryName">
		<?php
		$num=count($did); 
		while($num>0)
		{
		  makeOption($did[$num-1],$dname[$num-1]."公寓");	
		  $num--;
		} 
		?> 
		</select></td>
	</tr>
	<tr>
		<td>奖项 </td>
		<td> 
		<select id="reward">
		<?php
		$num=count($rewardId); 
		while($num>0)
		{
		  makeOption($rewardId[$num-1],$rewardName[$num-1]);	
		  $num--;
		} 
		?> 
		</select></td>
	</tr>
	<tr>
		<td>寝室号</td>
		<td><input type="text"  id="dormitoryId" class="textstyle"> </td>
	</tr>
	<tr>
		<td>寝室长</td>
		<td><input type="text"  id="dormitoryMonitor" class="textstyle"> </td>
	</tr> 
	<tr>
		<td>寝室简介</td>
		<td><textarea class="textareaStyle" id="dormitoryIntro" ></textarea> </td>
	</tr> 
	<tr>
		<td>&nbsp;</td>
		<td align="right"><input type="button" id="addRecord"  style="width:60px; height:30px" value="提交" ></td>
	</tr>
</table>
</div>

 
</div>
</div>
 

 </div>
<?php
include("view/common/footer.php");
?>
</div>
</div>
</body>
</html>

