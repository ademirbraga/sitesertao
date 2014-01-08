<?php

session_start();

//Definicao para utilizacao do AJAX
define("ARQUIVO", basename($_SERVER['PHP_SELF']));

// Diretorio raiz
//define("WWW_ROOT", "D:" . DIRECTORY_SEPARATOR . "PROJETOS" . DIRECTORY_SEPARATOR . "sitesertao" . DIRECTORY_SEPARATOR);
define( "WWW_ROOT", "../" );
// Arquivo de constantes, configuracao e inicializacao
include (WWW_ROOT . "_inc" . DIRECTORY_SEPARATOR . "_php" . DIRECTORY_SEPARATOR . "geral.inc.php");

include_once (WWW_ROOT . "_inc" . DIRECTORY_SEPARATOR . "_php" . DIRECTORY_SEPARATOR . "config.inc.php");

//Inicio da Camada de Aplicacao
//Alterar de acordo com a aplicacao
//Fim da camada de aplicacao
// Pega todo conteudo da buffer de saida

$t_debug = ob_get_contents();

$smarty->assign('caminho_js', PATH_INCLUDE_JS);

$smarty->assign('caminho_css', PATH_INCLUDE_CSS);

$smarty->assign('listagem', true);

$smarty->assign('debug', $t_debug);
$smarty->assign('ARQUIVO', ARQUIVO);

$tplConteudo = $smarty->fetch('index.htm');

$smarty->assign("tplConteudo", @$tplConteudo);

// Template
//Alterar de acordo com a aplicacao
$smarty->display('LayoutPrincipal.htm');
?>