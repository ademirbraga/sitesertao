<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabTipoPessoa
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/TabTipoPessoa.class.php
	* Tabela:           TabTipoPessoa
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabTipoPessoa extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabTipoPessoa.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabTipoPessoa;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABTIPOPESSOA;
	
	
                 protected $cod_tipo_pessoa;		
                     
                
                 protected $nom_tipo_pessoa;		
                     
                
	private $_camposLst = array('cod_tipo_pessoa' => array('nome'=>'txt_cod_tipo_pessoa','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_tipo_pessoa' => array('nome'=>'txt_nom_tipo_pessoa','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'));
            
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
	function getCodTipoPessoa() { 	return $this->cod_tipo_pessoa; }
	function getNomTipoPessoa() { 	return $this->nom_tipo_pessoa; }
		
	// **********************
	// Métodos SET
	// **********************
	
	function setCodTipoPessoa($val) { $this->cod_tipo_pessoa =  $val; }
	function setNomTipoPessoa($val) { $this->nom_tipo_pessoa =  $val; }
		
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
