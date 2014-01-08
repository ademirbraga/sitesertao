<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabSinistrometro
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/Sinistrometro.class.php
	* Tabela:           tab_sinistrometro
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabSinistrometro extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabSinistrometro.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabSinistrometro;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABSINISTROMETRO;
	
	
                 protected $cod_sinistrometro;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $val_sinistrometro;		
                     
                
                 protected $dat_sinistrometro;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_sinistrometro' => array('nome'=>'txt_cod_sinistrometro','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		//'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'val_sinistrometro' => array('nome'=>'txt_val_sinistrometro','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'),
		'dat_sinistrometro' => array('nome'=>'txt_dat_sinistrometro','tipo'=>'date','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60')
		//'dat_finalizado' => array('nome'=>'txt_dat_finalizado','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60')
		);
            
	// **********************
	// Construtor da classe
	// **********************
	
            function __construct()
            {
                    parent::__construct(DBPADRAO);
		    $this->filtroCancelamento(true,'(dat_finalizado IS NULL or dat_finalizado >= CURRENT_TIMESTAMP)');
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
		function getCodSinistrometro() { 	return $this->cod_sinistrometro; }
			function getCodUsuario() { 	return $this->cod_usuario; }
			function getValSinistrometro() { 	return $this->val_sinistrometro; }
			function getDatSinistrometro() { 	return $this->dat_sinistrometro; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodSinistrometro($val) { $this->cod_sinistrometro =  $val; }
		    function setCodUsuario($val) { $this->cod_usuario =  $val; }
		    function setValSinistrometro($val) { $this->val_sinistrometro =  $val; }
		    function setDatSinistrometro($val) { $this->dat_sinistrometro =  $val; }
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
	    
	    //echo "ANTES==";print_r($data);
	    //$ret = $this->objToArray();  print_r($ret);       
	    $this->populate($data);
	    //echo "DEPOIS";print_r($data);	

	    $cod_sinistrometro = parent::inserir(NULL, $forceUpdate);

	    return $cod_sinistrometro;

	}
	
	// **********************
	// Cancelar abstrato
	// **********************
	public function excluir( $registro = null ) {	    
	    
	    $data['dat_finalizado'] = date("Y-m-d H:i:s");
	    
	    if( isset($registro['chave'] )) {		    	
		$where = "cod_sinistrometro = '{$registro['chave']}'";;
    		parent::atualizar( $data, $where );			
	    }else{
		if(is_array($registro)){		    
		    foreach ($registro as $key => $value) {			
			$where = "cod_sinistrometro = '{$value}'";;
			parent::atualizar( $data, $where );			
		    }
		}		
	    }
	}
    
} // classe : fim

?>
