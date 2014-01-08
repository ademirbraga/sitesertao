<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabCid
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/Cid.class.php
	* Tabela:           tab_cid
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabCid extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabCid.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabCid;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABCID;
	
	
                 protected $cod_CID;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $nom_arq_CID;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_CID' => array('nome'=>'txt_cod_CID','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		//'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_arq_CID' => array('nome'=>'txt_nom_arq_CID','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
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
		function getCodCid() { 	return $this->cod_CID; }
			function getCodUsuario() { 	return $this->cod_usuario; }
			function getNomArqCid() { 	return $this->nom_arq_CID; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodCid($val) { $this->cod_CID =  $val; }
		    function setCodUsuario($val) { $this->cod_usuario =  $val; }
		    function setNomArqCid($val) { $this->nom_arq_CID =  $val; }
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

	   $caminho = explode("/", trim($data['nom_arq_CID']));	   
	   //print_r($caminho);
	   if(empty($caminho[2])){
		$data['nom_arq_CID'] = WWW_UPLOAD_TABELA.'_cid/'.$data['nom_arq_CID'];
	   }else
	       $data['nom_arq_CID'] = WWW_UPLOAD_TABELA.'_cid/'.$data['nom_arq_CID'];

	   if(!empty($data['dat_finalizado'])){
		$datafinal = explode('/', $data['dat_finalizado']);		
		$data['dat_finalizado'] = date("Y-m-d H:i:s",mktime(23,59,59,$datafinal[1],$datafinal[0],$datafinal[2]));
	    }else
		unset($data['dat_finalizado']);
	   
	    ////echo "ANTES==";print_r($data);
	   //$ret = $this->objToArray();  print_r($ret);       
	   $this->populate($data);
	   //echo "DEPOIS";print_r($data);	

	   $cod_CID = parent::inserir(NULL, $forceUpdate);

	   return $cod_CID;

       }
	// **********************
	// Cancelar abstrato
	// **********************

    
} // classe : fim

?>
