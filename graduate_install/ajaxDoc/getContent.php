<?php //header('Content-Type:text/html;charset=utf-8');
$indexId=""; 
$all="";
	if($_POST['indexId']!="")
	{
		$indexId=$_POST['indexId'];
		$all=$all."indexId:".$indexId;
	} 
	 
$indexValue=array(); 
	
if($all=="")
{
	echo "查询错误!"; 
}else
{ 
	include("../core/database.php");
	     
	$indexArray=array("openLetter","graduateCircuit","sendLuggage",
	"postponeDorm","storageLuggage","donationProposal");
	echo getIndexValue($indexArray[$indexId-1]); 
	
	
}




	//echo $all;
?>