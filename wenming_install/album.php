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
$("#addAlbum").click(function(){ 
 
var albumName=$("#albumName").val();
var albumCaption=$("#albumCaption").val(); 
 
$.post("ajaxDoc/addAlbum.php",{"albumName":albumName,
"albumCaption":albumCaption 
},function(data)
{ alert(data); 
 $("#albumName").val("");
 $("#albumCaption").val(""); 

}); 
}); 

});
</script> 
<div class="rightBox2"> 
<div class="rightcontent">
 
<div class="roomadmin">

<div class="newAlbum">
<table class="album" cellspacing="15px" cellpadding="5px">
	<tr>
		<td>相册名称 </td>
		<td><input type="text"id="albumName" class="textstyle"></td>
	</tr> 
	<tr>
		<td>相册说明</td>
	<td><textarea class="textareaStyle"id="albumCaption"  ></textarea> </td>
	</tr> 
	<tr>
		<td>&nbsp;</td>
		<td align="right"><input type="button" id="addAlbum" style="width:60px; height:30px" value="提交" ></td>
	</tr>
</table>
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

