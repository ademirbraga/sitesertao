<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabSacSite
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/SacSite.class.php
	* Tabela:           tab_sac_site
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabSacSite extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabSacSite.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabSacSite;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABSACSITE;
	
	
                 protected $cod_sac_site;		
                     
                
                 protected $nom_visitante;		
                     
                
                 protected $email_visitante;		
                     
                
                 protected $nom_assunto_visitante;		
                     
                
                 protected $dsc_assunto_visitante;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_sac_site' => array('nome'=>'txt_cod_sac_site','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_visitante' => array('nome'=>'txt_nom_visitante','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		'email_visitante' => array('nome'=>'txt_email_visitante','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		'nom_assunto_visitante' => array('nome'=>'txt_nom_assunto_visitante','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		'dsc_assunto_visitante' => array('nome'=>'txt_dsc_assunto_visitante','tipo'=>'double','sortable'=>'yes', 'tamanho'=> '60'),
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
		function getCodSacSite() { 	return $this->cod_sac_site; }
			function getNomVisitante() { 	return $this->nom_visitante; }
			function getEmailVisitante() { 	return $this->email_visitante; }
			function getNomAssuntoVisitante() { 	return $this->nom_assunto_visitante; }
			function getDscAssuntoVisitante() { 	return $this->dsc_assunto_visitante; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodSacSite($val) { $this->cod_sac_site =  $val; }
		    function setNomVisitante($val) { $this->nom_visitante =  $val; }
		    function setEmailVisitante($val) { $this->email_visitante =  $val; }
		    function setNomAssuntoVisitante($val) { $this->nom_assunto_visitante =  $val; }
		    function setDscAssuntoVisitante($val) { $this->dsc_assunto_visitante =  $val; }
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
