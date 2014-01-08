<?php
	/*
	* @autor F3TEC - Claudia Matos - claudiarfm@yahoo.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabEmailPessoa
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_inc/_php/_class/TabEmailPessoa.class.php
	* Tabela:           tab_email_pessoa
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/
	
	class TabEmailPessoa extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabEmailPessoa.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabEmailPessoa;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABEMAILPESSOA;
	
	
                 protected $cod_email_pessoa;		
                     
                
                 protected $cod_pessoa;		
                     
                
                 protected $des_email_pessoa;		
                     
                
                 protected $bol_ativo;		
                     
                
	private $_camposLst = array('cod_email_pessoa' => array('nome'=>'txt_cod_email_pessoa','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_pessoa' => array('nome'=>'txt_cod_pessoa','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'des_email_pessoa' => array('nome'=>'txt_des_email_pessoa','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '100'),
		'bol_ativo' => array('nome'=>'txt_bol_ativo','tipo'=>'tinyint','sortable'=>'yes', 'tamanho'=> '4'));
            
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
		function getCodEmailPessoa() { 	return $this->cod_email_pessoa; }
			function getCodPessoa() { 	return $this->cod_pessoa; }
			function getDesEmailPessoa() { 	return $this->des_email_pessoa; }
			function getBolAtivo() { 	return $this->bol_ativo; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodEmailPessoa($val) { $this->cod_email_pessoa =  $val; }
		    function setCodPessoa($val) { $this->cod_pessoa =  $val; }
		    function setDesEmailPessoa($val) { $this->des_email_pessoa =  $val; }
		    function setBolAtivo($val) { $this->bol_ativo =  $val; }
		
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
