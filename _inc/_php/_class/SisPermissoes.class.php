<?php
	
	
/*
	* @autor Gerador WebTupi
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           Grupo
	* Gerada em:        17.11.2011
	* Arquivo:          ../sitebhstouche/_inc/_php/_class/Grupo.class.php
	* Tabela:		    grupo
	* Banco:		    bhstouche
	* -------------------------------------------------------	
	*
	*/
	
		
	// **********************
	// DECLARAÇÂO DA CLASSE
	// **********************
	
	class SisPermissoes extends DbUtils
	{ // classe : inicio
	
	
	// **********************
	// Declaração de Atributos
	// **********************
	/**
	* @access private
	* @var _aplicativo
	*/
	private $_aplicativo = "appSisPermissoes.php";
	/**
	* @access private
	* @var _nomModulo
	*/
	private $_nomModulo = "SisPermissoes";
	/**
	* @access protected
	* @var _name
	*/
	protected $_name = TSISPERMISSOES;
	
	/**
	* @access protected
	* @var cod_permissao
	*/
	protected $cod_permissao; 
	/**
	* @access protected
	* @var dsc_permissao
	*/
	protected $dsc_permissao; 
	
	private $_camposLst = array ('cod_permissao'=> array('nome'=>'txt_cod_permissao','tipo'=>'int','sortable'=>'yes','tamanho'=>'30'),'dsc_permissao'=> array('nome'=>'txt_dsc_permissao','tipo'=>'varchar','sortable'=>'yes','tamanho'=>'150'));
	
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
	function getCodPermissao() { 	
		return $this->cod_permissao; 
	}
	function getDscPermissao() { 	
		return $this->dsc_permissao; 
	}
	
		/**
		 * Configuração para listagem 
		*/
	function configMod(){
	}
	
	// **********************
	// Métodos SET
	// **********************
	
	function setCodPermissao($val) { 
		$this->cod_permissao =  $val; 
	}
	function setDscPermissao($val) { 
		$this->dsc_permissao =  $val; 
	}
	
} // classe : fim

?>
