<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabCertificacaoHasProfissional
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/CertificacaoHasProfissional.class.php
	* Tabela:           tab_certificacao_has_profissional
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabCertificacaoHasProfissional extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabCertificacaoHasProfissional.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabCertificacaoHasProfissional;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABCERTIFICACAOHASPROFISSIONAL;
	
	
                 protected $cod_certificacao_has_profissional;		
                     
                
                 protected $cod_trabalhe_conosco;		
                     
                
                 protected $cod_certificacao_especializacao;		
                     
                
	private $_camposLst = array('cod_certificacao_has_profissional' => array('nome'=>'txt_cod_certificacao_has_profissional','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_trabalhe_conosco' => array('nome'=>'txt_cod_trabalhe_conosco','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_certificacao_especializacao' => array('nome'=>'txt_cod_certificacao_especializacao','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'));
            
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
		function getCodCertificacaoHasProfissional() { 	return $this->cod_certificacao_has_profissional; }
			function getCodTrabalheConosco() { 	return $this->cod_trabalhe_conosco; }
			function getCodCertificacaoEspecializacao() { 	return $this->cod_certificacao_especializacao; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodCertificacaoHasProfissional($val) { $this->cod_certificacao_has_profissional =  $val; }
		    function setCodTrabalheConosco($val) { $this->cod_trabalhe_conosco =  $val; }
		    function setCodCertificacaoEspecializacao($val) { $this->cod_certificacao_especializacao =  $val; }
		
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
