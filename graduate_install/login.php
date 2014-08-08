<?php session_start();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head profile="http://gmpg.org/xfn/11">
   <meta http-equiv="Content-Type" content="text/html ; charset=utf-8" /> 
   <meta name="Copyright" content="Copyright (c) 2012 | 05 | 16" />  
   <link type="text/css" rel="stylesheet" href="css/main.css" media="screen" />
	<script type="text/javascript" src="js/jquery1.6.2.min.js"></script>  
	<script type="text/javascript" src="js/main.js"></script>

	
   <title>emusic</title>
</head> 
  
<body>
<div class="tbodylogin">


<?php
 //include("view/common/nav.php"); 
?>
 
<div class="contentlogin"> 
	<script type="text/javascript">	 
	function flushYZM()
	{
		var yzmimg=document.getElementById("yzmflush");
 		var   date=new   Date();   
		yzmimg.src=yzmimg.src+"?"+date.toLocaleString();
	}
 
	<!--		
		function validate(){
			if(document.login.user.value == ""){
				alert("请输入用户名！");
				document.login.user.focus();
				return false;
			}
			else if(document.login.psd.value == ""){
				alert("请输入密码！");
				document.login.psd.focus();
				return false;
			}else if(document.login.yzm.value == ""){
				alert("请输入验证码！");
				document.login.yzm.focus();
				return false;
			}
			return true;
		}
		
 
	//-->
</script>

		 
<div class="login">
<!--Emusic Login Here!--><h2 align="center"></h2>
<form class="logform" name="login" action="?pra=login" method="post" onsubmit="return validate();">

<table align="center" cellpadding="0px" cellspacing="10px">
<tr>
	<td class="lf">
	用户名
	</td>
	<td>
		<input type="text" name ="user"style="width:150px;height:20px;">
	</td>
</tr>
<tr>
	<td class="lf">
	密码
	</td>
	<td>
		<input type="password" name="psd" style="width:150px; height:20px;">
	</td>
</tr>
 
<tr  >
	<td>
		 
	</td>
	<td class="rg2">
		<input id="reg" style="width:50px; height:30px;"  type="reset" name="reg" value="重置">  
		<input id="sub" style="width:50px; height:30px;" type="submit" name="login" value="登录">  

	</td>
</tr>
</table>  
</form>
<?php
if(isset($_GET['pra']))
{
	if($_GET['pra']=="login")
	{
	 
					//echo "<script type=\"text/javascript\">alert(\"success\");</script>";
					
	
		include("core/database.php");
		$select=conn(); 
		$str="select password,uid from user where username='".$_POST['user']."';"; 
		$handle=mysql_query($str,$select)or die('查询错误'.mysql_error()); ;
		$row=mysql_fetch_row($handle);
		
		if(mysql_num_rows($handle)==0)
		{
		
			echo "<script type=\"text/javascript\">alert(\" 用户不存在 \");</script>";
		}else
		{
		 
			if($row[0]==$_POST['psd'])
			{
				$_SESSION['user']=$_POST['user'];
				$_SESSION['userID']=$row[1];
				echo "<script type=\"text/javascript\">alert(\"登陆成功!\"); gotoAdmin();</script>"; 	 
				
			}
			else
			echo   "<script type=\"text/javascript\">alert(\"密码错误!\");</script>";
 
		}
 
		echo "<script type=\"text/javascript\">gotoLogin();</script>"; 	 
	}
}
?>


</div>
 

</div>
 

 

</div>
</body>
</html>

