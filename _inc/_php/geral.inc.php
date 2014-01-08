<?php
ob_start();

if(!defined("__GERAL__")){

	define("__GERAL__",1);

	session_start(); 

}

$debug = @$_SESSION['debug'];

$xxajax = "";

require_once("config.inc.php");

require_once( "Linguagem.php" );

require_once( "msgsTip.php" );

/**

* _inc das bibliotecas

*/

include_once(INCLUDE_SMARTY);

$login = !empty($_POST['login']) ? addslashes($_POST['login']) : "";

$senha = !empty($_POST['senha']) ? addslashes($_POST['senha']) : "";

//$_SESSION['debug'] = SQL;

$usuario = new SisUsuario();

$SESSAO = isset($SESSAO) ? $SESSAO : true;

if($SESSAO){

	$acesso = new Autenticacao($usuario,$login,$senha,REDIR_MODE);
}

/**

echo "<pre>";

print_r($acesso);

echo "</pre>";die;

/**/

$tamanhoLimitado = true;

$tamanhoMax = 4000000; //tamanho maximo do arquivo em bytes

$extensoesLimitadas = true;

$extensoes = array(".csv",".txt",".ret");



$smarty = new Smarty();



$smarty->template_dir = DIR_SMARTY."/_templates";

$smarty->compile_dir = DIR_SMARTY."/_templates_tmp";

$smarty->cache_dir = DIR_SMARTY."/_cache";

$smarty->config_dir = DIR_SMARTY."/_configs";	



//Inicio da Camada de Aplicacao

//Alterar de acordo com a aplicacao



$smarty->assign("PF",PF);

$smarty->assign("PJ",PJ); 

$smarty->assign("CADASTRAR",CADASTRAR);

$smarty->assign("EDITAR",EDITAR);

$smarty->assign("EXCLUIR",EXCLUIR);

$smarty->assign("VISUALIZAR",VISUALIZAR);

$smarty->assign("CANCELAR",CANCELAR);



$smarty->assign("PATH_DOCUMENTACAO",PATH_DOCUMENTACAO);

$smarty->assign("IMAGES",IMAGES);

$smarty->assign("IMAGES_ICONS",IMAGES_ICONS);

$smarty->assign("PATH_inc_CSS",PATH_inc_CSS);



$smarty->assign("WWW_ROOT",WWW_ROOT);

$smarty->assign("WWW",WWW);

$smarty->assign("URL_SITE",URL_SITE);



$smarty->assign("MOSTRAR_LIMITES", MOSTRAR_LIMITES);



$smarty->assign("JS",JS);



$smarty->assign("arrDados_Usuario", $_SESSION['usr']);

$cod_revenda = ($_SESSION['usr']['cod_usuario'] == 1) ? 0 : 1;

$smarty->assign("Revenda", $cod_revenda);

$smarty->assign("infoUser", @$info_User);

$smarty->assign("administrador", ISADMINISTRADOR);

$smarty->assign("exibir_icone", EXIBIR_ICONE);



$smarty->assign("nomProjeto", 'Site Sertao');

$smarty->assign("AnoProjeto", 2013);



$lng = $Linguagem['pt_br'];

$smarty->assign("lng", $lng);



$smarty->assign("TipAjuda", $TipAjuda);

$smarty->assign("UserSess", $_SESSION);



if(isset($acesso) && is_object($acesso) && $acesso->isAutenticado()){

	$display = "style=display:block;";

	$smarty->assign('menu',true);

}else{

	$display = "style=display:none;";

	$smarty->assign('menu',false);

}

$smarty->assign('display',$display);

//Enviando para as configuracoes qual pagina setar
$smarty->assign("SETPAGE", basename( $_SERVER['PHP_SELF'] ) );


require_once("modulos.inc.php");

$debug_geral = ob_get_clean();

// @ob_clean ();

 if($debug&INFO) $smarty->assign('t_debug',$debug_geral);

 //@ob_end_flush(); //nao sei porque a meleca do ajaz nao aceita esta funcao

?>