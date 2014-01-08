<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabExtraCurricular
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/ExtraCurricular.class.php
	* Tabela:           tab_extra_curricular
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabExtraCurricular extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabExtraCurricular.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabExtraCurricular;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABEXTRACURRICULAR;
	
	
                 protected $cod_extra_curricular;		
                     
                
                 protected $nom_trabalho_extra;		
                     
                
                 protected $dsc_trabalho_extra;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_extra_curricular' => array('nome'=>'txt_cod_extra_curricular','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_trabalho_extra' => array('nome'=>'txt_nom_trabalho_extra','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		'dsc_trabalho_extra' => array('nome'=>'txt_dsc_trabalho_extra','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
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
		function getCodExtraCurricular() { 	return $this->cod_extra_curricular; }
			function getNomTrabalhoExtra() { 	return $this->nom_trabalho_extra; }
			function getDscTrabalhoExtra() { 	return $this->dsc_trabalho_extra; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodExtraCurricular($val) { $this->cod_extra_curricular =  $val; }
		    function setNomTrabalhoExtra($val) { $this->nom_trabalho_extra =  $val; }
		    function setDscTrabalhoExtra($val) { $this->dsc_trabalho_extra =  $val; }
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
