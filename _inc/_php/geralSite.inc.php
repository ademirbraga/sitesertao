<?php
error_reporting(0);

if (@$_GET ['auth'] == '') {
	ob_start ();
	if (! defined ( "__GERAL__" )) {
		define ( "__GERAL__", 1 );
		session_start ();
	}
}

require_once ("config.inc.php");


$login = ! empty ( $_POST ['nom_login_acesso'] ) ? addslashes ( $_POST ['nom_login_acesso'] ) : "";
$senha = ! empty ( $_POST ['nom_senha_acesso'] ) ? addslashes ( $_POST ['nom_senha_acesso'] ) : "";
$cod_cliente_tipo = ! empty ( $_POST ['cod_cliente_tipo'] ) ? addslashes ( $_POST ['cod_cliente_tipo'] ) : "";

$SESSAO = isset ( $SESSAO ) ? $SESSAO : true;
if (@$_GET ['auth'] == '') {
    
	if ($SESSAO) {
	   
		$acesso = new AutenticacaoSite ( new TabCliente( ), $login, $senha, REDIR_MODE,$cod_cliente_tipo );			    
		 
	}
}
?>