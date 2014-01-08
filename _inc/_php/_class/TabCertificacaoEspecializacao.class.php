<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabCertificacaoEspecializacao
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/CertificacaoEspecializacao.class.php
	* Tabela:           tab_certificacao_especializacao
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabCertificacaoEspecializacao extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabCertificacaoEspecializacao.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabCertificacaoEspecializacao;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABCERTIFICACAOESPECIALIZACAO;
	
	
                 protected $cod_certificacao_especializacao;		
                     
                
                 protected $nom_certificacao;		
                     
                
                 protected $dsc_certificacao;		
                     
                
                 protected $dat_certificacao;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_certificacao_especializacao' => array('nome'=>'txt_cod_certificacao_especializacao','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_certificacao' => array('nome'=>'txt_nom_certificacao','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		'dsc_certificacao' => array('nome'=>'txt_dsc_certificacao','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		'dat_certificacao' => array('nome'=>'txt_dat_certificacao','tipo'=>'date','sortable'=>'yes', 'tamanho'=> '60'),
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
		function getCodCertificacaoEspecializacao() { 	return $this->cod_certificacao_especializacao; }
			function getNomCertificacao() { 	return $this->nom_certificacao; }
			function getDscCertificacao() { 	return $this->dsc_certificacao; }
			function getDatCertificacao() { 	return $this->dat_certificacao; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodCertificacaoEspecializacao($val) { $this->cod_certificacao_especializacao =  $val; }
		    function setNomCertificacao($val) { $this->nom_certificacao =  $val; }
		    function setDscCertificacao($val) { $this->dsc_certificacao =  $val; }
		    function setDatCertificacao($val) { $this->dat_certificacao =  $val; }
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
