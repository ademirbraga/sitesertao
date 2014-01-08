<?php

session_start ();

ob_start ();

define ( "WWW_ROOT", "../" );

require_once (WWW_ROOT . "_inc/_php/config.inc.php");

require_once (WWW_ROOT . "_inc/_php/geral.inc.php");

require_once (INCLUDE_PHP_FUNC . "/fctAx.php");



$where = "";



if(isset($_GET['dat_inicial']) && !empty($_GET['dat_inicial']))

	$wh[] = "dat_inicial >= '".implode("-",array_reverse(explode("/",$_GET['dat_inicial'])))."'";

if(isset($_GET['dat_final']) && !empty($_GET['dat_final']))

	$wh[] = "dat_final <= '".implode("-",array_reverse(explode("/",$_GET['dat_final'])))."'";

$where = implode(" AND ",$wh);



$report = ((isset ( $_GET ['rp'] )) && ! (empty ( $_GET ['rp'] ))) ? $_GET ['rp'] : $_POST ['rp'];

$obj = new Report();

$limit = isset ( $_POST ['limit'] ) ? $_POST ['limit'] : 50;

$obj->setLinhasPorPagina ( $limit );

$obj->setNroPagina ( ($_POST ['start'] / $_POST ['limit']) + 1 );

if (isset ( $_POST ['sort'] ))

	$obj->setOrder ( ($_POST ['dir'] == "ASC" ? 1 : 2), $_POST ['sort'] );



switch ($report) {

	default :

		echo ("(Classe: " . __CLASS__ . ") Erro Fatal: Modulo n&atilde;o disponivel");

		break;

}

$total = $obj->getNumRegistros ();



function utf_iso(&$a) {

	if (is_array ( $a )) {

		foreach ( $a as $k => $v ) {

			if (! is_array ( $v )) {

				$a [$k] = utf8_decode ( $a [$k] );

			} else {

				utf_iso ( $a [$k] );

			}

		}

	} else {

		

		$a = utf8_decode ( $a );

	}

	return $a;

}



/**

 * Convert de ISO para UTF

 */

function iso_utf(&$a) {

	if (is_array ( $a )) {

		foreach ( $a as $k => $v ) {

			if (! is_array ( $v )) {

				$a [$k] = utf8_encode ( $a [$k] );

			} else {

				iso_utf ( $a [$k] );

			}

		}

	} else {

		

		$a = utf8_encode ( $a );

	

	}

	return $a;

}

$dados = iso_utf ( $dados );



$txtDbg = ob_get_clean ();



if ((isset ( $_POST ['where'] )) && ! (empty ( $_POST ['where'] ))) {

	echo json_encode ( array ("total" => $total, "results" => $dados ) );

} else {

	if (! isset ( $_SESSION ['debug'] ))

		$txtDbg = "";

	echo '({"total":"' . $total . '","results":' . json_encode ( $dados ) . ',"dbg":' . json_encode ( $txtDbg ) . '})';

}

?>

