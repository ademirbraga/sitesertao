<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabJornalImagem
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/JornalImagem.class.php
	* Tabela:           tab_jornal_imagem
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabJornalImagem extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabJornalImagem.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabJornalImagem;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABJORNALIMAGEM;
	
	
                 protected $cod_jornal_imagem;		
                     
                
                 protected $cod_jornal;		
                     
                
                 protected $nom_caminho_jornal_img;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_jornal_imagem' => array('nome'=>'txt_cod_jornal_imagem','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_jornal' => array('nome'=>'txt_cod_jornal','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_caminho_jornal_img' => array('nome'=>'txt_nom_caminho_jornal_img','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'),
		'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'),
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
		function getCodJornalImagem() { 	return $this->cod_jornal_imagem; }
			function getCodJornal() { 	return $this->cod_jornal; }
			function getNomCaminhoJornalImg() { 	return $this->nom_caminho_jornal_img; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodJornalImagem($val) { $this->cod_jornal_imagem =  $val; }
		    function setCodJornal($val) { $this->cod_jornal =  $val; }
		    function setNomCaminhoJornalImg($val) { $this->nom_caminho_jornal_img =  $val; }
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
  	
	// **********************
	// Cancelar abstrato
	// **********************

    
} // classe : fim

?>
