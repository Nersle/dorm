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
	$outName=array();
	$intro=array();
	$headerUrl=array();
	
	
if($all=="")
{
	echo "error!"; 
}else
{ 
	include("../core/database.php");
 
	$str="select  outId ,roomId,outName,intro,headerUrl  from outstandPerson where rewardType=4 and did = '".$Did."'";	
 
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
			$outName[]=$row[2];
			$intro[]=$row[3];
			$headerUrl[]=$row[4];
		}
		$reJson=array();
		$reJson[]=array(array('num'=>$num));
		for($i=1;$i<$num+1;$i++)
			$reJson[]=array(
			array('outId'=>$outId[$i-1]),
			array('roomId'=>$roomId[$i-1]),
			array('outName'=>$outName[$i-1]),
			array('intro'=>$intro[$i-1]),
			array('headerUrl'=>$headerUrl[$i-1])
			);
		
		
		echo json_encode($reJson);
	}

	
}




	//echo $all;
?>