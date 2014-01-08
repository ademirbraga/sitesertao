<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabJornalPermitido
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/JornalPermitido.class.php
	* Tabela:           tab_jornal_permitido
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabJornalPermitido extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabJornalPermitido.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabJornalPermitido;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABJORNALPERMITIDO;
	
	
                 protected $cod_jornal_permitido;		
                     
                
                 protected $cod_jornal;		
                     
                
                 protected $cod_perfil;		
                     
                
	private $_camposLst = array('cod_jornal_permitido' => array('nome'=>'txt_cod_jornal_permitido','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_jornal' => array('nome'=>'txt_cod_jornal','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_perfil' => array('nome'=>'txt_cod_perfil','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'));
            
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
		function getCodJornalPermitido() { 	return $this->cod_jornal_permitido; }
			function getCodJornal() { 	return $this->cod_jornal; }
			function getCodPerfil() { 	return $this->cod_perfil; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodJornalPermitido($val) { $this->cod_jornal_permitido =  $val; }
		    function setCodJornal($val) { $this->cod_jornal =  $val; }
		    function setCodPerfil($val) { $this->cod_perfil =  $val; }
		
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
