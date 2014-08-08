 <?php
session_start();
if(!isset($_SESSION['user']))
{
echo "<script type=\"text/javascript\">alert(\"请先登录!\");gotoLogin();</script>"; 	 
}
 
?>
 
<ul class="leftNav">
	<li class="left_nav" ><a href="javascript:void(0);">优秀寝室</a>
	<ul>		
		<li class="left_nav2" ><a href="/wenming/admin.php">寝室信息录入</a></li>  
		<li class="left_nav2" ><a id="dropRoom" href="javascript:void(0);">清空全部记录</a></li> 
	</ul>
	</li>
	<li class="left_nav" ><a href="javascript:void(0);">优秀个人</a>
	<ul>		
		<li class="left_nav2" ><a href="/wenming/adminPerson.php">个人信息录入</a></li>  
		<li class="left_nav2" ><a id="dropPerson" href="javascript:void(0);">清空全部记录</a></li> 
	</ul>
	</li>
	<li class="left_nav" ><a href="javascript:void(0);">规则说明</a>
	<ul>		
		<li class="left_nav2" ><a href="/wenming/rule.php">修改规则</a></li> 
	</ul>
	</li>
	<li class="left_nav" ><a href="javascript:void(0);">风采相册</a>
		<ul>		
			<li class="left_nav2" ><a href="/wenming/album.php">新建相册</a></li> 
			<li class="left_nav2" ><a href="/wenming/deleteAlbum.php">删除相册</a></li> 
		</ul>
	</li>
	<li class="left_nav" ><a href="javascript:void(0);">风采图像</a>
		<ul>		
			<li class="left_nav2" ><a href="/wenming/photo.php">上传图像</a></li> 
		</ul>
	</li>
	<li class="left_nav" ><a href="javascript:void(0);">系统管理</a>
		<ul>		
			<li class="left_nav2" ><a href="/wenming/logout.php">退出登录</a></li> 
		</ul>
	</li>

 
</ul>
<script type="text/javascript">
$(document).ready(function(){
$("#dropRoom").click(function()
{
 
	var answer=confirm("确定删除所有公寓文明寝室和特色寝室信息？操作不可恢复!!");
	if(answer==true)
	{
		$.post("ajaxDoc/dropRecord.php",{"parameter":"room"}
		,function(data)
		{ alert(data);
		
		});	
	}


});

$("#dropPerson").click(function()
{
	var answer=confirm("确定删除所有最佳值日生和最佳寝室长信息?操作不可恢复");
	if(answer==true)
	{
		$.post("ajaxDoc/dropRecord.php",{"parameter":"person"}
		,function(data)
		{
		
			alert(data);
		
		});	
	}

});


});

</script>



















