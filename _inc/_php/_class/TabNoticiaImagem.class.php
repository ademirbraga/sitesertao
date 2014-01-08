<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabNoticiaImagem
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/NoticiaImagem.class.php
	* Tabela:           tab_noticia_imagem
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabNoticiaImagem extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabNoticiaImagem.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabNoticiaImagem;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABNOTICIAIMAGEM;
	
	
                 protected $cod_noticia_imagem;		
                     
                
                 protected $cod_noticia;		
                     
                
                 protected $nom_caminho_img;		
                     
                
                 protected $nom_caminho_img_peq;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_noticia_imagem' => array('nome'=>'txt_cod_noticia_imagem','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_noticia' => array('nome'=>'txt_cod_noticia','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_caminho_img' => array('nome'=>'txt_nom_caminho_img','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		'nom_caminho_img_peq' => array('nome'=>'txt_nom_caminho_img_peq','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
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
		function getCodNoticiaImagem() { 	return $this->cod_noticia_imagem; }
			function getCodNoticia() { 	return $this->cod_noticia; }
			function getNomCaminhoImg() { 	return $this->nom_caminho_img; }
			function getNomCaminhoImgPeq() { 	return $this->nom_caminho_img_peq; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodNoticiaImagem($val) { $this->cod_noticia_imagem =  $val; }
		    function setCodNoticia($val) { $this->cod_noticia =  $val; }
		    function setNomCaminhoImg($val) { $this->nom_caminho_img =  $val; }
		    function setNomCaminhoImgPeq($val) { $this->nom_caminho_img_peq =  $val; }
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
