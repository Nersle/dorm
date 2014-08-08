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
$(".deleteAlbum").click(function(){
var answer=confirm("确定删除相册和图片信息？操作不可恢复!!");
if(answer==true){ 
var indexs=$(this).attr("id");
var albumId=(/\d+/).exec(indexs)[0];
 
 
$.post("ajaxDoc/deleteAlbum.php",{"albumId":albumId 
},function(data)
{ alert(data); 
 location.reload();

}); 
}
});

});
</script> 
<div class="rightBox2"> 
<div class="rightcontent">
 
<div class="roomadmin">  
<?php
	include_once("core/database.php");
	$str="select albumId,albumName,caption from album";
	$handle=mysql_query($str,$select)or die('querry error!'.mysql_error()); ;

	$num=mysql_num_rows($handle);
	$albumId=array();
	$albumIdName=array(); 
	$caption=array(); 
	if($num==0)
	{
	echo "<script type=\"text/javascript\">alert(\"没有相册，请先建立相册 \");</script>";
	}else
	{ while($row=mysql_fetch_row($handle))
		{
			$albumId[]=$row[0];
			$albumName[]=$row[1]; 
			$caption[]=$row[2];
		} 
	} 
 
?>
 
 <div class="delete">
<table border="1px" class="uploadphoto" cellspacing="0px" cellpadding="5px">
<tr>
	<th>相册名称</th>
	<th>相册简介</th>
	<th>操作</th>
</tr> 
		<?php
		$num=count($albumId);
	 
		while($num>0)
		{ 
		  echo "<tr>";
		  echo "<td>".$albumName[$num-1]."</td>"; 
		  echo "<td>".$caption[$num-1]."</td>";
		  echo "<td><a class=\"deleteAlbum\" href=\"javascript:void(0);\" id=\"deleteAblum".$albumId[$num-1]."\">删除</a></td>";
		  echo "</tr>";
		  $num--;
		} 
		?>  
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

