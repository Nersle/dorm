<?php session_start();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head profile="http://gmpg.org/xfn/11">
   <meta http-equiv="Content-Type" content="text/html ; charset=utf-8" /> 
   <meta name="Copyright" content="Copyright (c) 2012 | 05 | 16" />  
   <link type="text/css" rel="stylesheet" href="css/main.css" media="screen" />
	<script type="text/javascript" src="js/jquery1.6.2.min.js"></script>  
	<script type="text/javascript" src="js/main.js"></script>

	
   <title>离校毕业指南</title>
</head> 
  
<body> 
 
<?php 
unset($_SESSION['user']);
@header('Content-Type:text/html;charset=utf-8'); 
echo 	'<script type="text/javascript">alert("成功退出登录！"); </script>';
echo "<script type=\"text/javascript\">gotoIndex();</script>"; 	 
?> 
</body>
</html>



