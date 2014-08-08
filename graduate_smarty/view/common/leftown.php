 <?php
session_start();
if(!isset($_SESSION['user']))
{
echo "<script type=\"text/javascript\">alert(\"请先登录!\");gotoLogin();</script>"; 	 
}
 
?>
 
<ul class="leftNav">
	<li class="left_nav" ><a href="javascript:void(0);">信息发布</a>
	<ul>		
		<li class="left_nav2" ><a class="left_nav3" id="indexValue1" href="javascript:void(0);">致毕业生一封信</a></li>  
		<li class="left_nav2" ><a class="left_nav3"  id="indexValue2" href="javascript:void(0);">离校流程</a></li> 
		<li class="left_nav2" ><a class="left_nav3" id="indexValue3" href="javascript:void(0);">发运行李须知</a></li> 
		<li class="left_nav2" ><a class="left_nav3" id="indexValue4" href="javascript:void(0);">延期住宿安排</a></li> 
		<li class="left_nav2" ><a class="left_nav3" id="indexValue5" href="javascript:void(0);">行李寄存须知</a></li> 
		<li class="left_nav2" ><a class="left_nav3" id="indexValue6" href="javascript:void(0);">爱心捐赠倡议书</a></li> 
	</ul>
	</li>
	<li class="left_nav" ><a href="javascript:void(0);">系统管理</a>
		<ul>		
			<li class="left_nav2" ><a href="/graduate/index.php">返回首页</a></li> 
			<li class="left_nav2" ><a href="/graduate/logout.php">退出登录</a></li> 
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
		$.post("../ajaxDoc/dropRecord.php",{"parameter":"room"}
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
		$.post("../ajaxDoc/dropRecord.php",{"parameter":"person"}
		,function(data)
		{
		
			alert(data);
		
		});	
	}

});


});

</script>



















