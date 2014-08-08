<?php
define('ROOT_PATH',dirname(__FILE__).'/');
//define('ROOT_PATH', 'c:xampp/htdocs/');  
define('APP_ROOT',ROOT_PATH.'graduate/');
include_once(APP_ROOT.'libs/Smarty.class.php');
 
$smarty=new Smarty;
$smarty->template_dir=APP_ROOT.'templates/';
$smarty->compile_dir=APP_ROOT.'templates_c/';
$smarty->config_dir=APP_ROOT.'configs/';
$smarty->cache_dir=APP_ROOT.'cache/'; 
?>