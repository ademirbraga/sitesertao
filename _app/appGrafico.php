<?php

if (!defined('WWW_ROOT')) define("WWW_ROOT", "../");



include(WWW_ROOT . "_inc/_php/geral.inc.php");



$modulo = isset( $_GET['modulo'] ) ? $_GET['modulo'] : null;

$metodo = isset( $_GET['metodo'] ) ? base64_decode( $_GET['metodo'] ) : 'getGrafico';



if( null === $modulo ) throw new Exception( 'M�dulo n�o informado' );



$objModulo = new Modulo;



$obj = $objModulo->getObj($modulo);



$grafico = $obj->$metodo();



$smarty->assign('grafico',$grafico);



$smarty->display('tplGrafico.htm');