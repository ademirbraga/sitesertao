<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabClienteTipo
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/ClienteTipo.class.php
	* Tabela:           tab_cliente_tipo
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabClienteTipo extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabClienteTipo.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabClienteTipo;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABCLIENTETIPO;
	
	
                 protected $cod_cliente_tipo;		
                     
                
                 protected $nom_cliente_tipo;		
                     
                
	private $_camposLst = array('cod_cliente_tipo' => array('nome'=>'txt_cod_cliente_tipo','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_cliente_tipo' => array('nome'=>'txt_nom_cliente_tipo','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'));
            
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
		function getCodClienteTipo() { 	return $this->cod_cliente_tipo; }
			function getNomClienteTipo() { 	return $this->nom_cliente_tipo; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodClienteTipo($val) { $this->cod_cliente_tipo =  $val; }
		    function setNomClienteTipo($val) { $this->nom_cliente_tipo =  $val; }
		
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
