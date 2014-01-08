<?php
	/*
	* @autor F3TEC - Claudia Matos - claudiarfm@yahoo.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabTransacao
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_inc/_php/_class/TabTransacao.class.php
	* Tabela:           tab_transacao
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/
	
	class TabTransacao extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabTransacao.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabTransacao;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABTRANSACAO;
	
	
                 protected $cod_transacao;		
                     
                
                 protected $cod_equipe;		
                     
                
                 protected $cod_pessoa;		
                     
                
                 protected $dat_compra;		
                     
                
                 protected $vlr_compra;		
                     
                
                 protected $nom_tipo_pagamento;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $dat_importacao;		
                     
                
	private $_camposLst = array('cod_transacao' => array('nome'=>'txt_cod_transacao','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_equipe' => array('nome'=>'txt_cod_equipe','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		//'cod_pessoa' => array('nome'=>'txt_cod_pessoa','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'dat_compra' => array('nome'=>'txt_dat_compra','tipo'=>'datetime','sortable'=>'yes', 'tamanho'=> '60'),
		'vlr_compra' => array('nome'=>'txt_vlr_compra','tipo'=>'decimal','sortable'=>'yes', 'tamanho'=> '20,10'),
		'nom_tipo_pagamento' => array('nome'=>'txt_nom_tipo_pagamento','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '50'),
		//'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'dat_importacao' => array('nome'=>'txt_dat_importacao','tipo'=>'datetime','sortable'=>'yes', 'tamanho'=> '60'));
            
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
		function getCodTransacao() { 	return $this->cod_transacao; }
			function getCodEquipe() { 	return $this->cod_equipe; }
			function getCodPessoa() { 	return $this->cod_pessoa; }
			function getDatCompra() { 	return $this->dat_compra; }
			function getVlrCompra() { 	return $this->vlr_compra; }
			function getNomTipoPagamento() { 	return $this->nom_tipo_pagamento; }
			function getCodUsuario() { 	return $this->cod_usuario; }
			function getDatImportacao() { 	return $this->dat_importacao; }
		
	// **********************
	// M�todos SET
	// **********************
	
	    function setCodTransacao($val) { $this->cod_transacao =  $val; }
		    function setCodEquipe($val) { $this->cod_equipe =  $val; }
		    function setCodPessoa($val) { $this->cod_pessoa =  $val; }
		    function setDatCompra($val) { $this->dat_compra =  $val; }
		    function setVlrCompra($val) { $this->vlr_compra =  $val; }
		    function setNomTipoPagamento($val) { $this->nom_tipo_pagamento =  $val; }
		    function setCodUsuario($val) { $this->cod_usuario =  $val; }
		    function setDatImportacao($val) { $this->dat_importacao =  $val; }
		
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
