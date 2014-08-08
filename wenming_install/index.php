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
<div class="leftBox">
<div class="photos2">
<ul class="ablum">
<?php
$name=array();
$caption=array();
$albumId=array();
$sql="select albumId,albumName,caption from album";
$handle=mysql_query($sql,$select)or die('querry error!'.mysql_error()); ;

$num=mysql_num_rows($handle);
 
if($num==0)
{
echo "<script type=\"text/javascript\">alert(\" 没有相册，请先建立相册！ \");</script>";
}else
{
	 
	for($i=0;$i<$num;$i++)
	{	
		$row=mysql_fetch_row($handle); 
		$albumId[]=$row[0];
		$name[]=$row[1];
		$caption[]=$row[2];
		
	}
}
 
$href="javascript:void(0);";
 
 
$str0="<li class=\"photo\" id=\"ablum";
$st1="\" ><a href=\"";
$str3="\">";
$str4="<div class=\"photoCaption\" id=\"cap";

$str5="\">";
$str6="</div></a></li>";
for($i=0;$i<$num;$i++)
	echo $str0.$albumId[$i].$st1.$href.$str3."相册编-".$name[$i].$str4.$albumId[$i].$str5.$caption[$i]
	.$str6;

?>
</ul>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){

$(".photoCaption").hide();
$(".photo").click(function(){
$(".photoCaption").hide(); 
var indexs=$(this).attr("id"); 
var index=(/\d+/).exec(indexs)[0];
var newIndex="cap"+index; 
$("#"+newIndex).show(); 

var nextAlbumId=index;


 $.post("ajaxDoc/ajaxPhoto.php",{"albumID":nextAlbumId},function(data){
  
   //alert(data);
   dataobj=eval(data);
   dnum=dataobj[0][0]["num"] ;
   
   var imgid="img";
   var newid="";  
   $(".pikachoose2").empty();
   $("<div class=\"pikachoose3\"></div>").appendTo(".pikachoose2");
   $("<ul id=\"myGallery\"></ul>").appendTo(".pikachoose3");
   for(i=0;i< dnum;i++)
   {
	newid=imgid+i;
	//$("#"+newid+" img").src=dataobj[i+1][0]["photoUrl"];
	//$("#"+newid+" span").html( dataobj[i+1][1]["commentary"]);
	 $("<li><img src=\""+dataobj[i+1][0]["photoUrl"]+"\"/></li>").appendTo("#myGallery");
   }
   
		$('#myGallery').galleryView({
			transition_speed: 1000, 		//INT - duration of panel/frame transition (in milliseconds)
			transition_interval: 1000, 
            panel_width: 600,
            panel_height: 400,
            frame_width: 100,
            frame_height: 100,
            easing: 'swing',
			panel_animation: 'fade', 
			overlay_position: 'bottom', 
			show_panels: true, 				//BOOLEAN - flag to show or hide panel portion of gallery
		show_panel_nav: true, 
		enable_overlays: true, 	
			autoplay:true,
			filmstrip_position: 'bottom',
            pause_on_hover: true,
            nav_theme: 'dark',
			panel_scale: 'crop', 
			show_infobar: true,	
pan_images: false,				//BOOLEAN - flag to show or hide infobar
		infobar_opacity: 1,
background_color:'white',		
enable_slideshow: true,
 
            overlay_opacity: 0.5,
            overlay_height: 10

	});
   


});
});

});
</script> 
<div class="rightBox"> 
<div class="righttop">
<img id="righttop"height="45px" width="700px" src="static/image/fengcai.jpg">
</div>
<div class="ppt">
<div class="ppttop">
<img  height="9px" width="690px" src="static/icon/head.jpg">
</div>
<div class="pptcontent">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

<!-- Second, add the Timer and Easing plugins -->
<script type="text/javascript" src="galleryview/js/jquery.timers-1.2.js"></script>
<script type="text/javascript" src="galleryview/js/jquery.easing.1.3.js"></script>

<!-- Third, add the GalleryView Javascript and CSS files -->
<script type="text/javascript" src="galleryview/js/jquery.galleryview-3.0-dev.js"></script>
<link type="text/css" rel="stylesheet" href="galleryview/css/jquery.galleryview-3.0-dev.css" />
<script language="javascript">
	$(function(){
		$('#myGallery').galleryView({
			transition_speed: 1000, 		//INT - duration of panel/frame transition (in milliseconds)
			transition_interval: 1000, 
            panel_width: 600,
            panel_height: 400,
            frame_width: 100,
            frame_height: 100,
            easing: 'swing',
			panel_animation: 'fade', 
			overlay_position: 'bottom', 
			show_panels: true, 				//BOOLEAN - flag to show or hide panel portion of gallery
		show_panel_nav: true, 
		enable_overlays: true, 	
			autoplay:true,
			filmstrip_position: 'bottom',
            pause_on_hover: true,
            nav_theme: 'dark',
			panel_scale: 'crop', 
			show_infobar: true,	
pan_images: false,				//BOOLEAN - flag to show or hide infobar
		infobar_opacity: 1,
background_color:'white',		
enable_slideshow: true,
 
            overlay_opacity: 0.5,
            overlay_height: 10

	});
	});
</script>

<div class="pikachoose2">
<div class="pikachoose3">
<ul id="myGallery">
<?php

include_once("core/database.php");
$str="select photourl from photos where albumID=(select min(albumID) from photos);";
	$handle=mysql_query($str,$select)or die('querry error!'.mysql_error()); ;
	$num=mysql_affected_rows();
	if($num==0)
	{   
		echo "数据库查询错误";
	}
	else
	{
		while($row=mysql_fetch_row($handle))
		{
			echo "<li><img src=\"".$row[0]."\"/></li>"; 
		}
		 
	}

?>
<!--优秀寝室展览-->

 
	</ul>
	
</div>
</div>
</div>

<div class="ppttail">
<img  height="9px" width="690px" src="static/icon/foot.jpg">
</div>

</div>

 </div>
<?php
include("view/common/footer.php");
?>
</div>
</body>
</html>

