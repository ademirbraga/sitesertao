<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabJornal
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/Jornal.class.php
	* Tabela:           tab_jornal
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabJornal extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabJornal.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabJornal;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABJORNAL;

	protected $cod_jornal;		

	protected $cod_usuario;		

	protected $nom_jornal;		

	protected $dsc_jornal;		

	protected $dat_cadastro;		

	protected $dat_inicio;		

	protected $dat_finalizado;		
                
	private $_camposLst = array('cod_jornal' => array('nome'=>'txt_cod_jornal','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		//'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_jornal' => array('nome'=>'txt_nom_jornal','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		//'dsc_jornal' => array('nome'=>'txt_dsc_jornal','tipo'=>'double','sortable'=>'yes', 'tamanho'=> '60'),
		//dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'),
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
	function getCodJornal() { 	return $this->cod_jornal; }
	function getCodUsuario() { 	return $this->cod_usuario; }
	function getNomJornal() { 	return $this->nom_jornal; }
	function getDscJornal() { 	return $this->dsc_jornal; }
	function getDatCadastro() { 	return $this->dat_cadastro; }
	function getDatInicio() { 	return $this->dat_inicio; }
	function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	function setCodJornal($val) { $this->cod_jornal =  $val; }
	function setCodUsuario($val) { $this->cod_usuario =  $val; }
	function setNomJornal($val) { $this->nom_jornal =  $val; }
	function setDscJornal($val) { $this->dsc_jornal =  $val; }
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
	
	public function listarJornalImg($cols = "*", $where = '', $limit = false, $group = '') {

            $join = array(

			'B' => array(

				TTABJORNALIMAGEM,

				'B.cod_jornal = A.cod_jornal',

				'B.nom_caminho_jornal_img'

			),
                        'C' => array(

				TTABJORNALPERMITIDO,

				'C.cod_jornal = A.cod_jornal',

				'C.cod_perfil'

			)

		);

		return $this->consulta( $cols, null, $join, $where,$group,$limit);	
	}
	
	public function listarJornal($cols = "*", $where = '', $limit = false, $group = '') {

            $join = array(
                        'B' => array(

				TTABJORNALPERMITIDO,

				'B.cod_jornal = A.cod_jornal',

				'B.cod_perfil'

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
	    
	   //echo "ANTES==";print_r($data);
	   //$ret = $this->objToArray();  print_r($ret);       
	   $this->populate($data);
	   //echo "DEPOIS";print_r($data);die;	   
	   $cod_jornal = parent::inserir(NULL, $forceUpdate);
	   
	   
	   /**
	     * Cadastro de Permissao
	     */
	    $objJornalPerm = new TabJornalPermitido();
	    $data['cod_jornal'] = $cod_jornal;
	    $arrayPefil = $data['cod_perfil'];
	    if (is_array($arrayPefil)){	       
		unset($data['cod_perfil']);
		foreach ($arrayPefil as $k => $val){
		    $data['cod_perfil'] = $val;
		    $cod_jornal_permitido = $objJornalPerm->inserir($data, true);		   
		}
	    }else {
		$cod_jornal_permitido = $objJornalPerm->inserir($data, true);
	    }	

	   /**
	    * Cadastro de imagem
	    */
	   $objJornalImg = new TabJornalImagem();
	   $data['cod_jornal'] = $cod_jornal;
	   $arrayImagem = explode(",",$data['nom_caminho_jornal_img']);	   
	   
	   if (empty($data['nom_caminho_jornal_img']))
	       unset($data['nom_caminho_jornal_img']);
	   else {	   
		foreach($arrayImagem as $k => $val){
		 //   echo $val."===".$k;
		    $data['nom_caminho_jornal_img'] = WWW_UPLOAD_TABELA.'_jornal/'.$val;
		    $cod_jornal_imagem = $objJornalImg->inserir($data, true);
		}			       
	       
	   }	   

	   return $cod_jornal;	   
       }
	// **********************
	// Cancelar abstrato
	// **********************
       public function excluir( $registro = null ) {	    
	    
	    $data['dat_termino'] = date("Y-m-d H:i:s");
	    
	    if( isset($registro['chave'] )) {		    	
		$where = "cod_jornal = '{$registro['chave']}'";;
    		parent::atualizar( $data, $where );			
	    }else{
		if(is_array($registro)){		    
		    foreach ($registro as $key => $value) {			
			$where = "cod_jornal = '{$value}'";;
			parent::atualizar( $data, $where );			
		    }
		}		
	    }
	}

    
} // classe : fim

?>
