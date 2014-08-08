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
makeHideNode("hideIndexId", 0);
</script>
<script type="text/javascript">
$(document).ready(function(){ 
$(".left_nav").mouseover(function(){ 
$(this).find(".left_nav2").show();
});
$(".left_nav").mouseout(function(){ 
$(this).find(".left_nav2").hide();
});
$("#submitRule").click(function(){ 
var indexValue=$("#elm3").val();
var indexName=$("#hideIndexId").val();

 
$.post("ajaxDoc/setContent.php",{"indexValue":indexValue,"indexName":indexName},function(data)
{
	alert(data);

});

});
$('#elm3').xheditor({tools:'simple'});
$(".left_nav3").click(function(){
 
var indexs=$(this).attr("id"); 
var index=(/\d+/).exec(indexs)[0];
$("#hideIndexId").val(index);
 //alert(index);
$.post("ajaxDoc/getContent.php",{"indexId":index},function(data){
 //alert(data); 
 
 $("#elm3").empty();
 $("#elm3").val(data);

});
}); 

});
</script> 
 
<div class="rightBox2"> 
<div class="rightcontent">
 
<div class="roomadmin">
<div class="roomtext">
<?php 
	$textValue="单击修改左边信息发布菜单编辑发布信息"; 
?>
<form action="" method="post">
<textarea id="elm3" name="elm3" class="xtext"  > 
<?php
echo $textValue;
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

