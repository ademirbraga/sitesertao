<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabEnquetePermitido
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/EnquetePermitido.class.php
	* Tabela:           tab_enquete_permitido
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabEnquetePermitido extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabEnquetePermitido.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabEnquetePermitido;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABENQUETEPERMITIDO;
	
	
                 protected $cod_enquete_permitido;		
                     
                
                 protected $cod_enquete;		
                     
                
                 protected $cod_perfil;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_enquete_permitido' => array('nome'=>'txt_cod_enquete_permitido','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_enquete' => array('nome'=>'txt_cod_enquete','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_perfil' => array('nome'=>'txt_cod_perfil','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_finalizado' => array('nome'=>'txt_dat_finalizado','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'));
            
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
		function getCodEnquetePermitido() { 	return $this->cod_enquete_permitido; }
			function getCodEnquete() { 	return $this->cod_enquete; }
			function getCodPerfil() { 	return $this->cod_perfil; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// M�todos SET
	// **********************
	
	    function setCodEnquetePermitido($val) { $this->cod_enquete_permitido =  $val; }
		    function setCodEnquete($val) { $this->cod_enquete =  $val; }
		    function setCodPerfil($val) { $this->cod_perfil =  $val; }
		    function setDatCadastro($val) { $this->dat_cadastro =  $val; }
		    function setDatFinalizado($val) { $this->dat_finalizado =  $val; }
		
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
