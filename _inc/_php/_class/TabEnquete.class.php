<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabEnquete
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/Enquete.class.php
	* Tabela:           tab_enquete
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabEnquete extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabEnquete.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabEnquete;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABENQUETE;
	
	
                 protected $cod_enquete;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $nom_titulo;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_inicio;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_enquete' => array('nome'=>'txt_cod_enquete','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		//'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_titulo' => array('nome'=>'txt_nom_titulo_enquete','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		//'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_inicio' => array('nome'=>'txt_dat_inicio','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_finalizado' => array('nome'=>'txt_dat_finalizado','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'));
            
	// **********************
	// Construtor da classe
	// **********************
	
	function __construct()
	{
		parent::__construct(DBPADRAO);
		$this->filtroCancelamento(true,'(dat_termino IS NULL or dat_termino >= CURRENT_TIMESTAMP)');
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
	function getCodEnquete() { 	return $this->cod_enquete; }
	function getCodUsuario() { 	return $this->cod_usuario; }
	function getNomTitulo() { 	return $this->nom_titulo; }
	function getDatCadastro() { 	return $this->dat_cadastro; }
	function getDatInicio() { 	return $this->dat_inicio; }
	function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	function setCodEnquete($val) { $this->cod_enquete =  $val; }
	function setCodUsuario($val) { $this->cod_usuario =  $val; }
	function setNomTitulo($val) { $this->nom_titulo =  $val; }
	function setDatCadastro($val) { $this->dat_cadastro =  $val; }
	function setDatInicio($val) { $this->dat_inicio =  $val; }
	function setDatFinalizado($val) { $this->dat_finalizado =  $val; }
		
	// **********************
	// Método listar abstrato
	// **********************
	
        /**
	* Configuração para listagem 
	*/
	function configMod(){
	}
		
	public function listEnqueteAlternativas($cols = "*", $where = '', $limit = false, $group = '') {
	    
		$this->filtroCancelamento(false);

		$join = array(
			'B' => array(
				TTABENQUETEALTERNATIVA,
				'B.cod_enquete = A.cod_enquete',
				'B.*'
			),
			'C' => array(
				TTABENQUETEPERMITIDO,
				'C.cod_enquete = A.cod_enquete',
				'C.cod_perfil'
			)
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
	    
	    //se for editar tirando a data do cadastro
	    if($data['f_action'] == 8)
		unset ($data['dat_cadastro']);
	    
	    //Adicionando as horas do finais para a data
	    if(!empty($data['dat_finalizado'])){
		$datafinal = explode('/', $data['dat_finalizado']);		
		$data['dat_finalizado'] = date("Y-m-d H:i:s",mktime(23,59,59,$datafinal[1],$datafinal[0],$datafinal[2]));
	    }else
		unset($data['dat_finalizado']);
	    
	    //echo "ANTES==";print_r($data);die;
	    //$ret = $this->objToArray();  print_r($ret);       
	    $this->populate($data);
	    //echo "DEPOIS";print_r($data);
	    $cod_enquete = parent::inserir(NULL, $forceUpdate);
	    
	    /**
	     * Cadastro de Permissao
	     */
	    $objEnPerm = new TabEnquetePermitido();
	    $data['cod_enquete'] = $cod_enquete;
	    
	    if(!empty($data['cod_enquete']))
		$objEnPerm->excluir("cod_enquete=".$data['cod_enquete']);
	    
	    $arrayPefil = $data['cod_perfil'];
	    if (is_array($arrayPefil)){	       
		unset($data['cod_perfil']);
		foreach ($arrayPefil as $k => $val){
		    $data['cod_perfil'] = $val;
		    $cod_enquete_permitido = $objEnPerm->inserir($data, true);		   
		}
	    }else {
		$cod_enquete_permitido = $objEvPerm->inserir($data,true);
	    }	
	    
	    
	    
	    /**
	     * Cadastro de Alternativa
	     */
	    $objEnAlter = new TabEnqueteAlternativa();	    
	    $arrayAlter = $data['nom_enquete_alternativa'];
	    $arrayCODAlter = $data['cod_enquete_alternativa'];
	    if (is_array($arrayAlter)){	       
		unset($data['nom_enquete_alternativa']);		
		foreach ($arrayAlter as $k => $val){		    
		    if(!empty($val)){
			$data['cod_enquete_alternativa'] = $arrayCODAlter[$k];
			$data['nom_enquete_alternativa'] = $val;					
			$cod_enquete_alternartiva = $objEnAlter->inserir($data, true);		   
		    }else{
			//se for editar tirando a data do cadastro
			if($data['f_action'] == 8){
			    if(!empty($arrayCODAlter[$k]))
				$objEnAlter->excluir("cod_enquete_alternativa=".$arrayCODAlter[$k]);  
			}			    
		    }
		}
	    }else {
		$cod_enquete_alternartiva = $objEnAlter->inserir($data, true);
	    }

	    return $cod_enquete;
	}
	// **********************
	// Cancelar abstrato
	// **********************
	public function excluir( $registro = null ) {	    
	    
	    $data['dat_termino'] = date("Y-m-d H:i:s");
	    
	    if( isset($registro['chave'] )) {		    	
		$where = "cod_enquete = '{$registro['chave']}'";;
    		parent::atualizar( $data, $where );			
	    }else{
		if(is_array($registro)){		    
		    foreach ($registro as $key => $value) {			
			$where = "cod_enquete = '{$value}'";;
			parent::atualizar( $data, $where );			
		    }
		}		
	    }
	}

    
} // classe : fim

?>