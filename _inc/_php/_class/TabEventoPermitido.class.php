<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabEventoPermitido
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/EventoPermitido.class.php
	* Tabela:           tab_evento_permitido
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabEventoPermitido extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabEventoPermitido.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabEventoPermitido;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABEVENTOPERMITIDO;
	
	
                 protected $cod_evento_permitido;		
                     
                
                 protected $cod_evento;		
                     
                
                 protected $cod_perfil;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_evento_permitido' => array('nome'=>'txt_cod_evento_permitido','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_evento' => array('nome'=>'txt_cod_evento','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
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
		function getCodEventoPermitido() { 	return $this->cod_evento_permitido; }
			function getCodEvento() { 	return $this->cod_evento; }
			function getCodPerfil() { 	return $this->cod_perfil; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodEventoPermitido($val) { $this->cod_evento_permitido =  $val; }
		    function setCodEvento($val) { $this->cod_evento =  $val; }
		    function setCodPerfil($val) { $this->cod_perfil =  $val; }
		    function setDatCadastro($val) { $this->dat_cadastro =  $val; }
		    function setDatFinalizado($val) { $this->dat_finalizado =  $val; }
		
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
