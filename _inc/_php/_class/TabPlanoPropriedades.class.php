<?php
	/*
	* @autor F3TEC - Claudia Matos - claudiarfm@yahoo.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabPlanoPropriedades
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_inc/_php/_class/TabPlanoPropriedades.class.php
	* Tabela:           tab_plano_propriedades
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/
	
	class TabPlanoPropriedades extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabPlanoPropriedades.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabPlanoPropriedades;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABPLANOPROPRIEDADES;
	
	
                 protected $cod_plano_propriedade;		
                     
                
                 protected $cod_equipe;		
                     
                
                 protected $cod_plano_contas;		
                     
                
                 protected $cod_tipo_servico;		
                     
                
                 protected $qtd_itens_servico;		
                     
                
                 protected $vlr_plano;		
                     
                
                 protected $dat_inicio_plano;		
                     
                
                 protected $dat_fim_plano;		
                     
                
                 protected $bol_ativo;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_termino;		
                     
                
	private $_camposLst = array('cod_plano_propriedade' => array('nome'=>'txt_cod_plano_propriedade','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_equipe' => array('nome'=>'txt_cod_equipe','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_plano_contas' => array('nome'=>'txt_cod_plano_contas','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_tipo_servico' => array('nome'=>'txt_cod_tipo_servico','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'qtd_itens_servico' => array('nome'=>'txt_qtd_itens_servico','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'vlr_plano' => array('nome'=>'txt_vlr_plano','tipo'=>'decimal','sortable'=>'yes', 'tamanho'=> '10,2'),
		'dat_inicio_plano' => array('nome'=>'txt_dat_inicio_plano','tipo'=>'datetime','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_fim_plano' => array('nome'=>'txt_dat_fim_plano','tipo'=>'datetime','sortable'=>'yes', 'tamanho'=> '60'),
		'bol_ativo' => array('nome'=>'txt_bol_ativo','tipo'=>'tinyint','sortable'=>'yes', 'tamanho'=> '4'),
		'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_termino' => array('nome'=>'txt_dat_termino','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'));
            
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
		function getCodPlanoPropriedade() { 	return $this->cod_plano_propriedade; }
			function getCodEquipe() { 	return $this->cod_equipe; }
			function getCodPlanoContas() { 	return $this->cod_plano_contas; }
			function getCodTipoServico() { 	return $this->cod_tipo_servico; }
			function getQtdItensServico() { 	return $this->qtd_itens_servico; }
			function getVlrPlano() { 	return $this->vlr_plano; }
			function getDatInicioPlano() { 	return $this->dat_inicio_plano; }
			function getDatFimPlano() { 	return $this->dat_fim_plano; }
			function getBolAtivo() { 	return $this->bol_ativo; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatTermino() { 	return $this->dat_termino; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodPlanoPropriedade($val) { $this->cod_plano_propriedade =  $val; }
		    function setCodEquipe($val) { $this->cod_equipe =  $val; }
		    function setCodPlanoContas($val) { $this->cod_plano_contas =  $val; }
		    function setCodTipoServico($val) { $this->cod_tipo_servico =  $val; }
		    function setQtdItensServico($val) { $this->qtd_itens_servico =  $val; }
		    function setVlrPlano($val) { $this->vlr_plano =  $val; }
		    function setDatInicioPlano($val) { $this->dat_inicio_plano =  $val; }
		    function setDatFimPlano($val) { $this->dat_fim_plano =  $val; }
		    function setBolAtivo($val) { $this->bol_ativo =  $val; }
		    function setDatCadastro($val) { $this->dat_cadastro =  $val; }
		    function setDatTermino($val) { $this->dat_termino =  $val; }
		
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
