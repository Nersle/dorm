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
 $("#file").click(function(){
$(".tips").remove();
 
});



});
</script> 
<div class="rightBox2"> 
<div class="rightcontent">
 
<div class="roomadmin"> 
<?php
if(isset($_POST['submit'])&&$_FILES['file']['size']<2000000)
{
	if($_FILES['file']["error"]>0)
	{
		echo "Eorror:".$_FILES['file']['name']."<br>";

	}else
	{
		if(!is_dir("upload"))
		{
			mkdir("upload",700);
		} 
		$filetype=substr(strrchr($_FILES['file']['name'],'.'),1);  

		$filename=time().rand(1000,9999).".".$filetype;
		
	/*	echo "Upload:".$_FILES['file']['name'];
		echo "Type:".$_FILES['file']['type'];
		echo "SIze:".$_FILES['file']['size']/1024;
		echo "Temp file:".$_FILES['file']['tmp_name'];
	*/	
		if(file_exists("upload/".$_FILES['file']['name']))
			echo $_FILES['file']['name']."aready exit！<br>";
		else
		{
			$result=move_uploaded_file($_FILES['file']['tmp_name'], 
			"upload/".$filename);
			if(!$result)
			{
				echo "<div class=\"tips\"> 上传失败！ </div>";
			
			}
			else
			{	
				//echo "保存在 "."upload/".$filename;
				
					$str="insert into photos (albumID,commentary,photoUrl) values(\"".$_POST['albumId']."\",\"".
					$_post['photoCaption']."\",\"upload/".$filename."\");";
					 
					$handle=mysql_query($str,$select)or die('querry error!'.mysql_error()); ;
					$num=mysql_affected_rows();
					if($num==0)
					{   
					 	echo "<div class=\"tips\"> 数据库插入错误！ </div>";
				
					 
					}
					else
					{	 	echo "<div class=\"tips\"> 图片添加成功！ </div>";
						 
					 
					}
				
			}
			
			
		
		}
	}
} 
?>

<?php
	include_once("core/database.php");
	$str="select albumId,albumName from album ORDER BY  albumId DESC ";
	$handle=mysql_query($str,$select)or die('querry error!'.mysql_error()); ;

	$num=mysql_num_rows($handle);
	$albumId=array();
	$albumIdName=array(); 
	if($num==0)
	{
	echo "<script type=\"text/javascript\">alert(\" 请先建立相册 \");</script>";
	echo "<script type=\"text/javascript\">gotoAlbum();</script>";
	}else
	{ while($row=mysql_fetch_row($handle))
		{
			$albumId[]=$row[0];
			$albumName[]=$row[1]; 
		} 
	} 
 
?>
<form action="?par=photo" method="post" enctype="multipart/form-data">
 <div class="upload">
<table class="uploadphoto" cellspacing="15px" cellpadding="5px">
	<tr>
		<td>文件 </td>
		<td><input  class="filebutton" class="files"  type="file" name="file" id="file">	</td>
	</tr> 
	<tr>
		<td>相册 </td>
		<td><select name="albumId">
		<?php
		$num=count($albumId);
	 
		while($num>0)
		{
		  makeOption($albumId[$num-1],"相册-".$albumName[$num-1]);	
		  $num--;
		}
			
		?>
 
		</select>
		</td>
	</tr> 
 
	<tr>
		<td>照片简介</td>
		<td><textarea name="photoCaption" class="textareaStyle" id="tickHost"  ></textarea> </td>
	</tr> 
	<tr>
		<td>&nbsp;</td>
		<td align="right"><input type="reset"  class="buttons2"  name="rst" value="取消" />
		<input name="submit" type="submit" class="buttons" value="提交" ></td>
	</tr>
</table>
</div>
 

</form> 
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

