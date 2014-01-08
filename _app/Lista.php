<?php

//Definicao para utilizacao do AJAX

ob_start();

define("ARQUIVO",basename($_SERVER['PHP_SELF']));

//define( "WWW_ROOT", "D:".DIRECTORY_SEPARATOR."PROJETOS".DIRECTORY_SEPARATOR."sitesertao".DIRECTORY_SEPARATOR );
define( "WWW_ROOT", "../" );

//include_once(WWW_ROOT."/_inc/_php/_class/Formulario.class.php");



$get = isset($_POST['modulo']) ? $_POST : $_GET;



include("appLista.php");

//include_once (INCLUDE_PHP_CLASS."/xajaxCliente.class.php");

//$_SESSION ['debug'] = SQL;

$smarty->assign('tplConteudo',$tplConteudo);



$t_debug = ob_get_clean();

$form = new Formulario();



if(@$_GET['menu']){

	$cod_cliente = (empty($_GET['filtro']['cod_cliente']) ? $_GET['cod_cliente'] : $_GET['filtro']['cod_cliente']);

    $smarty->assign('id',$cod_cliente);

}



if(@in_array($get['modulo'],@array_keys($_SESSION['arrModulos'])))

	$nome = $_SESSION['arrModulos'][$get['modulo']];

else

	$nome = '';



$objPermissao = new Permissoes;

$objPermissao->setUsuario( $_SESSION['usr'] );

$objPermissao->setModulo( $get['modulo'] );

$objPermissao->setAcao( LISTAR );



$permissao = $objPermissao->getPerfilHasPermissaoHasAcao();



if( !$permissao ) {



	$objModulo = new Modulo;



	$modulo = $objModulo->getObj( $get['modulo'] );



	$smarty->assign( 'modulo_name', $modulo->getnomModulo() );

	$smarty->assign( 'acao', 'listar' );



	$tplConteudo = $smarty->fetch( 'tplPermissaoNegada.htm' );



	$smarty->assign( 'tplConteudo', $tplConteudo );

	$smarty->display( 'LayoutPrincipal.htm' );

	exit;



}



$breadcrumbs = array(

	$NomModulo => ""

);



$tplMenu = $form->getMenu();

$t_debug = !defined("DEBUG") ? "" : DEBUG ? $t_debug : "";

$tplMenu = $form->getMenu();

if(isset($t_debug) && isset($_SESSION['debug']))

	$smarty->assign('debug',$t_debug);

$smarty->assign('tplMenu',@$tplMenu);





/* 

 * Estas linhas gera o breadcrumb.

 * o Helper:: estava dentro do assing fo trail. Eu retirei ele e coloquei em uma vari�vel para retorna os valores e

 * substitui-los pelo valor correto no foreach.

 * Isto foi feito para manter a compatibilidade da multi-linguagem.

 * Repare este � diferendo do Vizualiza.php

 */

$varBreadCrumbs = Helpers::trail( $breadcrumbs , true );

foreach ($varBreadCrumbs as $kBC  => $vlBC){

        if(isset($varBreadCrumbs[$kBC]['link'])){

                $varBreadCrumbs[$kBC]['title'] = $lng[$vlBC['title']];

        }

}



$smarty->assign( 'trail', $varBreadCrumbs );

$smarty->assign( 'moduloAtual', $nome );

$smarty->assign( 'listagem', true );

$smarty->assign( 'caminho_js', PATH_INCLUDE_JS );

$smarty->assign( 'caminho_css', PATH_INCLUDE_CSS );

$smarty->assign( "isDebug",(isset($_SESSION['debug']) ? 1 : 0 ) );

$smarty->assign( "UserSess", $_SESSION );

$smarty->display( 'LayoutPrincipal.htm' );



?>