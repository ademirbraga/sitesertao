<?php
	/*
	* @autor F3TEC - Claudia Matos - claudiarfm@yahoo.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabSms
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_inc/_php/_class/TabSms.class.php
	* Tabela:           tab_sms
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/
	
	class TabSms extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabSms.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabSms;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABSMS;
	
	
                 protected $cod_sms;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $des_sms;		
                     
                
                 protected $bol_ativo;		
                     
                
                 protected $bol_enviada;		
                     
                
                 protected $dat_inicio_envio;		
                     
                
                 protected $dat_fim_envio;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_termino;		
                     
                
	private $_camposLst = array('cod_sms' => array('nome'=>'txt_cod_sms','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		//'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'des_sms' => array('nome'=>'txt_des_sms','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '140'),
		//'bol_ativo' => array('nome'=>'txt_bol_ativo','tipo'=>'tinyint','sortable'=>'yes', 'tamanho'=> '4'),
		'bol_enviada' => array('nome'=>'txt_bol_enviada','tipo'=>'tinyint','sortable'=>'yes', 'tamanho'=> '4'),
		'dat_inicio_envio' => array('nome'=>'txt_dat_inicio_envio','tipo'=>'datetime','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_fim_envio' => array('nome'=>'txt_dat_fim_envio','tipo'=>'datetime','sortable'=>'yes', 'tamanho'=> '60')
		//,'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60')
		//,'dat_termino' => array('nome'=>'txt_dat_termino','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60')
		);
            
	// **********************
	// Construtor da classe
	// **********************
	
            function __construct()
            {
                    parent::__construct(DBPADRAO);
            }
	
	
	// **********************
	// M�todos GET
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
			function getCodUsuario() { 	return $this->cod_usuario; }
			function getDesSms() { 	return $this->des_sms; }
			function getBolAtivo() { 	return $this->bol_ativo; }
			function getBolEnviada() { 	return $this->bol_enviada; }
			function getDatInicioEnvio() { 	return $this->dat_inicio_envio; }
			function getDatFimEnvio() { 	return $this->dat_fim_envio; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatTermino() { 	return $this->dat_termino; }
		
	// **********************
	// M�todos SET
	// **********************
	
	    function setCodSms($val) { $this->cod_sms =  $val; }
		    function setCodUsuario($val) { $this->cod_usuario =  $val; }
		    function setDesSms($val) { $this->des_sms =  $val; }
		    function setBolAtivo($val) { $this->bol_ativo =  $val; }
		    function setBolEnviada($val) { $this->bol_enviada =  $val; }
		    function setDatInicioEnvio($val) { $this->dat_inicio_envio =  $val; }
		    function setDatFimEnvio($val) { $this->dat_fim_envio =  $val; }
		    function setDatCadastro($val) { $this->dat_cadastro =  $val; }
		    function setDatTermino($val) { $this->dat_termino =  $val; }
		
	// **********************
	// M�todo listar abstrato
	// **********************
	
        /**
	* Configura��o para listagem 
	*/
		function configMod(){
		}
	
	// **********************
	// M�todo cadastrar abstrato
	// **********************
  	
	// **********************
	// Cancelar abstrato
	// **********************

    
} // classe : fim

?>
