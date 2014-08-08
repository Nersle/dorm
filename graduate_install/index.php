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
<script type="text/javascript">
$(document).ready(function(){ 
$(".nav2").click(function(){ 
var indexs=$(this).attr("id"); 
var index=(/\d+/).exec(indexs)[0];
//alert(index);
$.post("ajaxDoc/getContent.php",{"indexId":index},function(data){
 //alert(data); 
 $(".showRules").empty();
 $(".showRules").html(data);

});

});



});
</script> 
<div class="showRules">

<?php
 echo getIndexValue("openLetter");
?>

 
 
</div>
 

</div> 
<?php
include("view/common/footer.php");
?>

</div>
</body>
</html>

