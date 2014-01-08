<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabDebitoAutomatico
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/DebitoAutomatico.class.php
	* Tabela:           tab_debito_automatico
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabDebitoAutomatico extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabDebitoAutomatico.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabDebitoAutomatico;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABDEBITOAUTOMATICO;
	
	
	protected $cod_debito_automatico;		


	protected $cod_usuario;		


	protected $cod_cliente;		


	protected $nom_titular_conta;		


	protected $num_agencia_conta;		


	protected $dat_cadastro;		


	protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_debito_automatico' => array('nome'=>'txt_cod_debito_automatico','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		//'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		//'cod_cliente' => array('nome'=>'txt_cod_cliente','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_cliente' => array('nome'=>'txt_nom_cliente','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		'nom_titular_conta' => array('nome'=>'txt_nom_titular_conta','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		'num_agencia_conta' => array('nome'=>'txt_num_agencia_conta','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60')
		//'dat_finalizado' => array('nome'=>'txt_dat_finalizado','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60')
		);
            
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
	function getCodDebitoAutomatico() { 	return $this->cod_debito_automatico; }
	function getCodUsuario() { 	return $this->cod_usuario; }
	function getCodCliente() { 	return $this->cod_cliente; }
	function getNomTitularConta() { 	return $this->nom_titular_conta; }
	function getNumAgenciaConta() { 	return $this->num_agencia_conta; }
	function getDatCadastro() { 	return $this->dat_cadastro; }
	function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	function setCodDebitoAutomatico($val) { $this->cod_debito_automatico =  $val; }
	function setCodUsuario($val) { $this->cod_usuario =  $val; }
	function setCodCliente($val) { $this->cod_cliente =  $val; }
	function setNomTitularConta($val) { $this->nom_titular_conta =  $val; }
	function setNumAgenciaConta($val) { $this->num_agencia_conta =  $val; }
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
	
	public function listarPorRef($cols = "*", $where = '', $limit = false, $group = '') {

            $join = array(
			'B' => array(
				TTABCLIENTE,
				'B.cod_cliente = A.cod_cliente',
				'B.nom_cliente'
			)
		);

		return $this->consulta( null, null, $join, $where);	    
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
       public function inserir($data = null, $forceUpdate = false) {

	   if (empty($data))
	       return 0;
	   
	   //echo "ANTES==";print_r($data);	   
	   $this->populate($data);
	   //echo "DEPOIS";print_r($data);
	   
	   $cod_debito_automatico = parent::inserir(NULL, $forceUpdate);
	   //print_r($cod_debito_automatico);die;
	   

	   return $cod_debito_automatico;
       }
	// **********************
	// Cancelar abstrato
	// **********************

    
} // classe : fim

?>
