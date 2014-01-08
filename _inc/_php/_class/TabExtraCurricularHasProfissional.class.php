<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabExtraCurricularHasProfissional
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/ExtraCurricularHasProfissional.class.php
	* Tabela:           tab_extra_curricular_has_profissional
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabExtraCurricularHasProfissional extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabExtraCurricularHasProfissional.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabExtraCurricularHasProfissional;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABEXTRACURRICULARHASPROFISSIONAL;
	
	
                 protected $cod_extra_curricular_has_profissional;		
                     
                
                 protected $cod_extra_curricular;		
                     
                
                 protected $cod_trabalhe_conosco;		
                     
                
	private $_camposLst = array('cod_extra_curricular_has_profissional' => array('nome'=>'txt_cod_extra_curricular_has_profissional','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_extra_curricular' => array('nome'=>'txt_cod_extra_curricular','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
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
		function getCodExtraCurricularHasProfissional() { 	return $this->cod_extra_curricular_has_profissional; }
			function getCodExtraCurricular() { 	return $this->cod_extra_curricular; }
			function getCodTrabalheConosco() { 	return $this->cod_trabalhe_conosco; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodExtraCurricularHasProfissional($val) { $this->cod_extra_curricular_has_profissional =  $val; }
		    function setCodExtraCurricular($val) { $this->cod_extra_curricular =  $val; }
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
