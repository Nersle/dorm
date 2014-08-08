<?php //header('Content-Type:text/html;charset=utf-8');
$rules=""; 
$dormitoryId="";
$dormitoryName=""; 
$dormitoryMonitor="";
$dormitoryIntro="";
$rewardType=""; 
$all="";
	if($_POST['dormitoryId']!="")
	{
		$dormitoryId=$_POST['dormitoryId'];
		$all=$all."dormitoryId:".$dormitoryId;
	}   
	if($_POST['dormitoryName']!="")
	{
		$dormitoryName=$_POST['dormitoryName'];
		$all=$all."dormitoryName:".$dormitoryName;
	}    
	if($_POST['dormitoryMonitor']!="")
	{
		$dormitoryMonitor=$_POST['dormitoryMonitor'];
		$all=$all."dormitoryMonitor:".$dormitoryMonitor;
	}   
	if($_POST['dormitoryIntro']!="")
	{
		$dormitoryIntro=$_POST['dormitoryIntro'];
		$all=$all."dormitoryIntro:".$dormitoryIntro;
	}    
	if($_POST['rewardType']!="")
	{
		$rewardType=$_POST['rewardType'];
		$all=$all."rewardType:".$rewardType;
	}   
 
if($all=="")
{
	echo "服务器未收到数据"; 
}else
{ 
	include("../core/database.php");
	$sql="insert into outstandroom(did,roomId,monitor, intro,rewardType)values('".$dormitoryName."'
	,'".$dormitoryId."','".$dormitoryMonitor."','".
	$dormitoryIntro."','".$rewardType."');";
 
	$handle=mysql_query($sql,$select)or die('querry error!'.mysql_error()); ;
	$num=mysql_affected_rows();
	if($num==0)
	{   
		echo "数据库插入错误";
	}
	else
	{
		 
		echo "寝室信息录入成功！";
	}

	
}




	//echo $all;
?>