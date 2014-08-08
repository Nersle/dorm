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
$str="select rewardId,rewardName from reward where rewardId>2 order by rewardId desc";
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
				
 $str="insert into outstandperson (did,roomId,outName,intro,rewardType,headerUrl) values(\"".$_POST['dormitoryName']."\",\"".
 $_POST['dormitoryId']."\",\"".$_POST["dormitoryMonitor"]."\",\"".$_POST['dormitoryIntro']."\",\"".$_POST["reward"]."\",\"static/header/".$filename."\");";
 				
					$handle=mysql_query($str,$select)or die('querry error!'.mysql_error()); ;
					$num=mysql_affected_rows();
					if($num==0)
					{   
					 	echo "<div class=\"tips\"> 数据库插入错误！ </div>";
				
					 
					}
					else
					{	 	echo "<div class=\"tips\"> 优秀个人信息添加成功！ </div>";
						 
					 
					}
				
			}
			
			
		
		}
	}
} 
?>


<div class="makeRecord">
<form action="?par=header" method="post" enctype="multipart/form-data">
<table class="record" cellspacing="5px" cellpadding="5px">
	<tr>
		<td>公寓 </td>
		<td> 
		<select class="select" name="dormitoryName">
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
		<select name="reward">
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
		<td>姓名</td>
		<td><input type="text"  name="dormitoryMonitor" class="textstyle"> </td>
	</tr> 
	<tr>
		<td>个人照片</td>
		<td><input  class="filebutton"  type="file" class="files" id="fileHeader" name="file">	 </td>
	</tr> 
	<tr>
		<td>寝室号</td>
		<td><input type="text"  name="dormitoryId" class="textstyle"> </td>
	</tr>
	<tr>
		<td>个人简介</td>
		<td><textarea class="textareaStyle" name="dormitoryIntro" ></textarea> </td>
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

