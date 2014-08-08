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
/* 
var dormitoryId=$("#dormitoryId").val();
var dormitoryName=$("#dormitoryName").val(); 
var dormitoryMonitor=$("#dormitoryMonitor").val();
var dormitoryIntro=$("#dormitoryIntro").val();
var rewardType=$("#reward").val();  
$.post("ajaxDoc/addRecordPerson.php",{"dormitoryId":dormitoryId,
"dormitoryName":dormitoryName ,
"dormitoryMonitor":dormitoryMonitor,"dormitoryIntro":dormitoryIntro,
"rewardType":rewardType
},function(data)
{ alert(data); 
}); 
*/
});
 $("#fileHeader").click(function(){
$(".tips").remove();
 
 
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
	$outName=array();
	$intro=array();
	$headerUrl=array();
	
	if($_GET["pra"]=="person")
	{
	
		echo "<script type=\"text/javascript\">makeHideNode(\"outIdHiden\",".$_GET["pid"].");</script>"; 	 
		$str="select did,roomId,outName,intro,rewardType,headerUrl  from outstandperson where  outId = '".$_GET["pid"]."'";	
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
				$outName[]=$row[2];
				$intro[]=$row[3];
				$rewardType[]=$row[4];
				$headerUrl[]=$row[5];
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
$str="select rewardId,rewardName from reward where rewardId>2 order by rewardId desc";
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
?><div class="rightcontent"> <div class="roomadmin"> 
<?php
if(isset($_POST['submit'])&&$_FILES['file']['size']<2000000)
{
	if($_FILES['file']["error"]>0)
	{
		echo "Eorror:".$_FILES['file']['name']."<br>";

	}else
	{
		if(!is_dir("static/header"))
		{
			mkdir("static/header",700);
		} 
		$filetype=substr(strrchr($_FILES['file']['name'],'.'),1);  

		$filename=time().rand(1000,9999).".".$filetype;
		
	/*	echo "Upload:".$_FILES['file']['name'];
		echo "Type:".$_FILES['file']['type'];
		echo "SIze:".$_FILES['file']['size']/1024;
		echo "Temp file:".$_FILES['file']['tmp_name'];
	*/	
		if(file_exists("static/header/".$_FILES['file']['name']))
			echo $_FILES['file']['name']."aready exit！<br>";
		else
		{
			$result=move_uploaded_file($_FILES['file']['tmp_name'], 
			"static/header/".$filename);
			if(!$result)
			{
				echo "<div class=\"tips\"> 上传失败！ </div>";
			
			}
			else
			{	
				//echo "保存在 "."static/header/".$filename; 
	$str="update outstandperson set did='".$_POST['dormitoryName']."',roomId='".$_POST['dormitoryId']."',outName='".$_POST["dormitoryMonitor"]."',rewardType='"
	.$_POST["reward"]."',intro='".$_POST['dormitoryIntro']."',headerUrl='static/header/".$filename."' where outId='".$_GET["pid"]."';";
 
 				
					$handle=mysql_query($str,$select)or die('querry error!'.mysql_error()); ;
					$num=mysql_affected_rows();
					if($num==0)
					{   
					 	echo "<div class=\"tips\"> 数据库未发生改变！ </div>";
				
					 
					}
					else
					{	 	echo "<div class=\"tips\"> 数据更新成功！ </div>";
							
						 echo "<script type=\"text/javascript\">gotoMonitor();</script>";
					 
					 
					}
				
			}
			
			
		
		}
	}
} 
?>


<div class="makeRecord">
<form action="" method="post" enctype="multipart/form-data">
<table class="record" cellspacing="5px" cellpadding="5px">
	<tr>
		<td>公寓 </td>
		<td> 
		<select class="select" name="dormitoryName">
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
		<select name="reward">
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
		<td>姓名</td>
		<td><input type="text"  name="dormitoryMonitor"value="<?php echo $outName[0]; ?>" class="textstyle"> </td>
	</tr> 
	<tr>
		<td>个人照片</td>
		<td><input  class="filebutton"  type="file" class="files" id="fileHeader" name="file">	 </td>
	</tr> 
	<tr>
		<td>寝室号</td>
		<td><input type="text"  name="dormitoryId" class="textstyle" value="<?php echo $roomId[0]; ?>"> </td>
	</tr>
	<tr>
		<td>个人简介</td>
		<td><textarea class="textareaStyle" name="dormitoryIntro" ><?php echo $intro[0] ; ?></textarea> </td>
	</tr> 
	<tr>
		<td>&nbsp;</td>
		<td align="right"><input type="submit" name="submit"  style="width:60px; height:30px" value="提交" ></td>
	</tr>
</table>
</form>
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

