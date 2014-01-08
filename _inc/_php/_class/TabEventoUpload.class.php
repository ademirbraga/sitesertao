<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabEventoUpload
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/EventoUpload.class.php
	* Tabela:           tab_evento_upload
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabEventoUpload extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabEventoUpload.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabEventoUpload;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABEVENTOUPLOAD;
	
	
                 protected $cod_evento_upload;		
                     
                
                 protected $cod_evento_imagem;		
                     
                
                 protected $nom_caminho_imagem;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_evento_upload' => array('nome'=>'txt_cod_evento_upload','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_evento_imagem' => array('nome'=>'txt_cod_evento_imagem','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_caminho_imagem' => array('nome'=>'txt_nom_caminho_imagem','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
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
		function getCodEventoUpload() { 	return $this->cod_evento_upload; }
			function getCodEventoImagem() { 	return $this->cod_evento_imagem; }
			function getNomCaminhoImagem() { 	return $this->nom_caminho_imagem; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodEventoUpload($val) { $this->cod_evento_upload =  $val; }
		    function setCodEventoImagem($val) { $this->cod_evento_imagem =  $val; }
		    function setNomCaminhoImagem($val) { $this->nom_caminho_imagem =  $val; }
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
