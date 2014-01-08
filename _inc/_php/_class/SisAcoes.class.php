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
	
	class SisAcoes extends DbUtils
	{ // classe : inicio
	
	
	// **********************
	// Declaração de Atributos
	// **********************
	/**
	* @access private
	* @var _aplicativo
	*/
	private $_aplicativo = "appSisAcoes.php";
	/**
	* @access private
	* @var _nomModulo
	*/
	private $_nomModulo = "SisAcoes";
	/**
	* @access protected
	* @var _name
	*/
	protected $_name = TSISACOES;
	
	/**
	* @access protected
	* @var cod_acao
	*/
	protected $cod_acao; 
	/**
	* @access protected
	* @var nom_acao
	*/
	protected $nom_acao; 
	
	private $_camposLst = array ('cod_acao'=> array('nome'=>'txt_cod_acao','tipo'=>'int','sortable'=>'yes','tamanho'=>'30'),'nom_acao'=> array('nome'=>'txt_nom_acao','tipo'=>'varchar','sortable'=>'yes','tamanho'=>'150'));
	
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
	function getCodAcao() { 	
		return $this->cod_acao; 
	}
	function getNomAcao() { 	
		return $this->nom_acao; 
	}
	
		/**
		 * Configuração para listagem 
		*/
	function configMod(){
	}
	
	// **********************
	// Métodos SET
	// **********************
	
	function setCodAcao($val) { 
		$this->cod_acao =  $val; 
	}
	function setNomAcao($val) { 
		$this->nom_acao =  $val; 
	}
	
} // classe : fim

?>
