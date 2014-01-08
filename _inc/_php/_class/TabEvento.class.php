<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabEvento
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/Evento.class.php
	* Tabela:           tab_evento
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabEvento extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabEvento.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabEvento;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABEVENTO;
	
	
	protected $cod_evento;		


	protected $cod_usuario;		


	protected $cod_evento_tipo;		


	protected $nom_evento;		


	protected $dsc_evento;		


	protected $dat_cadastro;		


	protected $dat_inicio;		


	protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_evento' => array('nome'=>'txt_cod_evento','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		//'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_evento_tipo' => array('nome'=>'txt_nom_evento_tipo','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_evento' => array('nome'=>'txt_nom_evento','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		//'dsc_evento' => array('nome'=>'txt_dsc_evento','tipo'=>'double','sortable'=>'yes', 'tamanho'=> '60'),
		//'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_inicio' => array('nome'=>'txt_dat_inicio','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_finalizado' => array('nome'=>'txt_dat_finalizado','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'));
            
	// **********************
	// Construtor da classe
	// **********************
	function __construct()
	{
		parent::__construct(DBPADRAO);
		$this->filtroCancelamento(true,'(A.dat_termino IS NULL or A.dat_termino >= CURRENT_TIMESTAMP)');
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
	function getCodEvento() { 	return $this->cod_evento; }
	function getCodUsuario() { 	return $this->cod_usuario; }
	function getCodEventoTipo() { 	return $this->cod_evento_tipo; }
	function getNomEvento() { 	return $this->nom_evento; }
	function getDscEvento() { 	return $this->dsc_evento; }
	function getDatCadastro() { 	return $this->dat_cadastro; }
	function getDatInicio() { 	return $this->dat_inicio; }
	function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	function setCodEvento($val) { $this->cod_evento =  $val; }
	function setCodUsuario($val) { $this->cod_usuario =  $val; }
	function setCodEventoTipo($val) { $this->cod_evento_tipo =  $val; }
	function setNomEvento($val) { $this->nom_evento =  $val; }
	function setDscEvento($val) { $this->dsc_evento =  $val; }
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
	
	public function listarPorRef($cols = "*", $where = '', $limit = false, $group = 'A.cod_evento') {

            $join = array(
			'B' => array(
				TTABEVENTOTIPO,
				'B.cod_evento_tipo = A.cod_evento_tipo',
				'B.nom_evento_tipo'
			),
			'C' => array(
				TTABEVENTOPERMITIDO,
				'C.cod_evento = A.cod_evento',
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

	   if(!empty($data['dat_finalizado'])){
		$datafinal = explode('/', $data['dat_finalizado']);		
		$data['dat_finalizado'] = date("Y-m-d H:i:s",mktime(23,59,59,$datafinal[1],$datafinal[0],$datafinal[2]));
	    }else
		unset($data['dat_finalizado']);
	    
	    //echo "ANTES==";print_r($data);die;
	   //$ret = $this->objToArray();  print_r($ret);       
	   $this->populate($data);
	   //echo "DEPOIS";print_r($data);
	   $cod_evento = parent::inserir(NULL, $forceUpdate);
	   
	   /**
	    * Cadastro de Permissao
	    */
	   $objEvPerm = new TabEventoPermitido();
	   $data['cod_evento'] = $cod_evento;
	   $arrayPefil = $data['cod_perfil'];
	   if (is_array($arrayPefil)){	       
	       unset($data['cod_perfil']);
	       foreach ($arrayPefil as $k => $val){
		   $data['cod_perfil'] = $val;
		   $cod_evento_permitido = $objEvPerm->inserir($data, true);		   
	       }
	   }else {
	       $cod_evento_permitido = $objEvPerm->inserir($data, true);
	   }	   

	   return $cod_evento;
       }
	// **********************
	// Cancelar abstrato
	// **********************
       public function excluir( $registro = null ) {	    
	    
	    $data['dat_termino'] = date("Y-m-d H:i:s");
	    
	    if( isset($registro['chave'] )) {		    	
		$where = "cod_evento = '{$registro['chave']}'";;
    		parent::atualizar( $data, $where );			
	    }else{
		if(is_array($registro)){		    
		    foreach ($registro as $key => $value) {			
			$where = "cod_evento = '{$value}'";;
			parent::atualizar( $data, $where );			
		    }
		}		
	    }
	}
    
} // classe : fim

?>
