<?php

define ( "WWW_ROOT", "../" );

require_once (WWW_ROOT . "_inc/_php/config.inc.php");

require_once (WWW_ROOT . "_inc/_php/geral.inc.php");

require_once (INCLUDE_PHP_FUNC . "/fctAx.php");

//$_SESSION['debug'] = SQL;

$moduloEnviado = ((isset ( $_GET ['modulo'] )) && ! (empty ( $_GET ['modulo'] ))) ? $_GET ['modulo'] : $_POST ['modulo'];

$objModulo = new Modulo ();

$obj = $objModulo->getObj ( $moduloEnviado );


$objLista = new Lista ( $moduloEnviado );

$objLista->setModulo ();

$campos = $objLista->getCampos ();

$sIndexColumn = $objLista->getId ();

// A linha abaixo seta o nome do modulo com linguagem
$NomModulo = $lng [$objLista->getNomeModulo ()];
 
$aColumns = array();
$aColumns[] = $sIndexColumn;
foreach ( $campos as $k => $Campos ) {
	$aColumns[] = $k;	
}
//	$aColumns = array( 'cod_cliente','cod_cliente', 'nom_cliente', 'num_cpf_cnpj', 'nom_email','num_telefone','num_celular', 'dat_cadastro');
	//$aColumns = $obj->getCampos();
	
	//echo "<pre>";print_r($sIndexColumn);die;
	
	/* Indexed column (used for fast and accurate table cardinality) */
//	$sIndexColumn = "cod_cliente";
	
	/* DB table to use */
	//$sTable = "tab_cliente";
	
	/* Database connection information
	$gaSql['user']       = "root";
	$gaSql['password']   = "";
	$gaSql['db']         = "bdunimed";
	$gaSql['server']     = "localhost";
	
	/* REMOVE THIS LINE (it just includes my SQL connection user/pass) */
	//include( $_SERVER['DOCUMENT_ROOT']."/datatables/mysql.php" );
	
	
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
	 * no need to edit below this line
	 */
	
	/* 
	 * MySQL connection
	 
	$gaSql['link'] =  mysql_pconnect( $gaSql['server'], $gaSql['user'], $gaSql['password']  ) or
		die( 'Could not open connection to server' );
	
	mysql_select_db( $gaSql['db'], $gaSql['link'] ) or 
		die( 'Could not select database '. $gaSql['db'] );
	
	
	/* 
	 * Paging
	 */
	$sLimit = "";
	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
	{
	    
		$sLimit = "LIMIT ".mysql_real_escape_string( $_GET['iDisplayStart'] ).", ".mysql_real_escape_string( $_GET['iDisplayLength'] );
		//echo "LIMIT ".mysql_real_escape_string( $_GET['iDisplayStart'] ).", ".mysql_real_escape_string( $_GET['iDisplayLength'] );
	    //print_r(mysql_real_escape_string( $_GET['iDisplayStart'] ));echo "==";print_r(mysql_real_escape_string( $_GET['iDisplayLength']));
		
		 
		 //$obj->setNroPagina ( (mysql_real_escape_string( $_GET['sEcho'])) );		
		    $obj->setNroPagina ($_GET['iDisplayStart'] );
		 //$obj->setPaginacao ( mysql_real_escape_string( $_GET['iDisplayStart'] ),mysql_real_escape_string( $_GET['iDisplayLength'] ) );		
		    $obj->setLinhasPorPagina ( $_GET['iDisplayLength']);
		
		//$obj->limit(mysql_real_escape_string( $_GET['iDisplayStart'] ),mysql_real_escape_string( $_GET['iDisplayLength']) );
	}
	
	//$a = $obj->getNroPagina();
	//$b = $obj->getLinhasPorPagina();	
	//echo "AAAAAAAKKKK";print_r($a);print_r($b);die;
	
	
	/*
	 * Ordering
	 */
	if ( isset( $_GET['iSortCol_0'] ) )
	{
		//$sOrder = "ORDER BY  ";
		$sOrder = "";
		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
		{
			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
			{
				$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
				 	".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
			}
		}
		/**
		$sOrder = substr_replace( $sOrder, "", -2 );		
		if ( $sOrder == "ORDER BY" )
		{
			$sOrder = "";
		}/**/
		
		if ( $sOrder != "" )
		{
		    $sOrder = substr_replace( $sOrder, "", -2 );		
		    
		    $obj->setOrder ($sOrder);    
		}
	}
	
	
	/* 
	 * Filtering
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here, but concerned about efficiency
	 * on very large tables, and MySQL's regex functionality is very limited
	 */
	$sWhere = "";
	if ( $_GET['sSearch'] != "" )
	{
		//$sWhere = "WHERE (";
		$sWhere = array();
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			$sWhere[]= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%'";
		}
		//$sWhere = substr_replace( $sWhere, "", -3 );
		//$sWhere .= ')';
	}
	
	/* Individual column filtering 
	for ( $i=0 ; $i<count($aColumns) ; $i++ )
	{
		if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
		{
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
		}
	}*/
	
	
	/*
	 * SQL queries
	 * Get data to display
	 *
	$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
		FROM   $sTable
		$sWhere
		$sOrder
		$sLimit
	";
	$rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	
	
	/* Data set length after filtering *
	$sQuery = "
		SELECT FOUND_ROWS()
	";
	$rResultFilterTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
	$iFilteredTotal = $aResultFilterTotal[0];
	
	
	
	/* Total data set length *
	$sQuery = "
		SELECT COUNT(".$sIndexColumn.")
		FROM   $sTable
	";
	$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$aResultTotal = mysql_fetch_array($rResultTotal);
	$iTotal = $aResultTotal[0];
	
	
	/**/	
	
	if( !method_exists( $obj, 'listarPorRef' ) ) {

	    $obj = $obj->listar ( null, implode(" OR ", $sWhere), true );

	} else {
	    $obj = $obj->listarPorRef ( null, implode(" OR ", $sWhere), true );

	}
	$dados = $obj->getDados();	
	
	$iFilteredTotal = $obj->getFoundRows();
	
	$obj->filtroCancelamento(false);
	
	$iTotal = $obj->recordCount();
	//print_r($iTotal);die;
	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	
	
	//while ( $aRow = mysql_fetch_array( $rResult ) )
	foreach($dados as $key => $data)
	{
		$row = array();		
		
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if( $i == 0 ){
			    $row[] = '<input type="checkbox" class="checkboxes" value="1" id="'.$data[ $aColumns[$i] ].'">';
			    
			}elseif ( $aColumns[$i] != ' ' )
			{
				/* General output */
				$row[] = utf8_encode($data[ $aColumns[$i] ]);
				//$row[] = $aRow[ $aColumns[$i] ];
			}
		}
		/* Special output formatting for 'version' column */
		$row[] = '<a class="btn mini green" href="Visualiza.php?modulo='.$moduloEnviado.'&id='.$data[ $aColumns[0] ].'&acao=8" title="Editar"><i class="icon-edit"></i></a><a class="btn mini red" href="javascript:void(0);" onclick="deleteLinha('.$data[ $aColumns[0] ].');"  title="Deletar"><i class="icon-trash"></i></a>';
		
		
		$output['aaData'][] = $row;
	}
	unset($obj);
	
	echo json_encode( $output );

?>
