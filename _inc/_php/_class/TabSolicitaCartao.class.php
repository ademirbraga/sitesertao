<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabSolicitaCartao
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/SolicitaCartao.class.php
	* Tabela:           tab_solicita_cartao
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabSolicitaCartao extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabSolicitaCartao.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabSolicitaCartao;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABSOLICITACARTAO;
	
	
                 protected $cod_solicita_cartao;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $nom_solicita_cartao;		
                     
                
                 protected $dat_nascimento_cartao;		
                     
                
                 protected $num_cpf_cartao;		
                     
                
                 protected $nom_titular_cartao;		
                     
                
                 protected $num_titular_cartao;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finaliza;		
                     
                
	private $_camposLst = array('cod_solicita_cartao' => array('nome'=>'txt_cod_solicita_cartao','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_solicita_cartao' => array('nome'=>'txt_nom_solicita_cartao','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		'dat_nascimento_cartao' => array('nome'=>'txt_dat_nascimento_cartao','tipo'=>'date','sortable'=>'yes', 'tamanho'=> '60'),
		'num_cpf_cartao' => array('nome'=>'txt_num_cpf_cartao','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'),
		'nom_titular_cartao' => array('nome'=>'txt_nom_titular_cartao','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		'num_titular_cartao' => array('nome'=>'txt_num_titular_cartao','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_finaliza' => array('nome'=>'txt_dat_finaliza','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'));
            
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
		function getCodSolicitaCartao() { 	return $this->cod_solicita_cartao; }
			function getCodUsuario() { 	return $this->cod_usuario; }
			function getNomSolicitaCartao() { 	return $this->nom_solicita_cartao; }
			function getDatNascimentoCartao() { 	return $this->dat_nascimento_cartao; }
			function getNumCpfCartao() { 	return $this->num_cpf_cartao; }
			function getNomTitularCartao() { 	return $this->nom_titular_cartao; }
			function getNumTitularCartao() { 	return $this->num_titular_cartao; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinaliza() { 	return $this->dat_finaliza; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodSolicitaCartao($val) { $this->cod_solicita_cartao =  $val; }
		    function setCodUsuario($val) { $this->cod_usuario =  $val; }
		    function setNomSolicitaCartao($val) { $this->nom_solicita_cartao =  $val; }
		    function setDatNascimentoCartao($val) { $this->dat_nascimento_cartao =  $val; }
		    function setNumCpfCartao($val) { $this->num_cpf_cartao =  $val; }
		    function setNomTitularCartao($val) { $this->nom_titular_cartao =  $val; }
		    function setNumTitularCartao($val) { $this->num_titular_cartao =  $val; }
		    function setDatCadastro($val) { $this->dat_cadastro =  $val; }
		    function setDatFinaliza($val) { $this->dat_finaliza =  $val; }
		
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
