<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabTrabalheConosco
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/TrabalheConosco.class.php
	* Tabela:           tab_trabalhe_conosco
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabTrabalheConosco extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabTrabalheConosco.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabTrabalheConosco;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABTRABALHECONOSCO;
	
	
                 protected $cod_trabalhe_conosco;		
                     
                
                 protected $nom_profissional;		
                     
                
                 protected $email_profissional;		
                     
                
                 protected $num_cpf_profissional;		
                     
                
                 protected $dat_nascimento;		
                     
                
                 protected $num_tel_fixo;		
                     
                
                 protected $num_tel_cel;		
                     
                
                 protected $dsc_obj_profissional;		
                     
                
                 protected $dat_cadastro;		
                     
                
	private $_camposLst = array('cod_trabalhe_conosco' => array('nome'=>'txt_cod_trabalhe_conosco','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_profissional' => array('nome'=>'txt_nom_profissional','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		'email_profissional' => array('nome'=>'txt_email_profissional','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		'num_cpf_profissional' => array('nome'=>'txt_num_cpf_profissional','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'),
		'dat_nascimento' => array('nome'=>'txt_dat_nascimento','tipo'=>'date','sortable'=>'yes', 'tamanho'=> '60'),
		'num_tel_fixo' => array('nome'=>'txt_num_tel_fixo','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'),
		'num_tel_cel' => array('nome'=>'txt_num_tel_cel','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'),
		'dsc_obj_profissional' => array('nome'=>'txt_dsc_obj_profissional','tipo'=>'double','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'));
            
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
		function getCodTrabalheConosco() { 	return $this->cod_trabalhe_conosco; }
			function getNomProfissional() { 	return $this->nom_profissional; }
			function getEmailProfissional() { 	return $this->email_profissional; }
			function getNumCpfProfissional() { 	return $this->num_cpf_profissional; }
			function getDatNascimento() { 	return $this->dat_nascimento; }
			function getNumTelFixo() { 	return $this->num_tel_fixo; }
			function getNumTelCel() { 	return $this->num_tel_cel; }
			function getDscObjProfissional() { 	return $this->dsc_obj_profissional; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodTrabalheConosco($val) { $this->cod_trabalhe_conosco =  $val; }
		    function setNomProfissional($val) { $this->nom_profissional =  $val; }
		    function setEmailProfissional($val) { $this->email_profissional =  $val; }
		    function setNumCpfProfissional($val) { $this->num_cpf_profissional =  $val; }
		    function setDatNascimento($val) { $this->dat_nascimento =  $val; }
		    function setNumTelFixo($val) { $this->num_tel_fixo =  $val; }
		    function setNumTelCel($val) { $this->num_tel_cel =  $val; }
		    function setDscObjProfissional($val) { $this->dsc_obj_profissional =  $val; }
		    function setDatCadastro($val) { $this->dat_cadastro =  $val; }
		
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
