<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabEventoTipo
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/EventoTipo.class.php
	* Tabela:           tab_evento_tipo
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabEventoTipo extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabEventoTipo.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabEventoTipo;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABEVENTOTIPO;
	
	
                 protected $cod_evento_tipo;		
                     
                
                 protected $nom_evento_tipo;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_evento_tipo' => array('nome'=>'txt_cod_evento_tipo','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_evento_tipo' => array('nome'=>'txt_nom_evento_tipo','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
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
		function getCodEventoTipo() { 	return $this->cod_evento_tipo; }
			function getNomEventoTipo() { 	return $this->nom_evento_tipo; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodEventoTipo($val) { $this->cod_evento_tipo =  $val; }
		    function setNomEventoTipo($val) { $this->nom_evento_tipo =  $val; }
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
