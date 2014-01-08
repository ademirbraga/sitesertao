<?php
///////////////////session_start();

///////////////////session_destroy();

///////////////////unset($_SESSION);

ob_start();

define("AUTENTICACAO", false);

//Definicao para utilizacao do AJAX

define("ARQUIVO", basename($_SERVER['PHP_SELF']));

// Diretorio raiz

define( "WWW_ROOT", "../" );
//define( "WWW_ROOT", "D:".DIRECTORY_SEPARATOR."PROJETOS".DIRECTORY_SEPARATOR."sitesertao".DIRECTORY_SEPARATOR );
// Arquivo de constantes, configuracao e inicializacao

include(WWW_ROOT."_inc".DIRECTORY_SEPARATOR."_php".DIRECTORY_SEPARATOR."geral.inc.php");

$display = "style=display:none;";

$smarty->assign('display',$display);

//$idSession = md5(CHAVE_AUTENTICACAO.microtime());

//session_name($idSession);

//session_start();

session_start();

$_SESSION['usr']['cod_usuario'] = '';

session_destroy();

//unset($_SESSION['autenticacao']);

//Fim da camada de aplicacao

// Pega todo conteudo da buffer de saida

$t_debug = ob_get_contents();

// Limpa buffer de saida

@ob_clean();

// Template

//Alterar de acordo com a aplicacao

//$smarty->assign('tplConteudo', $conteudo);

$tplConteudo = $smarty->fetch('tplLogin.htm');

$smarty->assign('tplConteudo',$tplConteudo);

$smarty->assign('display', $display);  

$smarty->assign('caminho_js', PATH_INCLUDE_JS);

$smarty->assign('caminho_css', PATH_INCLUDE_CSS);

$smarty->display('Login.htm');
?>