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
<div class="rightBoxrules"> 
 
 
<div class="showRules">

<?php
include_once("core/database.php");
$str="select indexValue from systemRule where indexName='rules';";
$handle=mysql_query($str,$select)or die('querry error!'.mysql_error()); ;

$num=mysql_num_rows($handle);
 
if($num==0)
{
echo "<script type=\"text/javascript\">alert(\" not exsit usr \");</script>";
}else
{
	$row=mysql_fetch_row($handle);
	echo $row[0];

}
?>

 
 
</div>
</div>
 

 </div>
<?php
include("view/common/footer.php");
?>
</div>
</body>
</html>

