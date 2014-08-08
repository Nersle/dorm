<?php /* Smarty version Smarty-3.1.10, created on 2012-06-18 20:09:16
         compiled from "C:\xampp\htdocs\graduate\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:232554fdf12b1bd7e15-11110554%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a25111d1af8683e7bd1970f7ace5778cd160b50' => 
    array (
      0 => 'C:\\xampp\\htdocs\\graduate\\templates\\index.tpl',
      1 => 1340021355,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '232554fdf12b1bd7e15-11110554',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4fdf12b1cdf377_39325716',
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fdf12b1cdf377_39325716')) {function content_4fdf12b1cdf377_39325716($_smarty_tpl) {?> 
<?php echo insert_htmlHeader(array(),$_smarty_tpl);?>

 
<body>
<div class="tbody">

<div class="log">
<?php echo insert_header(array(),$_smarty_tpl);?>

</div>
 
 
 <?php echo insert_nav(array(),$_smarty_tpl);?>

 
 
<div class="content"> 
 
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

<div class="showRules">  
<?php echo $_smarty_tpl->tpl_vars['content']->value;?>
 
</div>
 

</div> 
<<?php ?>?php
include("view/common/footer.php");
?<?php ?>>
<?php echo insert_footer(array(),$_smarty_tpl);?>


</div>
</body>
</html>

<?php }} ?>