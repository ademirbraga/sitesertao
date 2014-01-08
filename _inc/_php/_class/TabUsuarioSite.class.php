<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabUsuarioSite
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/TabUsuarioSite.class.php
	* Tabela:           TabUsuarioSite
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabUsuarioSite extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabUsuarioSite.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabUsuarioSite;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABUSUARIOSITE;
	
	protected $cod_usuario_site;		                     
	protected $cod_menu;		
	protected $cod_usuario;		
                     
                
	private $_camposLst = array('cod_usuario_site' => array('nome'=>'txt_cod_usuario_site','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_menu' => array('nome'=>'txt_cod_menu','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'));
            
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
	function getCodUsuarioSite() { 	return $this->cod_usuario_site; }
	function getCodMenu() { 	return $this->cod_menu; }
	function getCodUsuario() { 	return $this->cod_usuario; }
		
	// **********************
	// Métodos SET
	// **********************
	
	function setCodUsuarioSite($val) { $this->cod_usuario_site =  $val; }
	function setCodMenu($val) { $this->cod_menu =  $val; }
	function setCodUsuario($val) { $this->cod_usuario =  $val; }
		
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
