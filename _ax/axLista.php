<?phpsession_start ();ob_start ();define ( "WWW_ROOT", "../" );require_once (WWW_ROOT . "_inc/_php/config.inc.php");require_once (WWW_ROOT . "_inc/_php/geral.inc.php");require_once (INCLUDE_PHP_FUNC . "/fctAx.php");$moduloEnviado = ((isset ( $_GET ['modulo'] )) && ! (empty ( $_GET ['modulo'] ))) ? $_GET ['modulo'] : $_POST ['modulo'];$objModulo = new Modulo ();$obj = $objModulo->getObj ( $moduloEnviado );define( 'MODULO_ATUAL', $moduloEnviado );if(isset ($_GET['tmod']))    $obj->_name = $_GET['tmod'];$limit = isset ( $_GET ['rows'] ) ? $_GET ['rows'] : 10;$obj->setLinhasPorPagina ( $limit );$pag = isset($_GET['page']) ? $_GET['page'] : 0;$obj->setNroPagina ( $pag );if (isset ( $_GET ['sidx'] ))	$obj->setOrder ( $_GET ['sidx'].' '.$_GET ['sord']);$where = array();if(isset($_GET['_search']) && $_GET['_search']){	if( !empty( $_GET['searchString'] ) ) {		if( $_GET['searchOper'] == '%LIKE%' ) {			$_GET['searchOper'] = 'LIKE';			$_GET['searchString'] = "%{$_GET['searchString']}%";		}		$where[] = "{$_GET['searchField']} {$_GET['searchOper']} '{$_GET['searchString']}'";	}}if( !method_exists( $obj, 'listarPorRef' ) ) {	$obj = $obj->listar ( null, implode(" AND ", $where), true );	} else {	$obj = $obj->listarPorRef ( null, implode(" AND ", $where), true );	}$dados = $obj->getDados();//$total = $obj->getFoundRows();//$responce->page = $obj->getNroPagina(); //$responce->total = ceil($total/$limit); //$responce->records = $total;/**foreach($dados as $vl) {	$responce->rows[] = iso_utf( $vl );//array($row[id],$row[invdate],$row[name],$row[amount],$row[tax],$row[total],$row[note]);}/**/if(!empty($_GET['colModel'])){foreach($_GET['colModel'] as $k => $val){    foreach($dados as $key => $data){        $response[$k][$key] = $data[$val['name']];    }    }}//print_r($response);die;$txtDbg = ob_get_clean ();if (! isset ( $_SESSION ['debug'] ))	$txtDbg = "";echo json_encode( $response );//echo '{"page":"2","total":2,"records":"13","rows":[{"id":"3","cell":["3","2007-10-02","Client 2","300.00","60.00","360.00","note invoice 3 & and amp test"]},{"id":"2","cell":["2","2007-10-03","Client 1","200.00","40.00","240.00","note 2"]},{"id":"1","cell":["1","2007-10-01","Client 1","100.00","20.00","120.00","note 1"]}],"userdata":{"amount":600,"tax":120,"total":720,"name":"Totals:"}}';?>