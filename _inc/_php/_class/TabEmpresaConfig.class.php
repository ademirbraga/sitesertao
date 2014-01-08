<?php
	
	
/*
	* @autor Gerador WebTupi
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           Grupo
	* Gerada em:        17.11.2011
	* Arquivo:          ../sitebhstouche/_inc/_php/_class/SisEquipeConfiguracoes.class.php
	* Tabela:		    sis_equipe_config
	* Banco:		    bhstouche
	* -------------------------------------------------------	
	*
	*/
	
		
	// **********************
	// DECLARAÇÂO DA CLASSE
	// **********************
	
	class EmpresaConfig extends DbUtils
	{ // classe : inicio
	
	
	// **********************
	// Declaração de Atributos
	// **********************
	/**
	* @access private
	* @var _aplicativo
	*/
	private $_aplicativo = "appEmpresaConfig.php";
	/**
	* @access private
	* @var _nomModulo
	*/
	private $_nomModulo = "EmpresaConfig";
	/**
	* @access protected
	* @var _name
	*/
	protected $_name = TTABEMPRESACONFIG;
	
	/**
	* @access protected
	* @var cod_empresa
	*/
	protected $cod_empresa; 
	/**
	* @access protected
	* @var nom_logo
	*/
	protected $nom_logo; 
	
	
	private $_camposLst = array ('cod_empresa'=> array('nome'=>'txt_cod_equipe','tipo'=>'int','sortable'=>'yes','tamanho'=>'30'),'nom_logo'=> array('nome'=>'txt_nom_logo','tipo'=>'varchar','sortable'=>'yes','tamanho'=>'150'));
	
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
	function getNomLogo() { 	
		return $this->nom_logo; 
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
	function setNomLogo($val) { 
		$this->nom_logo =  $val; 
	}
	

	
} // classe : fim

?>
