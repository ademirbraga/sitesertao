<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabClienteObs
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/ClienteObs.class.php
	* Tabela:           tab_cliente_obs
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabClienteObs extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabClienteObs.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabClienteObs;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABCLIENTEOBS;
	
	
                 protected $cod_cliente_obs;		
                     
                
                 protected $cod_cliente;		
                     
                
                 protected $dsc_obs;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_cliente_obs' => array('nome'=>'txt_cod_cliente_obs','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_cliente' => array('nome'=>'txt_cod_cliente','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'dsc_obs' => array('nome'=>'txt_dsc_obs','tipo'=>'double','sortable'=>'yes', 'tamanho'=> '60'),
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
		function getCodClienteObs() { 	return $this->cod_cliente_obs; }
			function getCodCliente() { 	return $this->cod_cliente; }
			function getDscObs() { 	return $this->dsc_obs; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodClienteObs($val) { $this->cod_cliente_obs =  $val; }
		    function setCodCliente($val) { $this->cod_cliente =  $val; }
		    function setDscObs($val) { $this->dsc_obs =  $val; }
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
