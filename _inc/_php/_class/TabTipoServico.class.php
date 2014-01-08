<?php
	/*
	* @autor F3TEC - Claudia Matos - claudiarfm@yahoo.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabTipoServico
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_inc/_php/_class/TabTipoServico.class.php
	* Tabela:           tab_tipo_servico
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/
	
	class TabTipoServico extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabTipoServico.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabTipoServico;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABTIPOSERVICO;
	
	
                 protected $cod_tipo_servico;		
                     
                
                 protected $nom_tipo_servico;		
                     
                
                 protected $bol_ativo;		
                     
                
	private $_camposLst = array('cod_tipo_servico' => array('nome'=>'txt_cod_tipo_servico','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_tipo_servico' => array('nome'=>'txt_nom_tipo_servico','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'),
		'bol_ativo' => array('nome'=>'txt_bol_ativo','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'));
            
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
		function getCodTipoServico() { 	return $this->cod_tipo_servico; }
			function getNomTipoServico() { 	return $this->nom_tipo_servico; }
			function getBolAtivo() { 	return $this->bol_ativo; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodTipoServico($val) { $this->cod_tipo_servico =  $val; }
		    function setNomTipoServico($val) { $this->nom_tipo_servico =  $val; }
		    function setBolAtivo($val) { $this->bol_ativo =  $val; }
		
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
