<?php

//define("CONSTRUCAO",1);

//Definicao para utilizacao do AJAX

define( "ARQUIVO", basename( $_SERVER['PHP_SELF'] ) );

//define( "WWW_ROOT", "D:".DIRECTORY_SEPARATOR."PROJETOS".DIRECTORY_SEPARATOR."sitesertao".DIRECTORY_SEPARATOR );
define( "WWW_ROOT", "../" );


ob_start();



include WWW_ROOT . "/_inc/_php/geral.inc.php";



$get = isset( $_POST['modulo'] ) ? $_POST : $_GET;



$acao = !empty( $get['acao'] ) ? $get['acao'] : INSERIR;

$modulo = $get['modulo'];

$id = isset( $get['id'] ) ? $get['id'] : NULL;

$nome = '';



$objModulo = new Modulo;

$obj = $objModulo->getObj( $modulo );


$extras = array();

$extras['breadcrumbs'] = array(

	$obj->getnomModulo() => "Lista.php?modulo=" . $get['modulo']

);



$form = new Formulario();



$t_debug = ob_get_clean();



if( isset( $t_debug ) )

	$smarty->assign('debug',$t_debug);



if( isset( $_SESSION['arrModulos'] ) && in_array( $get['modulo'], array_keys( $_SESSION['arrModulos'] ) ) )

	$nome = $_SESSION['arrModulos'][ $modulo ];



$alert = ( isset( $_GET['alert'] ) && $_GET['alert'] == 'ativo' ) ? '1': '0';

$smarty->assign( 'alert', $alert );



if( empty( $id ) )

	$extras['breadcrumbs'][ 'txt_novo_registro' ] = "";



$tplConteudo = $form->getTemplate( $obj, $acao, $id, 0, $extras );

$tplMenu = $form->getMenu();



/*

 * Estas linhas gera o breadcrumb.

 * o Helper:: estava dentro do assing fo trail. Eu retirei ele e coloquei em uma vari�vel para retorna os valores e

 * substitui-los pelo valor correto no foreach.

 * Isto foi feito para manter a compatibilidade da multi-linguagem.

 */



$varBreadCrumbs = Helpers::trail( $extras['breadcrumbs'] , true );



foreach( $varBreadCrumbs as $kBC => $vlBC ) {



	if( isset( $varBreadCrumbs[ $kBC ]['link'] ) || !isset( $_GET['id'] ) )

		$varBreadCrumbs[ $kBC ]['title'] = $lng[ $vlBC['title'] ];



}



$objPermissao = new Permissoes;

$objPermissao->setUsuario( $_SESSION['usr'] );

$objPermissao->setModulo( $modulo );

$objPermissao->setAcao( $acao );



$permissao = $objPermissao->getPerfilHasPermissaoHasAcao();



if( !$permissao ) {



	$objModulo = new Modulo;



	$modulo = $objModulo->getObj( $modulo );



	$smarty->assign( 'modulo_name', $modulo->getnomModulo() );

	$smarty->assign( 'acao', 'executar esta acao' );



	$tplConteudo = $smarty->fetch( 'tplPermissaoNegada.htm' );



}



$smarty->assign( 'trail', $varBreadCrumbs );

$smarty->assign( 'modulo',$modulo );

$smarty->assign( 'acao',$acao );

$smarty->assign( 'moduloAtual', $nome );

$smarty->assign( 'formulario', true );

$smarty->assign( "isDebug", ( isset( $_SESSION['debug'] ) ? 1 : 0 ) );

$smarty->assign( 'tplMenu', $tplMenu );

$smarty->assign( 'tplConteudo', $tplConteudo );

$smarty->display('LayoutPrincipal.htm');

?>