<?php //header('Content-Type:text/html;charset=utf-8');
$albumId="";   
$all="";
	if($_POST['albumId']!="")
	{
		$albumId=$_POST['albumId'];
		$all=$all."albumId:".$albumId;
	}   
 
if($all=="")
{
	echo "服务器未收到数据"; 
}else
{ 
	include("../core/database.php");
	$sql="delete from album where albumId ='".$albumId."';";
	$sql2="delete from photos where albumId ='".$albumId."';";
 
	$handle=mysql_query($sql,$select)or die('querry error!'.mysql_error()); ;
	
	$num=mysql_affected_rows();
	if($num==0)
	{   
		echo "数据库删除错误";
	}
	else
	{
		 $handle=mysql_query($sql2,$select)or die('querry error!'.mysql_error()); ;
		echo "相册删除成功！";
	}

	
}




	//echo $all;
?>