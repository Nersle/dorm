<?php //header('Content-Type:text/html;charset=utf-8');
$rules=""; 
$all="";
	if($_POST['rules']!="")
	{
		$rules=$_POST['rules'];
		$all=$all."rules:".$rules;
	}   
 
if($all=="")
{
	echo "服务器未收到数据"; 
}else
{ 
	include("../core/database.php");
 
	$sql ="update  systemrule set indexValue='".$rules."'where indexName='rules';";
	$handle=mysql_query($sql,$select)or die('querry error!'.mysql_error()); ;
	$num=mysql_affected_rows();
	if($num==0)
	{   
		echo "数据库更新错误";
	}
	else
	{
		 
		echo "规则修改成功！";
	}

	
}




	//echo $all;
?>