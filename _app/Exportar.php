<?php

ini_set('memory_limit', '1024M');
set_time_limit(300);

define ( "WWW_ROOT", "../" );

require_once WWW_ROOT . "_inc/_php/config.inc.php";
require_once WWW_ROOT . "_inc/_php/geral.inc.php";
require_once INCLUDE_PHP_FUNC . "/fctAx.php";

require_once WWW_ROOT.'_inc/_php/_libs/PHPExcel/PHPExcel.php';
require_once WWW_ROOT.'_inc/_php/_libs/fpdf17/fpdf.php';
require_once WWW_ROOT.'_inc/_php/_libs/fpdfTable.php';
require_once WWW_ROOT.'_inc/_php/_libs/MPDF52/mpdf.php';
require_once WWW_ROOT.'_inc/_php/_class/Export.class.php';

$modulo = NULL;


if( isset( $_REQUEST['modulo'] ) && (int)$_REQUEST['modulo'] ) {
	$modulo = (int)$_REQUEST['modulo'];
} else if( isset( $_REQUEST['f_mod'] ) && (int)$_REQUEST['f_mod'] ) {
	$modulo = (int)$_REQUEST['f_mod'];
}

$metodo = isset( $_REQUEST['metodo'] ) && !empty( $_REQUEST['metodo'] ) ? base64_decode($_REQUEST['metodo']) : NULL;

$filtros = isset( $_REQUEST['filtros'] ) && !empty( $_REQUEST['filtros'] ) ? $_REQUEST['filtros'] : NULL;

$convertTo = isset( $_REQUEST['convertTo'] ) && !empty( $_REQUEST['convertTo'] ) ? (string)$_REQUEST['convertTo'] : 'CSV';

// url, data
$convertFrom = isset( $_REQUEST['convertFrom'] ) && !empty( $_REQUEST['convertFrom'] ) ? (string)$_REQUEST['convertFrom'] : 'data';

$objPermissao = new Permissoes;
$objPermissao->setUsuario( $_SESSION['usr'] );
$objPermissao->setModulo( $modulo );
$objPermissao->setAcao( EXPORTAR );

$permissao = $objPermissao->getPerfilHasPermissaoHasAcao();

if( !$permissao ) {
	echo 'Você não tem permissão para exportar estas informações.';
	die;	
}	

if( $convertFrom == 'html' ) {
	
	$cookie = session_name() . '=' . session_id() ;
	session_write_close();
	
	$_REQUEST['export'] = 1;
	$post = $_REQUEST;	
	
	$source = Helpers::curl_post($_SERVER['HTTP_REFERER'], $post, $cookie );

	
} else if ( $convertFrom == 'data' ) {	
	
	$objModulo = new Modulo;
	$obj = $objModulo->getObj( $modulo );
	
	if( !method_exists( $obj, $metodo ) ) {
		
		throw new Exception( 'O método solicitado não existe!' );
	
	}
		
	parse_str($filtros, $filtros);	

	$filtros['export'] =  true;
	$args['filtros'] = $filtros;
	$args['exec'] = true;
	$args['export'] = true;	
		
	if( $args && is_array($args) ) $args_values = array_values( $args );

	$source = call_user_func_array( array( $obj, $metodo ), $args_values );	
	
}	

Export::convertTo( $source, $convertTo, $convertFrom );


exit;