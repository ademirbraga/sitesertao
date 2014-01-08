<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabRedesSociais
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/RedesSociais.class.php
	* Tabela:           tab_redes_sociais
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabRedesSociais extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabRedesSociais.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabRedesSociais;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABREDESSOCIAIS;
	
	
                 protected $cod_redes_sociais;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $nom_link_facebook;		
                     
                
                 protected $nom_link_twitter;		
                     
                
                 protected $nom_link_gmais;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_redes_sociais' => array('nome'=>'txt_cod_redes_sociais','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_link_facebook' => array('nome'=>'txt_nom_link_facebook','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		'nom_link_twitter' => array('nome'=>'txt_nom_link_twitter','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		'nom_link_gmais' => array('nome'=>'txt_nom_link_gmais','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
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
		function getCodRedesSociais() { 	return $this->cod_redes_sociais; }
			function getCodUsuario() { 	return $this->cod_usuario; }
			function getNomLinkFacebook() { 	return $this->nom_link_facebook; }
			function getNomLinkTwitter() { 	return $this->nom_link_twitter; }
			function getNomLinkGmais() { 	return $this->nom_link_gmais; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodRedesSociais($val) { $this->cod_redes_sociais =  $val; }
		    function setCodUsuario($val) { $this->cod_usuario =  $val; }
		    function setNomLinkFacebook($val) { $this->nom_link_facebook =  $val; }
		    function setNomLinkTwitter($val) { $this->nom_link_twitter =  $val; }
		    function setNomLinkGmais($val) { $this->nom_link_gmais =  $val; }
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
