<?php //header('Content-Type:text/html;charset=utf-8');
$albumName=""; 
$albumCaption="";
 
 

$all="";
	if($_POST['albumName']!="")
	{
		$albumName=$_POST['albumName'];
		$all=$all."albumName:".$albumName;
	}   
	if($_POST['albumCaption']!="")
	{
		$albumCaption=$_POST['albumCaption'];
		$all=$all."albumCaption:".$albumCaption;
	}    
 
if($all=="")
{
	echo "服务器未收到数据"; 
}else
{ 
	include("../core/database.php");
	$sql="insert into album(albumName,caption)values('".$albumName."'
	,'".$albumCaption."');";
 
	$handle=mysql_query($sql,$select)or die('querry error!'.mysql_error()); ;
	$num=mysql_affected_rows();
	if($num==0)
	{   
		echo "数据库插入错误";
	}
	else
	{
		 
		echo "相册增加成功！";
	}

	
}




	//echo $all;
?>