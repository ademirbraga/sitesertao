<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabClienteCardio
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/ClienteCardio.class.php
	* Tabela:           tab_cliente_cardio
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabClienteCardio extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabClienteCardio.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabClienteCardio;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABCLIENTECARDIO;
	
	
                 protected $cod_cliente_cardio;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $nom_endereco;		
                     
                
                 protected $num_endereco;		
                     
                
                 protected $nom_complemento;		
                     
                
                 protected $nom_bairro;		
                     
                
                 protected $nom_cidade;		
                     
                
                 protected $nom_estado;		
                     
                
                 protected $nom_email;		
                     
                
                 protected $num_telefone;		
                     
                
                 protected $num_celular;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_cliente_cardio' => array('nome'=>'txt_cod_cliente_cardio','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_endereco' => array('nome'=>'txt_nom_endereco','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		'num_endereco' => array('nome'=>'txt_num_endereco','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_complemento' => array('nome'=>'txt_nom_complemento','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		'nom_bairro' => array('nome'=>'txt_nom_bairro','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		'nom_cidade' => array('nome'=>'txt_nom_cidade','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		'nom_estado' => array('nome'=>'txt_nom_estado','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		'nom_email' => array('nome'=>'txt_nom_email','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		'num_telefone' => array('nome'=>'txt_num_telefone','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'),
		'num_celular' => array('nome'=>'txt_num_celular','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'),
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
		function getCodClienteCardio() { 	return $this->cod_cliente_cardio; }
			function getCodUsuario() { 	return $this->cod_usuario; }
			function getNomEndereco() { 	return $this->nom_endereco; }
			function getNumEndereco() { 	return $this->num_endereco; }
			function getNomComplemento() { 	return $this->nom_complemento; }
			function getNomBairro() { 	return $this->nom_bairro; }
			function getNomCidade() { 	return $this->nom_cidade; }
			function getNomEstado() { 	return $this->nom_estado; }
			function getNomEmail() { 	return $this->nom_email; }
			function getNumTelefone() { 	return $this->num_telefone; }
			function getNumCelular() { 	return $this->num_celular; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodClienteCardio($val) { $this->cod_cliente_cardio =  $val; }
		    function setCodUsuario($val) { $this->cod_usuario =  $val; }
		    function setNomEndereco($val) { $this->nom_endereco =  $val; }
		    function setNumEndereco($val) { $this->num_endereco =  $val; }
		    function setNomComplemento($val) { $this->nom_complemento =  $val; }
		    function setNomBairro($val) { $this->nom_bairro =  $val; }
		    function setNomCidade($val) { $this->nom_cidade =  $val; }
		    function setNomEstado($val) { $this->nom_estado =  $val; }
		    function setNomEmail($val) { $this->nom_email =  $val; }
		    function setNumTelefone($val) { $this->num_telefone =  $val; }
		    function setNumCelular($val) { $this->num_celular =  $val; }
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
