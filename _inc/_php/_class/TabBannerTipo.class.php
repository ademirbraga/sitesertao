<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabBannerTipo
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/BannerTipo.class.php
	* Tabela:           tab_banner_tipo
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabBannerTipo extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabBannerTipo.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabBannerTipo;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABBANNERTIPO;
	
	
                 protected $cod_banner_tipo;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $nom_tipo_banner;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_banner_tipo' => array('nome'=>'txt_cod_banner_tipo','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_tipo_banner' => array('nome'=>'txt_nom_tipo_banner','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_finalizado' => array('nome'=>'txt_dat_finalizado','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'));
            
	// **********************
	// Construtor da classe
	// **********************
	
            function __construct()
            {
                    parent::__construct(DBPADRAO);
		    $this->filtroCancelamento(true,'(dat_finalizado IS NULL or dat_finalizado >= CURRENT_TIMESTAMP)');
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
		function getCodBannerTipo() { 	return $this->cod_banner_tipo; }
			function getCodUsuario() { 	return $this->cod_usuario; }
			function getNomTipoBanner() { 	return $this->nom_tipo_banner; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodBannerTipo($val) { $this->cod_banner_tipo =  $val; }
		    function setCodUsuario($val) { $this->cod_usuario =  $val; }
		    function setNomTipoBanner($val) { $this->nom_tipo_banner =  $val; }
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
