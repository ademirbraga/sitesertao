<?php
	/*
	* @autor F3TEC - Claudia Matos - claudiarfm@yahoo.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabTelefoneLoja
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_inc/_php/_class/TabTelefoneLoja.class.php
	* Tabela:           tab_telefone_loja
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/
	
	class TabTelefoneLoja extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabTelefoneLoja.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabTelefoneLoja;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABTELEFONELOJA;
	
	
                 protected $cod_telefone_loja;		
                     
                
                 protected $cod_equipe;		
                     
                
                 protected $cod_tipo_telefone;		
                     
                
                 protected $des_nro_telefone;		
                     
                
	private $_camposLst = array('cod_telefone_loja' => array('nome'=>'txt_cod_telefone_loja','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_equipe' => array('nome'=>'txt_cod_equipe','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_tipo_telefone' => array('nome'=>'txt_cod_tipo_telefone','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'des_nro_telefone' => array('nome'=>'txt_des_nro_telefone','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '15'));
            
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
		function getCodTelefoneLoja() { 	return $this->cod_telefone_loja; }
			function getCodEquipe() { 	return $this->cod_equipe; }
			function getCodTipoTelefone() { 	return $this->cod_tipo_telefone; }
			function getDesNroTelefone() { 	return $this->des_nro_telefone; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodTelefoneLoja($val) { $this->cod_telefone_loja =  $val; }
		    function setCodEquipe($val) { $this->cod_equipe =  $val; }
		    function setCodTipoTelefone($val) { $this->cod_tipo_telefone =  $val; }
		    function setDesNroTelefone($val) { $this->des_nro_telefone =  $val; }
		
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
