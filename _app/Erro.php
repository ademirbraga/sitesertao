<?php
date_default_timezone_set('America/Sao_Paulo');

define( "ARQUIVO", basename( $_SERVER['PHP_SELF'] ) );
define( "WWW_ROOT", "../" );

ob_start();

include WWW_ROOT . "_inc/_php/config.inc.php";
include_once(INCLUDE_SMARTY);

$smarty = new Smarty();

$smarty->template_dir = DIR_SMARTY . "/_templates";
$smarty->compile_dir = DIR_SMARTY . "/_templates_tmp";
$smarty->cache_dir = DIR_SMARTY . "/_cache";
$smarty->config_dir = DIR_SMARTY . "/_configs";

$smarty->assign('listagem', true);
$smarty->display( 'tplErro.htm' );