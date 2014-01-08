<?php
	/*
	* @autor F3TEC - Claudia Matos - claudiarfm@yahoo.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabEnvioEmail
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_inc/_php/_class/TabEnvioEmail.class.php
	* Tabela:           tab_envio_email
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/
	
	class TabEnvioEmail extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabEnvioEmail.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabEnvioEmail;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABENVIOEMAIL;
	
	
                 protected $cod_email;		
                     
                
                 protected $cod_email_pessoa;		
                     
                
                 protected $dat_envio;		
                     
                
                 protected $bol_enviado;		
                     
                
	private $_camposLst = array('cod_email' => array('nome'=>'txt_cod_email','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_email_pessoa' => array('nome'=>'txt_cod_email_pessoa','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'dat_envio' => array('nome'=>'txt_dat_envio','tipo'=>'datetime','sortable'=>'yes', 'tamanho'=> '60'),
		'bol_enviado' => array('nome'=>'txt_bol_enviado','tipo'=>'tinyint','sortable'=>'yes', 'tamanho'=> '4'));
            
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
		function getCodEmail() { 	return $this->cod_email; }
			function getCodEmailPessoa() { 	return $this->cod_email_pessoa; }
			function getDatEnvio() { 	return $this->dat_envio; }
			function getBolEnviado() { 	return $this->bol_enviado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodEmail($val) { $this->cod_email =  $val; }
		    function setCodEmailPessoa($val) { $this->cod_email_pessoa =  $val; }
		    function setDatEnvio($val) { $this->dat_envio =  $val; }
		    function setBolEnviado($val) { $this->bol_enviado =  $val; }
		
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
