<?php
	/*
	* @autor F3TEC - Claudia Matos - claudiarfm@yahoo.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabAuditClassificacao
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_inc/_php/_class/TabAuditClassificacao.class.php
	* Tabela:           tab_audit_classificacao
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/
	
	class TabAuditClassificacao extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabAuditClassificacao.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabAuditClassificacao;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABAUDITCLASSIFICACAO;
	
	
                 protected $cod_audit_classificacao;		
                     
                
                 protected $cod_propr_classif;		
                     
                
                 protected $dat_desativacao;		
                     
                
                 protected $cod_usuario;		
                     
                
	private $_camposLst = array('cod_audit_classificacao' => array('nome'=>'txt_cod_audit_classificacao','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_propr_classif' => array('nome'=>'txt_cod_propr_classif','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'dat_desativacao' => array('nome'=>'txt_dat_desativacao','tipo'=>'datetime','sortable'=>'yes', 'tamanho'=> '60'),
		'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'));
            
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
		function getCodAuditClassificacao() { 	return $this->cod_audit_classificacao; }
			function getCodProprClassif() { 	return $this->cod_propr_classif; }
			function getDatDesativacao() { 	return $this->dat_desativacao; }
			function getCodUsuario() { 	return $this->cod_usuario; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodAuditClassificacao($val) { $this->cod_audit_classificacao =  $val; }
		    function setCodProprClassif($val) { $this->cod_propr_classif =  $val; }
		    function setDatDesativacao($val) { $this->dat_desativacao =  $val; }
		    function setCodUsuario($val) { $this->cod_usuario =  $val; }
		
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
