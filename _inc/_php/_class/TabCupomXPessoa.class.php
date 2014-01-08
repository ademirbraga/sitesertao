<?php
	/*
	* @autor F3TEC - Claudia Matos - claudiarfm@yahoo.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabCupomXPessoa
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_inc/_php/_class/TabCupomXPessoa.class.php
	* Tabela:           tab_cupom_x_pessoa
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/
	
	class TabCupomXPessoa extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabCupomXPessoa.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabCupomXPessoa;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABCUPOMXPESSOA;
	
	
                 protected $cod_cupom;		
                     
                
                 protected $cod_pessoa;		
                     
                
                 protected $bol_resgate;		
                     
                
                 protected $dat_resgate;		
                     
                
	private $_camposLst = array('cod_cupom' => array('nome'=>'txt_cod_cupom','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_pessoa' => array('nome'=>'txt_cod_pessoa','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'bol_resgate' => array('nome'=>'txt_bol_resgate','tipo'=>'tinyint','sortable'=>'yes', 'tamanho'=> '4'),
		'dat_resgate' => array('nome'=>'txt_dat_resgate','tipo'=>'datetime','sortable'=>'yes', 'tamanho'=> '60'));
            
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
		function getCodCupom() { 	return $this->cod_cupom; }
			function getCodPessoa() { 	return $this->cod_pessoa; }
			function getBolResgate() { 	return $this->bol_resgate; }
			function getDatResgate() { 	return $this->dat_resgate; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodCupom($val) { $this->cod_cupom =  $val; }
		    function setCodPessoa($val) { $this->cod_pessoa =  $val; }
		    function setBolResgate($val) { $this->bol_resgate =  $val; }
		    function setDatResgate($val) { $this->dat_resgate =  $val; }
		
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
