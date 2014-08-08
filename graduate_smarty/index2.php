<?php
define('ROOT_PATH',dirname(__FILE__).'/');
//define('ROOT_PATH', 'c:xampp/htdocs/');  
define('APP_ROOT',ROOT_PATH.'\\');
include_once(APP_ROOT.'libs/Smarty.class.php');

include_once("core/database.php");

function insert_footer()
{
	 include("view/common/footer.php");
}
function insert_htmlHeader()
{
include_once("view/common/htmlHeader.php");
}
function insert_header()
{
include_once("view/common/header.php");
}
function insert_nav()
{
 include("view/common/nav.php"); 
}


$smarty=new Smarty;
$smarty->template_dir=APP_ROOT.'templates/';
$smarty->compile_dir=APP_ROOT.'templates_c/';
$smarty->config_dir=APP_ROOT.'configs/';
$smarty->cache_dir=APP_ROOT.'cache/'; 
$smarty->assign("content",getIndexValue("openLetter"));
$smarty->display("index.tpl");
?>

