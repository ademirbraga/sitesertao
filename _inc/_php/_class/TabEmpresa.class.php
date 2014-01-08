<?php
	
	
/*
	* @autor Gerador WebTupi
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           Grupo
	* Gerada em:        17.11.2011
	* Arquivo:          ../sitebhstouche/_inc/_php/_class/SisEquipe.class.php
	* Tabela:		    Empresa
	* Banco:		    bhstouche
	* -------------------------------------------------------	
	*
	*/
	
		
	// **********************
	// DECLARAÇÂO DA CLASSE
	// **********************
	
	class Empresa extends DbUtils
	{ // classe : inicio
	
	
	// **********************
	// Declaração de Atributos
	// **********************
	/**
	* @access private
	* @var _aplicativo
	*/
	private $_aplicativo = "appEmpresa.php";
	/**
	* @access private
	* @var _nomModulo
	*/
	private $_nomModulo = "txt_nom_empresa";
	/**
	* @access protected
	* @var _name
	*/
	protected $_name = TTABEMPRESA;
	
	/**
	* @access protected
	* @var cod_empresa
	*/
	protected $cod_empresa; 
	/**
	* @access protected
	* @var $nom_empresa
	*/
	protected $nom_empresa; 
	/**
	* @access protected
	* @var cod_empresa_superior
	*/
	protected $cod_empresa_superior; 
	/**
	* @access protected
	* @var dat_cadastro
	*/
	protected $dat_cadastro; 
	/**
	* @access protected
	* @var dat_cancelamento
	*/
	protected $dat_cancelamento; 
	
	protected $_foreignKeys = array ('cod_empresa_superior'); 
	
	private $_camposLst = array ('cod_empresa'=> array('nome'=>'txt_cod_identificador','tipo'=>'int','sortable'=>'yes','tamanho'=>'30'),
				     'nom_empresa'=> array('nome'=>'txt_nom_empresa','tipo'=>'varchar','sortable'=>'yes','tamanho'=>'130'),
				     'nom_empresa_superior'=> array('nome'=>'txt_cod_empresa_superior','tipo'=>'int','sortable'=>'yes','tamanho'=>'130'),
				     'dat_cadastro'=> array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes','tamanho'=>'140'),
				     'dat_cancelamento'=> array('nome'=>'txt_dat_cancelamento','tipo'=>'timestamp','sortable'=>'yes','tamanho'=>'140'));
	
	// **********************
	// Construtor da classe
	// **********************
	
		function __construct()
		{
			parent::__construct(DBPADRAO);
        	//$this->filtroRevenda(true,'');
			//$this->filtroCancelamento(true,'');
			
		}
	
	
	// **********************
	// Métodos GET
	// **********************
	
	function getcamposLst(){
		return $this->_camposLst;
	}
	function getaplicativo(){
		return $this->_aplicativo;
	}
	function getnomModulo(){
		return $this->_nomModulo;
	}
	function getCodEmpresa() { 	
		return $this->cod_empresa; 
	}
	function getNomEmpresa() { 	
		return $this->nom_empresa; 
	}
	function getCodEmpresaSuperior() { 	
		return $this->cod_empresa_superior; 
	}
	function getDatCadastro() { 	
		return $this->dat_cadastro; 
	}
	function getDatCancelamento() { 	
		return $this->dat_cancelamento; 
	}
	
		/**
		 * Configuração para listagem 
		*/
	function configMod(){
	}
	
	// **********************
	// Métodos SET
	// **********************
	
	function setCodEmpresa($val) { 
		$this->cod_empresa =  $val; 
	}
	function setNomEmpresa($val) { 
		$this->nom_empresa =  $val; 
	}
	function setCodEmpresaSuperior($val) { 
		$this->cod_empresa_superior =  $val; 
	}
	function setDatCadastro($val) { 
		$this->dat_cadastro =  $val; 
	}
	function setDatCancelamento($val) { 
		$this->dat_cancelamento =  $val; 
	}

	public function listarPorRef($cols = "*", $where = '', $limit = false, $group = ''){

		return $this->consulta( 'A.*', null, array('B' => array( TTABEMPRESA,'B.cod_empresa = A.cod_empresa','B.nom_empresa as nom_empresa_superior',"joinLeft") )  );
		
	}
	
} // classe : fim

?>
