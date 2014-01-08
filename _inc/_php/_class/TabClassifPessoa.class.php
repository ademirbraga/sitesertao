<?php
	/*
	* @autor F3TEC - Claudia Matos - claudiarfm@yahoo.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabClassifPessoa
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_inc/_php/_class/TabClassifPessoa.class.php
	* Tabela:           tab_classif_pessoa
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/
	
	class TabClassifPessoa extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabClassifPessoa.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabClassifPessoa;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABCLASSIFPESSOA;
	
	
                 protected $cod_classif_pessoa;		
                     
                
                 protected $nom_classif_cliente;		
                     
                
	private $_camposLst = array('cod_classif_pessoa' => array('nome'=>'txt_cod_classif_pessoa','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_classif_cliente' => array('nome'=>'txt_nom_classif_cliente','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'));
            
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
		function getCodClassifPessoa() { 	return $this->cod_classif_pessoa; }
			function getNomClassifCliente() { 	return $this->nom_classif_cliente; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodClassifPessoa($val) { $this->cod_classif_pessoa =  $val; }
		    function setNomClassifCliente($val) { $this->nom_classif_cliente =  $val; }
		
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
