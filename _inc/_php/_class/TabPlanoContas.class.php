<?php
	/*
	* @autor F3TEC - Claudia Matos - claudiarfm@yahoo.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabPlanoContas
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_inc/_php/_class/TabPlanoContas.class.php
	* Tabela:           tab_plano_contas
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/
	
	class TabPlanoContas extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabPlanoContas.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabPlanoContas;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABPLANOCONTAS;
	
	
                 protected $cod_plano_contas;		
                     
                
                 protected $nom_plano_contas;		
                     
                
                 protected $bol_ativo;		
                     
                
                 protected $dat_cadastro;		
                     
                
	private $_camposLst = array('cod_plano_contas' => array('nome'=>'txt_cod_plano_contas','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_plano_contas' => array('nome'=>'txt_nom_plano_contas','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'),
		//'bol_ativo' => array('nome'=>'txt_bol_ativo','tipo'=>'tinyint','sortable'=>'yes', 'tamanho'=> '4'),
		'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'));
            
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
		function getCodPlanoContas() { 	return $this->cod_plano_contas; }
			function getNomPlanoContas() { 	return $this->nom_plano_contas; }
			function getBolAtivo() { 	return $this->bol_ativo; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
		
	// **********************
	// M�todos SET
	// **********************
	
	    function setCodPlanoContas($val) { $this->cod_plano_contas =  $val; }
		    function setNomPlanoContas($val) { $this->nom_plano_contas =  $val; }
		    function setBolAtivo($val) { $this->bol_ativo =  $val; }
		    function setDatCadastro($val) { $this->dat_cadastro =  $val; }
		
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
