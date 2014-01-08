<?php

session_start();

define("WWW_ROOT", "../");

require_once(WWW_ROOT."_inc/_php/geral.inc.php");
require_once (INCLUDE_PHP_FUNC . "/fctAx.php");
ob_start();

//$_SESSION['debug']=SQL;
//print_r($_POST);
$objModulo = new Modulo();                      
$moduloUsado = $objModulo->getObj( $_POST['f_mod'] );
$OK = false;    
$id = 0;
$template = '';

if( $moduloUsado ) {

	$acao = EDITAR;
    if( isset( $_POST['f_action'] ) ){
    	$acao = $_POST['f_action'];
    }
    	    
    $reload = true;
    if(isset($_POST['f_reload'])){
    	$reload = (bool)$_POST['f_reload'];
    }	
   
    $id = $moduloUsado->inserir( $_POST, true );
   
	if( isset($id) && $id > 0 ) {
		
		$OK = true;
		if($reload){                    
			$objFormulario = new Formulario;                                                                        
	   		$template = $objFormulario->getTemplate( $moduloUsado, $acao, $id );
                        
                        
		}
	}

}

$txtDbg = ob_get_clean();

if( $OK ){
	
	$retorno = array(
		'resposta' => 'yes'
		,'id' => $id
		,'dbg' => $txtDbg
		,'content' => $template
	);			
	
} else {
	$retorno = array(
		'resposta' => 'no'
		,'id' => $id
		,'dbg' => $txtDbg
	);
}
//echo $txtDbg;
//print_r($retorno);echo "aq";
recursive_utf8_encode($retorno);
//die;
echo json_encode($retorno);
?>