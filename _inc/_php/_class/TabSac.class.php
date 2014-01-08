<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabSac
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/Sac.class.php
	* Tabela:           tab_sac
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabSac extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabSac.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabSac;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABSAC;
	
	
                 protected $cod_sac;		
                     
                
                 protected $cod_protocolo;		
                     
                
                 protected $cod_cliente;		
                     
                
                 protected $num_atendimento;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_sac' => array('nome'=>'txt_cod_sac','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_protocolo' => array('nome'=>'txt_cod_protocolo','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		'nom_cliente' => array('nome'=>'txt_nom_cliente','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '11'),
		//'num_atendimento' => array('nome'=>'txt_num_atendimento','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_finalizado' => array('nome'=>'txt_dat_finalizado','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60')
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
		function getCodSac() { 	return $this->cod_sac; }
			function getCodProtocolo() { 	return $this->cod_protocolo; }
			function getCodCliente() { 	return $this->cod_cliente; }
			function getNumAtendimento() { 	return $this->num_atendimento; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodSac($val) { $this->cod_sac =  $val; }
		    function setCodProtocolo($val) { $this->cod_protocolo =  $val; }
		    function setCodCliente($val) { $this->cod_cliente =  $val; }
		    function setNumAtendimento($val) { $this->num_atendimento =  $val; }
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

		return $this->consulta( $cols, null, $join, $where,$group,$limit);	
	}
	
	public function listarAtendimentos($cols = "*", $where = '', $limit = false, $group = '') {

            $join = array(

			'B' => array(

				TTABCLIENTE,

				'B.cod_cliente = A.cod_cliente',

				'B.nom_cliente'

			),
                        'C' => array(

				TTABSACATENDIMENTOS,

				'C.cod_sac = A.cod_sac',

				'C.*'

			),
			'D' => array(

				TSISUSUARIO,

				'D.cod_usuario = C.cod_usuario',

				'D.nom_usuario'

			),

		);

		return $this->consulta( $cols, null, $join, $where,$group,$limit);	
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

	   
	   if(!empty($data['dat_finalizado'])){
		$datafinal = explode('/', $data['dat_finalizado']);		
		$data['dat_finalizado'] = date("Y-m-d H:i:s",mktime(23,59,59,$datafinal[1],$datafinal[0],$datafinal[2]));
	    }else
		unset($data['dat_finalizado']);
	   
	    if(!empty($data['cod_sac']))
		unset($data['dat_cadastro']);
	    
	   //echo "ANTES==";print_r($data);
	   //$ret = $this->objToArray();  print_r($ret);       
	   $this->populate($data);
	   //echo "DEPOIS";print_r($data);	

	   $cod_sac = parent::inserir(NULL, $forceUpdate);

	   if(!empty($cod_sac['cod_sac']))
		$data['cod_sac'] = $cod_sac['cod_sac'];
	    else {
		$data['cod_sac'] = $cod_sac;
	    }
	    
	   $data['dat_cadastro'] = date("Y-m-d H:i:s");
	   
	   $objAtend = new TabSacAtendimentos();
	   $cod_sac_atendimentos = $objAtend->inserir($data, true);
	   
	   return $cod_sac;
       }
	// **********************
	// Cancelar abstrato
	// **********************

    
} // classe : fim

?>
