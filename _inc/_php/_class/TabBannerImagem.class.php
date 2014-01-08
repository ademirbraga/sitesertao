<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabBannerImagem
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/TabBannerImagem.class.php
	* Tabela:           tab_banner_imagem
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabBannerImagem extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabBannerImagem.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabBannerImagem;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABBANNERIMAGEM;
	
	
                 protected $cod_banner_imagem;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $nom_banner_imagem;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_banner_imagem' => array('nome'=>'txt_cod_banner_imagem','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_banner_imagem' => array('nome'=>'txt_nom_banner_imagem','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
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
	function getCodBannerImagem() { 	return $this->cod_banner_imagem; }
	function getCodUsuario() { 	return $this->cod_usuario; }
	function getNomBannerImagem() { 	return $this->nom_banner_imagem; }
	function getDatCadastro() { 	return $this->dat_cadastro; }
	function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	function setCodBannerImagem($val) { $this->cod_banner_imagem =  $val; }
	function setCodUsuario($val) { $this->cod_usuario =  $val; }
	function setNomBannerImagem($val) { $this->nom_banner_imagem =  $val; }
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

	public function listarPorRef($cols = "*", $where = '', $limit = false, $group = '') {

            $join = array(

			'B' => array(

				TTABBANNER,

				'B.cod_banner = A.cod_banner',

				'B.*'

			)
		);

		return $this->consulta( $cols, null, $join, $where,$group,$limit);	
    }
	// **********************
	// Método cadastrar abstrato
	// **********************
  	
	// **********************
	// Cancelar abstrato
	// **********************

    
} // classe : fim

?>
