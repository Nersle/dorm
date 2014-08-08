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

$("#editRecord").click(function(){ 
var dormitoryId=$("#dormitoryId").val();
var dormitoryName=$("#dormitoryName").val(); 
var dormitoryMonitor=$("#dormitoryMonitor").val();
var dormitoryIntro=$("#dormitoryIntro").val();
var rewardType=$("#reward").val(); 
var outId=$("#outIdHiden").val();  
 
$.post("ajaxDoc/updateRecord.php",{"dormitoryId":dormitoryId,
"dormitoryName":dormitoryName,
"dormitoryMonitor":dormitoryMonitor,"dormitoryIntro":dormitoryIntro,
"rewardType":rewardType,"outId":outId
},function(data)
{ alert(data); 
history.go(-1);

}); 
});

});
</script> 
<div class="rightBox2"> 
<?php
 

if(!isset($_GET["pra"]))
{
	echo "error!"; 
}else
{  
	$did=array();
	$rewardType=array();
	$roomId=array();
	$monitor=array();
	$intro=array();
	
	if($_GET["pra"]=="room")
	{
	
		echo "<script type=\"text/javascript\">makeHideNode(\"outIdHiden\",".$_GET["pid"].");</script>"; 	 
		$str="select did,roomId,monitor,intro,rewardType  from outstandroom where  outId = '".$_GET["pid"]."'";	
		$handle=mysql_query($str,$select)or die('querry error!'.mysql_error()); ;
		$num=mysql_affected_rows();
		if($num==0)
		{   
			echo "ERROR";
		}
		else
		{
			 
			while($row=mysql_fetch_array($handle))
			{
				$did[]=$row[0]; 
				$roomId[]=$row[1];
				$monitor[]=$row[2];
				$intro[]=$row[3];
				$rewardType[]=$row[4];
			}
 
		}

	} 
	else
	echo "未知错误！";

}
?>
<?php
include_once("core/database.php");
$str="select did,dname from gongyu order by did desc";
$handle=mysql_query($str,$select)or die('querry error!'.mysql_error()); ;

$num=mysql_num_rows($handle);
$did1=array();
$dname1=array(); 
if($num==0)
{
echo "<script type=\"text/javascript\">alert(\" not exsit usr \");</script>";
}else
{ while($row=mysql_fetch_row($handle))
	{
		$did1[]=$row[0];
		$dname1[]=$row[1]; 
	} 
} 
?>
<?php
include_once("core/database.php");
$str="select rewardId,rewardName from reward where rewardId<3 order by rewardId desc";
$handle=mysql_query($str,$select)or die('querry error!'.mysql_error()); ;

$num=mysql_num_rows($handle);
$rewardId1=array();
$rewardName1=array(); 
if($num==0)
{
echo "<script type=\"text/javascript\">alert(\" not exsit usr \");</script>";
}else
{ while($row=mysql_fetch_row($handle))
	{
		$rewardId1[]=$row[0];
		$rewardName1[]=$row[1]; 
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
		$num=count($did1); 
		while($num>0)
		{
		
			if($did1[$num-1]!=$did[0]) 
				makeOption($did1[$num-1],$dname1[$num-1]."公寓");	
			else
				makeOptionSelect($did1[$num-1],$dname1[$num-1]."公寓");	 
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
		$num=count($rewardId1); 
		while($num>0)
		{	 
			if($rewardId1[$num-1]!=$rewardType[0]) 
				makeOption($rewardId1[$num-1],$rewardName1[$num-1]); 
			else
				makeOptionSelect($rewardId1[$num-1],$rewardName1[$num-1]);
		  
		  $num--;
		} 
		?> 
		</select></td>
	</tr>
	<tr>  		 
		<td>寝室号</td>
		<td><input type="text"  id="dormitoryId" class="textstyle" value="<?php echo $roomId[0]; ?>"> </td>
	</tr>
	<tr>
		<td>寝室长</td>
		<td><input type="text"  id="dormitoryMonitor" class="textstyle" value="<?php echo $monitor[0]; ?>"> </td>
	</tr> 
	<tr>
		<td>寝室简介</td>
		<td><textarea class="textareaStyle" id="dormitoryIntro"    ><?php echo $intro[0] ; ?></textarea> </td>
	</tr> 
	<tr>
		<td>&nbsp;</td>
		<td align="right"><input type="button" id="editRecord"  style="width:60px; height:30px" value="提交" ></td>
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

