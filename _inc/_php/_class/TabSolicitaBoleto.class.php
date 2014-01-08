<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabSolicitaBoleto
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/SolicitaBoleto.class.php
	* Tabela:           tab_solicita_boleto
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabSolicitaBoleto extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabSolicitaBoleto.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabSolicitaBoleto;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABSOLICITABOLETO;
	
	
                 protected $cod_solicita_boleto;		
                     
                
                 protected $cod_cliente;		
                     
                
                 protected $nom_caminho_link;		
                     
                
                 protected $dat_vencimento;		
                     
                
                 protected $dat_solicitacao;		
                     
                
	private $_camposLst = array('cod_solicita_boleto' => array('nome'=>'txt_cod_solicita_boleto','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_cliente' => array('nome'=>'txt_cod_cliente','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_caminho_link' => array('nome'=>'txt_nom_caminho_link','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		'dat_vencimento' => array('nome'=>'txt_dat_vencimento','tipo'=>'date','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_solicitacao' => array('nome'=>'txt_dat_solicitacao','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'));
            
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
		function getCodSolicitaBoleto() { 	return $this->cod_solicita_boleto; }
			function getCodCliente() { 	return $this->cod_cliente; }
			function getNomCaminhoLink() { 	return $this->nom_caminho_link; }
			function getDatVencimento() { 	return $this->dat_vencimento; }
			function getDatSolicitacao() { 	return $this->dat_solicitacao; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodSolicitaBoleto($val) { $this->cod_solicita_boleto =  $val; }
		    function setCodCliente($val) { $this->cod_cliente =  $val; }
		    function setNomCaminhoLink($val) { $this->nom_caminho_link =  $val; }
		    function setDatVencimento($val) { $this->dat_vencimento =  $val; }
		    function setDatSolicitacao($val) { $this->dat_solicitacao =  $val; }
		
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
