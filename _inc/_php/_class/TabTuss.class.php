<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabTuss
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/Tuss.class.php
	* Tabela:           tab_tuss
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabTuss extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabTuss.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabTuss;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABTUSS;
	
	
                 protected $cod_TUSS;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $nom_arq_TUSS;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_TUSS' => array('nome'=>'txt_cod_TUSS','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		//'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_arq_TUSS' => array('nome'=>'txt_nom_arq_TUSS','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'),
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
	function getCodTuss() { 	return $this->cod_TUSS; }
	function getCodUsuario() { 	return $this->cod_usuario; }
	function getNomArqTuss() { 	return $this->nom_arq_TUSS; }
	function getDatCadastro() { 	return $this->dat_cadastro; }
	function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	function setCodTuss($val) { $this->cod_TUSS =  $val; }
	function setCodUsuario($val) { $this->cod_usuario =  $val; }
	function setNomArqTuss($val) { $this->nom_arq_TUSS =  $val; }
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

	    $caminho = explode("/", trim($data['nom_arq_TUSS']));	   
	   //print_r($caminho);
	   if(empty($caminho[2])){
		$data['nom_arq_TUSS'] = WWW_UPLOAD_TABELA.'_tuss/'.$data['nom_arq_TUSS'];
	   }else
	       $data['nom_arq_TUSS'] = $data['nom_arq_TUSS'];

	   if(!empty($data['dat_finalizado'])){
		$datafinal = explode('/', $data['dat_finalizado']);		
		$data['dat_finalizado'] = date("Y-m-d H:i:s",mktime(23,59,59,$datafinal[1],$datafinal[0],$datafinal[2]));
	    }else
		unset($data['dat_finalizado']);
	    
	    //echo "ANTES==";print_r($data);
	    //$ret = $this->objToArray();  print_r($ret);       
	    $this->populate($data);
	    //echo "DEPOIS";print_r($data);	

	    $cod_TUSS = parent::inserir(NULL, $forceUpdate);

	    return $cod_TUSS;

	}
  	
	// **********************
	// Cancelar abstrato
	// **********************

    
} // classe : fim

?>
