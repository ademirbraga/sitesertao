<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabEventoImagem
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/EventoImagem.class.php
	* Tabela:           tab_evento_imagem
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabEventoImagem extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabEventoImagem.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabEventoImagem;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABEVENTOIMAGEM;
	
	
                 protected $cod_evento_imagem;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $nom_evento_imagem;		
                     
                
                 protected $dsc_evento_imagem;		
                     
                
                 protected $dat_evento;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_inicio;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_evento_imagem' => array('nome'=>'txt_cod_evento_imagem','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		//'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_evento_imagem' => array('nome'=>'txt_nom_evento_imagem','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		//'dsc_evento_imagem' => array('nome'=>'txt_dsc_evento_imagem','tipo'=>'double','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_evento' => array('nome'=>'txt_dat_evento','tipo'=>'date','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60')
		//'dat_inicio' => array('nome'=>'txt_dat_inicio','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'),
		//'dat_finalizado' => array('nome'=>'txt_dat_finalizado','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60')
	    );
            
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
		function getCodEventoImagem() { 	return $this->cod_evento_imagem; }
			function getCodUsuario() { 	return $this->cod_usuario; }
			function getNomEventoImagem() { 	return $this->nom_evento_imagem; }
			function getDscEventoImagem() { 	return $this->dsc_evento_imagem; }
			function getDatEvento() { 	return $this->dat_evento; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatInicio() { 	return $this->dat_inicio; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodEventoImagem($val) { $this->cod_evento_imagem =  $val; }
		    function setCodUsuario($val) { $this->cod_usuario =  $val; }
		    function setNomEventoImagem($val) { $this->nom_evento_imagem =  $val; }
		    function setDscEventoImagem($val) { $this->dsc_evento_imagem =  $val; }
		    function setDatEvento($val) { $this->dat_evento =  $val; }
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
	
	public function listarEvento($cols = "*", $where = '', $limit = false, $group = '') {

            $join = array(

			'B' => array(

				TTABEVENTOIMAGEMPERMITIDO,

				'B.cod_evento_imagem = A.cod_evento_imagem',

				'B.cod_perfil'

			),
                        'C' => array(

				TTABEVENTOUPLOAD,

				'C.cod_evento_imagem = A.cod_evento_imagem',

				'C.nom_caminho_imagem'

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
	    $cod_evento_imagem = parent::inserir(NULL, $forceUpdate);
	    

	    /**
	     * Cadastro de Permissao
	     */
	    $objEvPerm = new TabEventoImagemPermitido();	    
	    $data['cod_evento_imagem'] = $cod_evento_imagem;
	    $arrayPefil = $data['cod_perfil'];	    
	    if (is_array($arrayPefil)){	       
		unset($data['cod_perfil']);
		foreach ($arrayPefil as $k => $val){
		    $data['cod_perfil'] = $val;	
		    //echo "<PRE>";print_r($data);echo "</PRE>";		    
		    $cod_evento_img_permitido = $objEvPerm->inserir($data, true);		   
		}
	    }else {		
		$cod_evento_img_permitido = $objEvPerm->inserir($data, true);
	    }	 
	    
	    /**
	    * Cadastro de imagem
	    */
	   $objEvUp = new TabEventoUpload();	   
	   $data['cod_evento_imagem'] = $cod_evento_imagem;
	   $arrayImagem = explode(",",$data['nom_caminho_imagem']);	   
	      
	   if (empty($data['nom_caminho_imagem']))
	       unset($data['nom_caminho_imagem']);
	   else {	   
		foreach($arrayImagem as $k => $val){
		 //   echo $val."===".$k;
		    $data['nom_caminho_imagem'] = WWW_UPLOAD_TABELA.'_galeriadefotos/'.$val;
		    $cod_evento_upload = $objEvUp->inserir($data, true);
		}	       
	   }

	    return $cod_evento_imagem;
	}
	// **********************
	// Cancelar abstrato
	// **********************	
	public function excluir( $registro = null ) {	    
	    
	    $data['dat_termino'] = date("Y-m-d H:i:s");
	    
	    if( isset($registro['chave'] )) {		    	
		$where = "cod_evento_imagem = '{$registro['chave']}'";;
    		parent::atualizar( $data, $where );			
	    }else{
		if(is_array($registro)){		    
		    foreach ($registro as $key => $value) {			
			$where = "cod_evento_imagem = '{$value}'";;
			parent::atualizar( $data, $where );			
		    }
		}		
	    }
	}
    
} // classe : fim

?>
