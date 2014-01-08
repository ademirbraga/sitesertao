<?php
	/*
	* @autor F3TEC - Claudia Matos - claudiarfm@yahoo.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabEnvioSms
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_inc/_php/_class/TabEnvioSms.class.php
	* Tabela:           tab_envio_sms
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/
	
	class TabEnvioSms extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabEnvioSms.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabEnvioSms;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABENVIOSMS;
	
	
                 protected $cod_sms;		
                     
                
                 protected $cod_pessoa;		
                     
                
                 protected $bol_enviada_sucesso;		
                     
                
	private $_camposLst = array('cod_sms' => array('nome'=>'txt_cod_sms','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_pessoa' => array('nome'=>'txt_cod_pessoa','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'bol_enviada_sucesso' => array('nome'=>'txt_bol_enviada_sucesso','tipo'=>'tinyint','sortable'=>'yes', 'tamanho'=> '4'));
            
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
		function getCodSms() { 	return $this->cod_sms; }
			function getCodPessoa() { 	return $this->cod_pessoa; }
			function getBolEnviadaSucesso() { 	return $this->bol_enviada_sucesso; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodSms($val) { $this->cod_sms =  $val; }
		    function setCodPessoa($val) { $this->cod_pessoa =  $val; }
		    function setBolEnviadaSucesso($val) { $this->bol_enviada_sucesso =  $val; }
		
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
