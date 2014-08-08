<?php
ini_set('date.timezone','Asia/Shanghai');//时区 
@header('Content-Type:text/html;charset=utf-8');  

$dhost="localhost";
$duser="root";
$dpswd="";
$dname="outstandDomitory";
$select=mysql_connect($dhost,$duser,$dpswd) or die('connect error!'.mysql_error());
		if($select)
		{
			if(mysql_select_db($dname,$select))
			{
			}else die('choose database error!'.mysql_error());
		}else die('connect error!'.mysql_error());
@mysql_query("SET NAMES utf8"); 		
function comp($tname,$pra1)
{
	$string="select password,uid from ".$tname." where username='".$pra1."';";
	return $string;
}

function makeOption($value,$name)
{
	echo "<option value=\"".$value."\">".$name."</option>";
}
function makeOptionSelect($value,$name)
{
	echo "<option value=\"".$value."\" selected=\"selected\">".$name."</option>";
}
				
?>