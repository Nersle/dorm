<?php //header('Content-Type:text/html;charset=utf-8');
$indexName="";
$indexValue="";  
$all=""; 

if($_POST['indexValue']!="")
{
		$indexValue=$_POST['indexValue'];
		$all=$all."indexValue:".$indexValue;
} 
if($_POST['indexName']!="")
{
		$indexName=$_POST['indexName'];
		$all=$all."indexName:".$indexName;
}   
 
if($all=="")
{
	echo "服务器未收到数据"; 
}else
{ 
	include("../core/database.php"); 
	$indexArray=array("openLetter","graduateCircuit","sendLuggage",
	"postponeDorm","storageLuggage","donationProposal");
	echo setIndexValue($indexArray[$indexName-1],$indexValue); 	 
	
}




	//echo $all;
?>