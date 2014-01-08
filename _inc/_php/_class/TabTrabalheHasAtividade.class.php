<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabTrabalheHasAtividade
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/TrabalheHasAtividade.class.php
	* Tabela:           tab_trabalhe_has_atividade
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabTrabalheHasAtividade extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabTrabalheHasAtividade.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabTrabalheHasAtividade;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABTRABALHEHASATIVIDADE;
	
	
                 protected $cod_trabalhe_has_atividade;		
                     
                
                 protected $cod_trabalhe_conosco;		
                     
                
                 protected $cod_atividade_profissional;		
                     
                
	private $_camposLst = array('cod_trabalhe_has_atividade' => array('nome'=>'txt_cod_trabalhe_has_atividade','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_trabalhe_conosco' => array('nome'=>'txt_cod_trabalhe_conosco','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_atividade_profissional' => array('nome'=>'txt_cod_atividade_profissional','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'));
            
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
		function getCodTrabalheHasAtividade() { 	return $this->cod_trabalhe_has_atividade; }
			function getCodTrabalheConosco() { 	return $this->cod_trabalhe_conosco; }
			function getCodAtividadeProfissional() { 	return $this->cod_atividade_profissional; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodTrabalheHasAtividade($val) { $this->cod_trabalhe_has_atividade =  $val; }
		    function setCodTrabalheConosco($val) { $this->cod_trabalhe_conosco =  $val; }
		    function setCodAtividadeProfissional($val) { $this->cod_atividade_profissional =  $val; }
		
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
