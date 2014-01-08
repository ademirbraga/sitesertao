<?php

/**
 * Para ser utilizado com requisições ajax, informe os parametros:
 * 
 * modulo -> Módulo que será utilizado
 * method -> Metodo a ser chamado
 * args   -> Argumentos a serem passados para o metodo
 * 
 * O retorno é codificado com json_encode
 * 
 * Exemplo de uso com um select
 * $( "#cod_tipo_destino" ).change( function(){
 *
 *	var cod_tipo_destino = this.value;
 *	var dados = { cod_tipo_destino: cod_tipo_destino };
 *
 *	$.post( '../_ax/axRequest.php', { modulo: modulo, method: 'listarDestino', args: dados }, function( data ) {
 *		console.log( data );
 *		});
 *
 *	});
 */
session_start ();

ob_start ();

define ( "WWW_ROOT", "../" );

require_once WWW_ROOT . "_inc/_php/geral.inc.php";
require_once INCLUDE_PHP_FUNC . "/fctAx.php";

$moduloEnviado = isset( $_REQUEST['modulo'] ) && !empty( $_REQUEST['modulo'] ) ? $_REQUEST ['modulo'] : NULL;

$method = isset( $_REQUEST['method'] ) && !empty( $_REQUEST['method'] ) ? $_REQUEST['method'] : NULL;

$args = isset( $_REQUEST['args'] ) && !empty( $_REQUEST['args'] ) ? $_REQUEST['args'] : array();

$objModulo = new Modulo;
$obj = $objModulo->getObj( $moduloEnviado );

/**
 * Para segurança codifique o nome do metodo no template com base64_encode
 * 
 * Segue alguns nomes de funções da Database em base64_encode
 * inserir = aW5zZXJpcg==
 * atualizar = YXR1YWxpemFy
 * excluir = ZXhjbHVpcg==
 */
if( method_exists( $obj, base64_decode( $method ) ) )
	$method = base64_decode( $method );

if( !method_exists( $obj, $method ) )
	throw new Exception( 'O método solicitado não existe!' );

$args_values = array();	
if($args && is_array($args)) $args_values = array_values( $args );

try {
				
	$retorno = call_user_func_array( array( $obj, $method ), $args_values );
			
} catch (Exception $e) {
	
	$retorno = array(
		'Error'=> 	array(
			'code' => $e->getCode()
			, 'message' => $e->getMessage() 
		) 
	);	
}

$debug = ob_get_clean();

$json = array(
	'response' => $retorno,
	'debug' => $debug
);

Helpers::recursive_utf8_encode($json);

echo json_encode( $json );