<?php
	/*
	* @autor F3TEC - Claudia Matos - claudiarfm@yahoo.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabEmail
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_inc/_php/_class/TabEmail.class.php
	* Tabela:           tab_email
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/
	
	class TabEmail extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabEmail.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabEmail;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABEMAIL;
	
	
                 protected $cod_email;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $des_titulo_email;		
                     
                
                 protected $des_corpo_email;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_inicio_envio;		
                     
                
                 protected $dat_fim_envio;		
                     
                
                 protected $dat_termino;		
                     
                
	private $_camposLst = array('cod_email' => array('nome'=>'txt_cod_email','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		//'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'des_titulo_email' => array('nome'=>'txt_des_titulo_email','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '100'),
		//'des_corpo_email' => array('nome'=>'txt_des_corpo_email','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '5000'),
		//'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_inicio_envio' => array('nome'=>'txt_dat_inicio_envio','tipo'=>'datetime','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_fim_envio' => array('nome'=>'txt_dat_fim_envio','tipo'=>'datetime','sortable'=>'yes', 'tamanho'=> '60')
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
		function getCodEmail() { 	return $this->cod_email; }
			function getCodUsuario() { 	return $this->cod_usuario; }
			function getDesTituloEmail() { 	return $this->des_titulo_email; }
			function getDesCorpoEmail() { 	return $this->des_corpo_email; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatInicioEnvio() { 	return $this->dat_inicio_envio; }
			function getDatFimEnvio() { 	return $this->dat_fim_envio; }
			function getDatTermino() { 	return $this->dat_termino; }
		
	// **********************
	// M�todos SET
	// **********************
	
	    function setCodEmail($val) { $this->cod_email =  $val; }
		    function setCodUsuario($val) { $this->cod_usuario =  $val; }
		    function setDesTituloEmail($val) { $this->des_titulo_email =  $val; }
		    function setDesCorpoEmail($val) { $this->des_corpo_email =  $val; }
		    function setDatCadastro($val) { $this->dat_cadastro =  $val; }
		    function setDatInicioEnvio($val) { $this->dat_inicio_envio =  $val; }
		    function setDatFimEnvio($val) { $this->dat_fim_envio =  $val; }
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
