<?php

	defined( 'WWW_ROOT' ) || define( "WWW_ROOT", "../" );

	include WWW_ROOT . "_inc/_php/geral.inc.php";

	$modulo = isset( $_GET['modulo'] ) ? $_GET['modulo'] : null;
	$metodo = isset( $_GET['metodo'] ) ? base64_decode( $_GET['metodo'] ) : 'listar';

	if( null === $modulo )
		throw new Exception( 'M�dulo n�o informado' );

	$objRelatorio = new Relatorio( $modulo, $metodo );

	$filtros = $objRelatorio->getFiltros();
	
	$objModulo = new Modulo;

	$obj = $objModulo->getObj($modulo);

	$smarty->assign( 'filtros', $filtros );
	$smarty->assign( 'nom_relatorio', $obj->getnomModulo() );
	$smarty->assign( 'modulo', $modulo );
	$smarty->assign( 'metodo', $metodo );

	$tplConteudo = $smarty->fetch( "tplRelatorioLoginAgentes.htm" );

?>
