<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabBanner
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/Banner.class.php
	* Tabela:           tab_banner
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabBanner extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabBanner.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabBanner;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABBANNER;
	
	
                 protected $cod_banner;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $cod_banner_tipo;		
                     
                
                 protected $nom_titulo_banner;		
                     
                
                 protected $dsc_banner;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_inicio;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_banner' => array('nome'=>'txt_cod_banner','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		//'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_tipo_banner' => array('nome'=>'txt_nom_tipo_banner','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_titulo_banner' => array('nome'=>'txt_nom_titulo_banner','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		//'dsc_banner' => array('nome'=>'txt_dsc_banner','tipo'=>'double','sortable'=>'yes', 'tamanho'=> '60'),
		//'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_inicio' => array('nome'=>'txt_dat_inicio','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_finalizado' => array('nome'=>'txt_dat_finalizado','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'));
            
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
	function getCodBanner() { 	return $this->cod_banner; }
	function getCodUsuario() { 	return $this->cod_usuario; }
	function getCodBannerTipo() { 	return $this->cod_banner_tipo; }
	function getNomTituloBanner() { 	return $this->nom_titulo_banner; }
	function getDscBanner() { 	return $this->dsc_banner; }
	function getDatCadastro() { 	return $this->dat_cadastro; }
	function getDatInicio() { 	return $this->dat_inicio; }
	function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	function setCodBanner($val) { $this->cod_banner =  $val; }
	function setCodUsuario($val) { $this->cod_usuario =  $val; }
	function setCodBannerTipo($val) { $this->cod_banner_tipo =  $val; }
	function setNomTituloBanner($val) { $this->nom_titulo_banner =  $val; }
	function setDscBanner($val) { $this->dsc_banner =  $val; }
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
	
	 public function listarPorRef($cols = "*", $where = '', $limit = false, $group = '') {

            $join = array(

			'B' => array(

				TSISUSUARIO,

				'B.cod_usuario = A.cod_usuario',

				'B.nom_usuario'

			),
                        'C' => array(

				TTABBANNERTIPO,

				'C.cod_banner_tipo = A.cod_banner_tipo',

				'C.nom_tipo_banner'

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
	   $cod_banner = parent::inserir(NULL, $forceUpdate);	   

	   /**
	    * Cadastro de imagem
	    */
	   $objBannerImg = new TabBannerImagem();
	   $data['cod_banner'] = $cod_banner;
	   $arrayImagem = explode(",",$data['nom_banner_imagem']);	   
	   
	   if (empty($data['nom_banner_imagem']))
	       unset($data['nom_banner_imagem']);
	   else {	   
		foreach($arrayImagem as $k => $val){
		 //   echo $val."===".$k;
		    $data['nom_banner_imagem'] = WWW_UPLOAD_TABELA.'_banner/'.$val;
		    $cod_banner_imagem = $objBannerImg->inserir($data, true);
		}			       
	       
	   }	   

	   return $cod_banner;
       }
  	
	// **********************
	// Cancelar abstrato
	// **********************

    
} // classe : fim

?>
