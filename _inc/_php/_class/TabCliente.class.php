<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabCliente
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/Cliente.class.php
	* Tabela:           tab_cliente
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabCliente extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabCliente.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabCliente;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABCLIENTE;
	
	
                 protected $cod_cliente;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $cod_cliente_tipo;		
                     
                
                 protected $nom_cliente;		
                     
                
                 protected $num_cpf_cnpj;		
                     
                
                 protected $nom_email;		
                     
                
                 protected $num_telefone;		
                     
                
                 protected $num_celular;		
                     
                
                 protected $num_rg;		
                     
                
                 protected $num_rg_orgao;		
                     
                
                 protected $num_rg_data;		
                     
                
                 protected $nom_login_acesso;		
                     
                
                 protected $nom_senha_acesso;		
                     
                
                 protected $num_cartao;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_cancelamento;		
                     
                
	private $_camposLst = array('cod_cliente' => array('nome'=>'txt_cod_cliente','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		//'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		//'cod_cliente_tipo' => array('nome'=>'txt_cod_cliente_tipo','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_cliente' => array('nome'=>'txt_nom_cliente','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		'num_cpf_cnpj' => array('nome'=>'txt_num_cpf_cnpj','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'),
		'nom_email' => array('nome'=>'txt_nom_email','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		'num_telefone' => array('nome'=>'txt_num_telefone','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'),
		'num_celular' => array('nome'=>'txt_num_celular','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'),
		//'num_rg' => array('nome'=>'txt_num_rg','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'),
		//'num_rg_orgao' => array('nome'=>'txt_num_rg_orgao','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'),
		//'num_rg_data' => array('nome'=>'txt_num_rg_data','tipo'=>'date','sortable'=>'yes', 'tamanho'=> '60'),
		//'nom_login_acesso' => array('nome'=>'txt_nom_login_acesso','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		//'nom_senha_acesso' => array('nome'=>'txt_nom_senha_acesso','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		//'num_cartao' => array('nome'=>'txt_num_cartao','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60')
		//'dat_cancelamento' => array('nome'=>'txt_dat_cancelamento','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60')
		);
            
	// **********************
	// Construtor da classe
	// **********************
	
            function __construct()
            {
                    parent::__construct(DBPADRAO);
		    $this->filtroCancelamento(true,'(dat_cancelamento IS NULL or dat_cancelamento >= CURRENT_TIMESTAMP)');
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
	function getCodCliente() { 	return $this->cod_cliente; }
	function getCodUsuario() { 	return $this->cod_usuario; }
	function getCodClienteTipo() { 	return $this->cod_cliente_tipo; }
	function getNomCliente() { 	return $this->nom_cliente; }
	function getNumCpfCnpj() { 	return $this->num_cpf_cnpj; }
	function getNomEmail() { 	return $this->nom_email; }
	function getNumTelefone() { 	return $this->num_telefone; }
	function getNumCelular() { 	return $this->num_celular; }
	function getNumRg() { 	return $this->num_rg; }
	function getNumRgOrgao() { 	return $this->num_rg_orgao; }
	function getNumRgData() { 	return $this->num_rg_data; }
	function getNomLoginAcesso() { 	return $this->nom_login_acesso; }
	function getNomSenhaAcesso() { 	return $this->nom_senha_acesso; }
	function getNumCartao() { 	return $this->num_cartao; }
	function getDatCadastro() { 	return $this->dat_cadastro; }
	function getDatCancelamento() { 	return $this->dat_cancelamento; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodCliente($val) { $this->cod_cliente =  $val; }
	    function setCodUsuario($val) { $this->cod_usuario =  $val; }
	    function setCodClienteTipo($val) { $this->cod_cliente_tipo =  $val; }
	    function setNomCliente($val) { $this->nom_cliente =  $val; }
	    function setNumCpfCnpj($val) { $this->num_cpf_cnpj =  $val; }
	    function setNomEmail($val) { $this->nom_email =  $val; }
	    function setNumTelefone($val) { $this->num_telefone =  $val; }
	    function setNumCelular($val) { $this->num_celular =  $val; }
	    function setNumRg($val) { $this->num_rg =  $val; }
	    function setNumRgOrgao($val) { $this->num_rg_orgao =  $val; }
	    function setNumRgData($val) { $this->num_rg_data =  $val; }
	    function setNomLoginAcesso($val) { $this->nom_login_acesso =  $val; }
	    function setNomSenhaAcesso($val) { $this->nom_senha_acesso =  $val; }
	    function setNumCartao($val) { $this->num_cartao =  $val; }
	    function setDatCadastro($val) { $this->dat_cadastro =  $val; }
	    function setDatCancelamento($val) { $this->dat_cancelamento =  $val; }
		
	// **********************
	// Método listar abstrato
	// **********************
	
        /**
	* Configuração para listagem 
	*/
	function configMod(){
	}
			
	function isLogado() {
		return $this->_logado;
	}
	
	function isCancelado() {
		if (! empty ( $this->dat_cancelamento )) {
			
			$arr = explode ( ' ', $this->dat_cancelamento );
			$dat = implode ( '-', array_reverse ( explode ( '/', $arr [0] ) ) ) . ' ' . $arr [1];
			$this->_cancelado = (strtotime ( $dat ) < strtotime ( date ( "Y-m-d G:i:s" ) )) ? true : false;
		}
		return $this->_cancelado;
	}
	
	function setLogado($flg) {
		$this->_logado = $flg;
	}
	
	function logon() {
		$this->_logado = true;
	}
	
	function logoff() {
		$this->_logado = false;
	}
	
	// **********************
	// Método cadastrar abstrato
	// **********************
	
	/**
	* Sobrescrita de metodo para efetuar a validacao da insercao
	* @param  $data
	* @param bool $forceUpdate
	* @return bool
	*/
       public function inserir($data, $forceUpdate = false) {

	   if (empty($data))
	       return 0;

	   if (empty($data['nom_senha_acesso']))
	       unset($data['nom_senha_acesso']);
	   else {
	       $data['nom_senha_acesso'] = md5($data['nom_senha_acesso']);
	   }
	   
	   $this->populate($data);
	   
	   return $cod_cliente = parent::inserir($data, $forceUpdate);
       }
       
	// **********************
	// Cancelar abstrato
	// **********************
	public function excluir( $registro = null ) {	    
	    
	    $data['dat_cancelamento'] = date("Y-m-d H:i:s");
	    
	    if( isset($registro['chave'] )) {		    	
		$where = "cod_cliente = '{$registro['chave']}'";;
    		parent::atualizar( $data, $where );			
	    }else{
		if(is_array($registro)){		    
		    foreach ($registro as $key => $value) {			
			$where = "cod_cliente = '{$value}'";;
			parent::atualizar( $data, $where );			
		    }
		}		
	    }
	}
	
	/**
	* @name verificaUsuario
	* @param array $aPost
	* @desc Verifica se um login ja existe
	*/
       public function verificaLogin($login, $codUser) {

	   $and = ($codUser != '') ? " and cod_cliente <> '$codUser'" : '';

	   return $this->recordCount($where = "nom_login_acesso = '$login'  and cod_cliente <> '$codUser'") > 0 ? true : false;
       }
	
} // classe : fim
?>
