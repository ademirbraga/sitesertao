<?php
	/*
	* @autor F3TEC - Claudia Matos - claudiarfm@yahoo.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabStatusCupom
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_inc/_php/_class/TabStatusCupom.class.php
	* Tabela:           tab_status_cupom
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/
	
	class TabStatusCupom extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabStatusCupom.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabStatusCupom;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABSTATUSCUPOM;
	
	
                 protected $cod_status;		
                     
                
                 protected $nom_status;		
                     
                
	private $_camposLst = array('cod_status' => array('nome'=>'txt_cod_status','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_status' => array('nome'=>'txt_nom_status','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'));
            
	// **********************
	// Construtor da classe
	// **********************
	
            function __construct()
            {
                    parent::__construct(DBPADRAO);
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
		function getCodStatus() { 	return $this->cod_status; }
			function getNomStatus() { 	return $this->nom_status; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodStatus($val) { $this->cod_status =  $val; }
		    function setNomStatus($val) { $this->nom_status =  $val; }
		
	// **********************
	// Método listar abstrato
	// **********************
	
        /**
	* Configuração para listagem 
	*/
		function configMod(){
		}
	
	// **********************
	// Método cadastrar abstrato
	// **********************
  	
	// **********************
	// Cancelar abstrato
	// **********************

    
} // classe : fim

?>
