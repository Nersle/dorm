<?php //header('Content-Type:text/html;charset=utf-8');
$parameter="";   
$all="";
	if($_POST['parameter']!="")
	{
		$parameter=$_POST['parameter'];
		$all=$all."parameter:".$parameter;
	}   
 
if($all=="")
{
	echo "服务器未收到数据"; 
}else
{ 
	include("../core/database.php");
	if($parameter=="room")
	{	
		$str="delete from outstandroom where rewardType=2 or rewardType=1;";
		$handle=mysql_query($str,$select)or die('querry error!'.mysql_error()); 
		$num=mysql_affected_rows();
		if($num==0)
		{   
			echo "数据库删除错误";
		}
		else
		{	

			echo "优秀寝室信息全部删除！";
		}
	}
	else if($parameter="person")
	{
				$str="delete from outstandperson where rewardType=3 or rewardType=4;";
				$handle=mysql_query($str,$select)or die('querry error!'.mysql_error()); ;
				$num=mysql_affected_rows();
				if($num==0)
				{   
					echo "数据库删除错误";
				}
				else
				{
					 
					echo "优秀个人信息全部删除！";
				}
	}
	else
	 echo "未知参数";
	  

	
}




	//echo $all;
?>