 
{insert name="htmlHeader"}
 
<body>
<div class="tbody">

<div class="log">
{insert name="header"}
</div>
 
 
 {insert name="nav"}
 
 
<div class="content"> 
{literal} 
<script type="text/javascript">
$(document).ready(function(){ 
$(".nav2").click(function(){ 
var indexs=$(this).attr("id"); 
var index=(/\d+/).exec(indexs)[0];
 
$.post("ajaxDoc/getContent.php",{"indexId":index},function(data){
  
 $(".showRules").empty();
 $(".showRules").html(data);

});

});



});
</script> 
{/literal}
<div class="showRules">  
{$content} 
</div>
 

</div> 
<?php
include("view/common/footer.php");
?>
{insert name="footer"}

</div>
</body>
</html>

