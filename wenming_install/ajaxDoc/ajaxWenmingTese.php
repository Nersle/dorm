<?php //header('Content-Type:text/html;charset=utf-8');
$Did=""; 
$all="";
	if($_POST['Did']!="")
	{
		$Did=$_POST['Did'];
		$all=$all."Did:".$Did;
	} 
	 
	$outId=array();
	$roomId=array();
	$monitor=array();
	$plan=array();
	
	
if($all=="")
{
	echo "error!"; 
}else
{ 
	include("../core/database.php");
 
	$str="select  outId ,roomId,monitor,intro  from outstandroom where rewardType=2 and Did = '".$Did."'";	
 
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
			$outId[]=$row[0];
			$roomId[]=$row[1];
			$monitor[]=$row[2];
			$plan[]=$row[3];
		}
		$reJson=array();
		$reJson[]=array(array('num'=>$num));
		for($i=1;$i<$num+1;$i++)
			$reJson[]=array(
			array('outId'=>$outId[$i-1]),
			array('roomId'=>$roomId[$i-1]),
			array('monitor'=>$monitor[$i-1]),
			array('plan'=>$plan[$i-1])
			);
		
		
		echo json_encode($reJson);
	}

	
}




	//echo $all;
?>