<?php

session_start();

ob_start();

define("WWW_ROOT", "../");

require_once ( WWW_ROOT."_inc/_php/config.inc.php" );

require_once ( WWW_ROOT."_inc/_php/_libs/funcMail.php" );

require_once ( INCLUDE_PHP_FUNC . "/fctAx.php" );

//$_SESSION['debug']=SQL;

$login   = htmlspecialchars($_POST['login'],ENT_QUOTES);

$senha   = $_POST['senha'];

$email   = $_POST['esqueci'];

//$captcha = $_POST['captcha'];


if( empty($email) ){

	$usuario = new SisUsuario();	

	$acesso = new Autenticacao($usuario,$login,$senha,AJAX_REDIR);

	$txtDbg = ob_get_clean();

	if($acesso->isAutenticado()){
		echo '{"resposta":"yes","dbg":'.json_encode($txtDbg).'}';

	}else{
		echo '{"resposta":"no","dbg":'.json_encode($txtDbg).'}';

	}

}else{

	// Se solicitado para relembrar senha
	$usuario = new SisUsuario();

	$emailValido = $usuario->recordCount("nom_email='{$email}'");	

	$txtDbg = ob_get_clean();	

	/**
	 * Importante: Os valores comentados no trecho abaixo ( $destinatario, $novaSenha ) favor substituir pelos 
	 * atuais quando for entrar em versao final ( Producao ) do sistema
	 * 
	 * */	

	if( $emailValido && $captcha == $_SESSION['txt_captcha']){

		$dados = $usuario->consulta("cod_usuario,nom_email,nom_login",TSISUSUARIO,null,"nom_email='{$email}'",null,null)->getRegistro();

		$destinatario = $dados['nom_email'];
	

		$dados['nom_senha'] = substr( md5( str_shuffle('abcdef0123456789') ),0,6 );	// Cria a nova senha	

		$mensagem = "<strong>Login: </strong>{$dados['nom_login']}<br/>";		

		$mensagem .= "<strong>Senha: </strong>{$dados['nom_senha']}<br/>";

		enviarNotificacao('',"BhsTouche - Alteracao de Senha",$mensagem,$destinatario); // Executa o envio		

		$dados['nom_senha'] = md5($dados['nom_senha']);		

		$update_usuario = $usuario->atualizar($dados, "cod_usuario = {$dados['cod_usuario']} AND nom_email = '{$email}'"); 

		echo '{"resposta":"yes","dbg":'.json_encode($txtDbg).'}';		
	}else{	
		echo '{"resposta":"no","dbg":'.json_encode($txtDbg).'}';
	}	
}
exit;
?>