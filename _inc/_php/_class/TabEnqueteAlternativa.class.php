<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabEnqueteAlternativa
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/EnqueteAlternativa.class.php
	* Tabela:           tab_enquete_alternativa
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabEnqueteAlternativa extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabEnqueteAlternativa.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabEnqueteAlternativa;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABENQUETEALTERNATIVA;
	
	
                 protected $cod_enquete_alternativa;		
                     
                
                 protected $cod_enquete;		
                     
                
                 protected $nom_enquete_alternativa;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_enquete_alternativa' => array('nome'=>'txt_cod_enquete_alternativa','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_enquete' => array('nome'=>'txt_cod_enquete','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_enquete_alternativa' => array('nome'=>'txt_nom_enquete_alternativa','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_finalizado' => array('nome'=>'txt_dat_finalizado','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'));
            
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
		function getCodEnqueteAlternativa() { 	return $this->cod_enquete_alternativa; }
			function getCodEnquete() { 	return $this->cod_enquete; }
			function getNomEnqueteAlternativa() { 	return $this->nom_enquete_alternativa; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodEnqueteAlternativa($val) { $this->cod_enquete_alternativa =  $val; }
		    function setCodEnquete($val) { $this->cod_enquete =  $val; }
		    function setNomEnqueteAlternativa($val) { $this->nom_enquete_alternativa =  $val; }
		    function setDatCadastro($val) { $this->dat_cadastro =  $val; }
		    function setDatFinalizado($val) { $this->dat_finalizado =  $val; }
		
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
