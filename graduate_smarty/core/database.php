<?php
 
function conn()
{
	ini_set('date.timezone','Asia/Shanghai');//时区 
	@header('Content-Type:text/html;charset=utf-8');  

	$dhost="localhost";
	$duser="root";
	$dpswd="";
	$dname="graduate";
	$select=mysql_connect($dhost,$duser,$dpswd) or die('connect error!'.mysql_error());
	if($select)
	{
		if(mysql_select_db($dname,$select))
		{
		}else die('choose database error!'.mysql_error());
		}else die('connect error!'.mysql_error());
	@mysql_query("SET NAMES utf8");

	return $select;
}


 		
function comp($tname,$pra1)
{
	$string="select password,uid from ".$tname." where username='".$pra1."';";
	return $string;
}

function getIndexValue($index)
{
	$select=conn();
	$sql="select indexValue from systemrule where indexName='".$index."'";
  
	$handle=mysql_query($sql,$select)or die('querry error!'.mysql_error()); ;
	$num=mysql_affected_rows();
	$str="";
	if($num==0)
	{   
		$str="数据库查询错误";
	}
	else
	{
		$row=mysql_fetch_array($handle);
		$str=$row[0];
		 
	}
	return $str;
}
function setIndexValue($index,$indexValue)
{
	$select=conn();
	$sql="update systemrule set indexValue='".$indexValue."' where indexName='".$index."'";
	$handle=mysql_query($sql,$select)or die('querry error!'.mysql_error()); ;
	$num=mysql_affected_rows();
	$str="";
	if($num==0)
	{   
		$str="数据更新失败";
	}
	else
	{ 
		$str="数据更新成功";
	}
	return $str;
}

 //openLetter  graduateCircuit  sendLuggage postpone storageLuggage donationProposal


function makeOption($value,$name)
{
	echo "<option value=\"".$value."\">".$name."</option>";
}
function makeOptionSelect($value,$name)
{
	echo "<option value=\"".$value."\" selected=\"selected\">".$name."</option>";
}
				
?>