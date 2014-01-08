<?php



define("AUTENTICACAO",false);

define("ARQUIVO",basename($_SERVER['PHP_SELF']));

define("WWW_ROOT","../");

include(WWW_ROOT."/_inc/_php/geral.inc.php");

include_once(WWW_ROOT."/_inc/_php/config.inc.php");



$erro = $_GET['erro'];

$display = "style=display:none;";

$next = explode('next=',$_SERVER['REQUEST_URI']);

if(isset($next[1])){

    $next='?next='.$next[1];

}

else $next = '';

$link = "Clique <a href='appLogin.php$next'>aqui</a> para acessar o sistema.";

switch($erro)

{

	case ERRO_PERMISSAO:  $link = "Clique <a href='javascript:history.go(-1);' >aqui</a> para voltar.";break;

	case ERRO_GERACAO_BOLETO: $link = "<a href='javascript:void(0)' onClick='javascript:window.close();'>Fechar</a>."; break;	

	case ERRO_ACESSO_CANCELADO: $link = ""; break;

	case ERRO_VAZIO: break;

	case ERRO_ACESSO_EXPIRADO: $conteudo = $smarty->fetch('tplLogin.htm');break;

	case AVISO_LIMITACAO:  $link = "Clique <a href='javascript:history.go(-1);' >aqui</a> para voltar.";break;

}

$mensagem = $erro ? $INFO_ERRO[$erro] : "";



//Camada de apresentacao

if(!isset($conteudo))

$conteudo = "<center>

			<h1>{$mensagem}</h1>

			$link

		</center>";

else $conteudo = "<center>

			<h1>{$mensagem}</h1>

			$link

		</center>";

$smarty->assign('tplConteudo',$conteudo);



$smarty->assign('display',$display);

	$smarty->assign('caminho_js', PATH_INCLUDE_JS);

$smarty->assign('caminho_css', PATH_INCLUDE_CSS);

$smarty->display('Login.htm');

?>

