<?php
	/*
	* @autor F3TEC - Claudia Matos - claudiarfm@yahoo.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabProprClassifPessoa
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_inc/_php/_class/TabProprClassifPessoa.class.php
	* Tabela:           tab_propr_classif_pessoa
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/
	
	class TabProprClassifPessoa extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabProprClassifPessoa.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabProprClassifPessoa;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABPROPRCLASSIFPESSOA;
	
	
                 protected $cod_propr_classif_pessoa;		
                     
                
                 protected $cod_classif_pessoa;		
                     
                
                 protected $qtd_vendas;		
                     
                
                 protected $vlr_vendas;		
                     
                
                 protected $bol_ativo;		
                     
                
                 protected $dat_cadastro;		
                     
                
	private $_camposLst = array('cod_propr_classif_pessoa' => array('nome'=>'txt_cod_propr_classif_pessoa','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_classif_pessoa' => array('nome'=>'txt_cod_classif_pessoa','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'qtd_vendas' => array('nome'=>'txt_qtd_vendas','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'vlr_vendas' => array('nome'=>'txt_vlr_vendas','tipo'=>'decimal','sortable'=>'yes', 'tamanho'=> '10,2'),
		'bol_ativo' => array('nome'=>'txt_bol_ativo','tipo'=>'tinyint','sortable'=>'yes', 'tamanho'=> '4'),
		'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'datetime','sortable'=>'yes', 'tamanho'=> '60'));
            
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
		function getCodProprClassifPessoa() { 	return $this->cod_propr_classif_pessoa; }
			function getCodClassifPessoa() { 	return $this->cod_classif_pessoa; }
			function getQtdVendas() { 	return $this->qtd_vendas; }
			function getVlrVendas() { 	return $this->vlr_vendas; }
			function getBolAtivo() { 	return $this->bol_ativo; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodProprClassifPessoa($val) { $this->cod_propr_classif_pessoa =  $val; }
		    function setCodClassifPessoa($val) { $this->cod_classif_pessoa =  $val; }
		    function setQtdVendas($val) { $this->qtd_vendas =  $val; }
		    function setVlrVendas($val) { $this->vlr_vendas =  $val; }
		    function setBolAtivo($val) { $this->bol_ativo =  $val; }
		    function setDatCadastro($val) { $this->dat_cadastro =  $val; }
		
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
