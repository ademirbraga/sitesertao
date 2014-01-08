<?php

/** 
 * @author root
 * 
 * 
 */
class Tracking extends DbUtils {

	protected $_name = 'tracking';

	private $_nomModulo = 'txt_tracking';

	private $aplicativo = '';

	private static $_started = false;

	protected static $inactiveParams = array();
	
	//dat_tracking        | cod_usuario | nom_acao | nom_tabela | nom_modulo     | nom_descricao
	
	private $_camposLst = array(
		'dat_tracking' => array( 'nome' => 'txt_dat_tracking', 'tipo'=>'timestamp','sortable'=>'yes','tamanho'=>'100'),
		'cod_usuario' => array( 'nome' => 'txt_cod_usuario','tipo'=>'int','sortable'=>'yes','tamanho'=>'100'),
		'nom_acao' => array( 'nome' => 'txt_nom_acao','tipo'=>'varchar','sortable'=>'yes','tamanho'=>'100'),
		'nom_tabela'=> array( 'nome' => 'txt_nom_tabela','tipo'=>'varchar','sortable'=>'yes','tamanho'=>'150'),
		'nom_modulo'=> array( 'nome' => 'txt_nom_modulo','tipo'=>'varchar','sortable'=>'yes','tamanho'=>'150'),
		'nom_descricao'=> array( 'nome' => 'txt_nom_descricao','tipo'=>'varchar','sortable'=>'yes','tamanho'=>'200')
	);

	function __construct() {
		parent::__construct(DBPADRAO);
        //$this->filtroRevenda(true,'');
		//$this->filtroCancelamento(true,'');
	}
	
	function getaplicativo() {
		return $this->aplicativo;
	}
	
	function getnomModulo() {
		return $this->_nomModulo;
	}
	
	function getcamposLst(){
		return $this->_camposLst;
	}

	public function listarPorRef( $cols = "*", $where = '', $limit = false, $group = '' ) {

		$join = array(
			'B' => array(
				TSISUSUARIO,
				'B.cod_usuario = A.cod_usuario',
				'B.nom_usuario as cod_usuario'
			)
		);

		return $this->consulta( null, null, $join, $where, $group, $limit );

	}
	
	public function getNomChave() {
		return 'cod_tracking';
	}

	public static function inactive( $params = array() ) {
		if( !empty( $params ) && ( in_array( 'usuario', array_keys( $params ) ) || in_array( 'modulo', array_keys( $params ) ) ) )
			self::$inactiveParams = $params;
	}

	public static function track( $usuario, $acao, $tabela, $modulo, $descricao ) {

		if( null === $usuario || ( null === $acao && null === $tabela && null === $modulo ) )
			return;

		if( !empty( self::$inactiveParams ) )
			if( in_array( 'usuario', array_keys( self::$inactiveParams ) ) )
				if( $usuario == self::$inactiveParams['usuario'] )
					return;

		if( !empty( self::$inactiveParams ) )
			if( in_array( 'modulo', array_keys( self::$inactiveParams ) ) )
				if( $modulo == self::$inactiveParams['modulo'] )
					return;

		if( $tabela !== 'tracking' ) {

			$dados = array(
				'dat_tracking' => date( "Y-m-d H:i:s" ),
				'cod_usuario' => $usuario,
				'nom_acao' => $acao,
				'nom_tabela' => $tabela,
				'nom_modulo' => $modulo,
				'nom_descricao' => $descricao
			);

			$objTracking = new Tracking;

			$objTracking->insert( $dados );

		}

	}

	/**
	 * 
	 * @see Database::cancelar()
	 */
	function cancelar($id) {
		
	//TODO - Insert your code here
	}
}

?>