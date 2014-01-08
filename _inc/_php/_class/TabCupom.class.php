<?php
	/*
	* @autor F3TEC - Claudia Matos - claudiarfm@yahoo.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabCupom
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_inc/_php/_class/TabCupom.class.php
	* Tabela:           tab_cupom
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/
	
	class TabCupom extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabCupom.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabCupom;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABCUPOM;
	
	
                 protected $cod_cupom;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $cod_equipe;		
                     
                
                 protected $cod_status_cupom;		
                     
                
                 protected $nom_cupom;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_inicio_validade;		
                     
                
                 protected $dat_fim_validade;		
                     
                
                 protected $cod_tipo_cupom;		
                     
                
                 protected $vlr_meta;		
                     
                
                 protected $vlr_resgate;		
                     
                
	private $_camposLst = array('cod_cupom' => array('nome'=>'txt_cod_cupom','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		//'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		//'cod_equipe' => array('nome'=>'txt_cod_equipe','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		//'cod_status_cupom' => array('nome'=>'txt_cod_status_cupom','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_cupom' => array('nome'=>'txt_nom_cupom','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'),
		//'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'),		
		//'cod_tipo_cupom' => array('nome'=>'txt_cod_tipo_cupom','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'vlr_meta' => array('nome'=>'txt_vlr_meta','tipo'=>'decimal','sortable'=>'yes', 'tamanho'=> '10,2'),
		'vlr_resgate' => array('nome'=>'txt_vlr_resgate','tipo'=>'decimal','sortable'=>'yes', 'tamanho'=> '10,2'),
		'dat_inicio_validade' => array('nome'=>'txt_dat_inicio_validade','tipo'=>'datetime','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_fim_validade' => array('nome'=>'txt_dat_fim_validade','tipo'=>'datetime','sortable'=>'yes', 'tamanho'=> '60')
	    );
            
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
		function getCodCupom() { 	return $this->cod_cupom; }
			function getCodUsuario() { 	return $this->cod_usuario; }
			function getCodEquipe() { 	return $this->cod_equipe; }
			function getCodStatusCupom() { 	return $this->cod_status_cupom; }
			function getNomCupom() { 	return $this->nom_cupom; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatInicioValidade() { 	return $this->dat_inicio_validade; }
			function getDatFimValidade() { 	return $this->dat_fim_validade; }
			function getCodTipoCupom() { 	return $this->cod_tipo_cupom; }
			function getVlrMeta() { 	return $this->vlr_meta; }
			function getVlrResgate() { 	return $this->vlr_resgate; }
		
	// **********************
	// M�todos SET
	// **********************
	
	    function setCodCupom($val) { $this->cod_cupom =  $val; }
		    function setCodUsuario($val) { $this->cod_usuario =  $val; }
		    function setCodEquipe($val) { $this->cod_equipe =  $val; }
		    function setCodStatusCupom($val) { $this->cod_status_cupom =  $val; }
		    function setNomCupom($val) { $this->nom_cupom =  $val; }
		    function setDatCadastro($val) { $this->dat_cadastro =  $val; }
		    function setDatInicioValidade($val) { $this->dat_inicio_validade =  $val; }
		    function setDatFimValidade($val) { $this->dat_fim_validade =  $val; }
		    function setCodTipoCupom($val) { $this->cod_tipo_cupom =  $val; }
		    function setVlrMeta($val) { $this->vlr_meta =  $val; }
		    function setVlrResgate($val) { $this->vlr_resgate =  $val; }
		
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
