<?php
include_once("view/common/htmlHeader.php");
?>
<body>
<div class="tbody">

<div class="log">
<?php
include_once("view/common/header.php");
?>
</div>
 
<?php
 include("view/common/nav.php"); 
?>
 
<div class="content"> 
<div class="leftBoxadmin">
<?php
include_once("view/common/leftown.php");
?>
 
</div>
<script type="text/javascript">
$(document).ready(function(){
$(".left_nav").mouseover(function(){
 
$(this).find(".left_nav2").show();
});
$(".left_nav").mouseout(function(){
 
$(this).find(".left_nav2").hide();
});
$("#submitRule").click(function(){ 
var rules=$("#elm3").val();
 
$.post("ajaxDoc/storeRules.php",{"rules":rules},function(data)
{
	alert(data);

});

});
$('#elm3').xheditor({tools:'simple'});





});
</script> 
 
<div class="rightBox2"> 
<div class="rightcontent">
 
<div class="roomadmin">
<div class="roomtext">
<?php
	include_once("core/database.php");
	$textValue="";
	$str="select indexValue from systemrule  where indexName='rules';"; 
 
	$handle=mysql_query($str,$select)or die('querry error!'.mysql_error()); ;
	$num=mysql_affected_rows();
	if($num==0)
	{   
		echo "查询失败！";
	}
	else
	{
		  $textValue=mysql_fetch_row($handle);
	}


?>
<form action="" method="post">
<textarea id="elm3" name="elm3" class="xtext"  > 
<?php
echo $textValue[0];
?>
</textarea>
<div class="rulesubmit">
 <input  class="buttonRule" id="submitRule" type="button" value="提交" name="subrule"/>
 <input class="buttonRule" type="reset" value="清空"/>  
</div>
</form>

</div>
</div>
</div>
 

 </div>
<?php
include("view/common/footer.php");
?>
</div>
</div>
</body>
</html>

