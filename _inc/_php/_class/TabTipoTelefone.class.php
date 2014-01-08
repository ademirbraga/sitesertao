<?php
	/*
	* @autor F3TEC - Claudia Matos - claudiarfm@yahoo.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabTipoTelefone
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_inc/_php/_class/TabTipoTelefone.class.php
	* Tabela:           tab_tipo_telefone
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/
	
	class TabTipoTelefone extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabTipoTelefone.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabTipoTelefone;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABTIPOTELEFONE;
	
	
                 protected $cod_tipo_telefone;		
                     
                
                 protected $des_tipo_telefone;		
                     
                
	private $_camposLst = array('cod_tipo_telefone' => array('nome'=>'txt_cod_tipo_telefone','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'des_tipo_telefone' => array('nome'=>'txt_des_tipo_telefone','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'));
            
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
		function getCodTipoTelefone() { 	return $this->cod_tipo_telefone; }
			function getDesTipoTelefone() { 	return $this->des_tipo_telefone; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodTipoTelefone($val) { $this->cod_tipo_telefone =  $val; }
		    function setDesTipoTelefone($val) { $this->des_tipo_telefone =  $val; }
		
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
