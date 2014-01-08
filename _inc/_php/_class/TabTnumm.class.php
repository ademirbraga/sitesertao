<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabTnumm
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/TabTnumm.class.php
	* Tabela:           tab_tnumm
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabTnumm extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabTnumm.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabTnumm;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABTNUMM;
	
	
                 protected $cod_TNUMM;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $nom_arq_TNUMM;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_TNUMM' => array('nome'=>'txt_cod_TNUMM','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		//'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_arq_TNUMM' => array('nome'=>'txt_nom_arq_TNUMM','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
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
		function getCodTNUMM() { 	return $this->cod_TNUMM; }
			function getCodUsuario() { 	return $this->cod_usuario; }
			function getNomArqTNUMM() { 	return $this->nom_arq_TNUMM; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodTNUMM($val) { $this->cod_TNUMM =  $val; }
		    function setCodUsuario($val) { $this->cod_usuario =  $val; }
		    function setNomArqTNUMM($val) { $this->nom_arq_TNUMM =  $val; }
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
	
	/**

	* Sobrescrita de metodo para efetuar a validacao da insercao

	* @param  $data

	* @param bool $forceUpdate

	* @return bool

	*/
       public function inserir($data = null, $forceUpdate = false) {

	   if (empty($data))
	       return 0;

	   $caminho = explode("/", trim($data['nom_arq_TNUMM']));	   
	    //print_r($data['dat_finalizado']);
	    if(empty($caminho[2])){
		$data['nom_arq_TNUMM'] = WWW_UPLOAD_TABELA.'_tnumm/'.$data['nom_arq_TNUMM'];
	    }  else {
		$data['nom_arq_TNUMM'] = $data['nom_arq_TNUMM'];	
	    }

	    if(!empty($data['dat_finalizado'])){
		$datafinal = explode('/', $data['dat_finalizado']);		
		$data['dat_finalizado'] = date("Y-m-d H:i:s",mktime(23,59,59,$datafinal[1],$datafinal[0],$datafinal[2]));
	    }else
		unset($data['dat_finalizado']);		
	    	    		
	   //echo "ANTES==";print_r($data);
	   //$ret = $this->objToArray();  print_r($ret);       
	   $this->populate($data);
	   //echo "DEPOIS";print_r($data);	   

	   $cod_TNUMM = parent::inserir(NULL, $forceUpdate);

	   return $cod_TNUMM;

       }
	
	// **********************
	// Método cadastrar abstrato
	// **********************
  	
	// **********************
	// Cancelar abstrato
	// **********************

    
} // classe : fim

?>
