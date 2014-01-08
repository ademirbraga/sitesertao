<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabConhecimentoHasProfissional
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/ConhecimentoHasProfissional.class.php
	* Tabela:           tab_conhecimento_has_profissional
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabConhecimentoHasProfissional extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabConhecimentoHasProfissional.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabConhecimentoHasProfissional;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABCONHECIMENTOHASPROFISSIONAL;
	
	
                 protected $cod_conhecimento_has_profissional;		
                     
                
                 protected $cod_conhecimento_tecnico;		
                     
                
                 protected $cod_trabalhe_conosco;		
                     
                
	private $_camposLst = array('cod_conhecimento_has_profissional' => array('nome'=>'txt_cod_conhecimento_has_profissional','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_conhecimento_tecnico' => array('nome'=>'txt_cod_conhecimento_tecnico','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_trabalhe_conosco' => array('nome'=>'txt_cod_trabalhe_conosco','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'));
            
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
		function getCodConhecimentoHasProfissional() { 	return $this->cod_conhecimento_has_profissional; }
			function getCodConhecimentoTecnico() { 	return $this->cod_conhecimento_tecnico; }
			function getCodTrabalheConosco() { 	return $this->cod_trabalhe_conosco; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodConhecimentoHasProfissional($val) { $this->cod_conhecimento_has_profissional =  $val; }
		    function setCodConhecimentoTecnico($val) { $this->cod_conhecimento_tecnico =  $val; }
		    function setCodTrabalheConosco($val) { $this->cod_trabalhe_conosco =  $val; }
		
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
