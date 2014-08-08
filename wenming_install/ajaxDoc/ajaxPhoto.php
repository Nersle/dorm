<?php //header('Content-Type:text/html;charset=utf-8');
$albumID=""; 
$all="";
	if($_POST['albumID']!="")
	{
		$albumID=$_POST['albumID'];
		$all=$all."albumID:".$albumID;
	} 
	 
	$result=array();
	$cap=array();
	
if($all=="")
{
	echo "error!"; 
}else
{ 
	include("../core/database.php");
 
	$str="select  commentary ,photoUrl from photos where albumID = '".$albumID."'";	
 
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
			$cap[]=$row[0];
			$result[]=$row[1];
		}
		$reJson=array();
		$reJson[]=array(array('num'=>$num));
		for($i=1;$i<$num+1;$i++)
			$reJson[]=array(array('photoUrl'=>$result[$i-1]),
			array('commentary'=>$cap[$i-1]));
		
		
		echo json_encode($reJson);
	}

	
}




	//echo $all;
?>