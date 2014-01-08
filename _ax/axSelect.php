<?php

session_start ();

ob_start ();

define ( "WWW_ROOT", "../" );

require_once (WWW_ROOT . "_inc/_php/config.inc.php");

require_once (WWW_ROOT . "_inc/_php/geral.inc.php");

require_once (INCLUDE_PHP_FUNC . "/fctAx.php");



$moduloEnviado = ((isset ( $_GET ['modulo'] )) && ! (empty ( $_GET ['modulo'] ))) ? $_GET ['modulo'] : $_POST ['modulo'];



switch ($moduloEnviado) {

}



$obj->listar ( "", false );

$itens = $obj->formatDados ( $cod, $nom );

$txtDbg = ob_get_clean ();

if (! empty ( $itens )) {

	foreach ( $itens as $key => $value ) {

		//$array[] = "{'optionValue':'$key', 'optionDisplay': '$value'}";

		echo "<option value='".$key."'>".$value."</option>";

		

	}

	//echo "".implode(", ",$array)."";

	

}

//if (isset ( $_SESSION ['debug'] ))

	//echo $txtDbg;

