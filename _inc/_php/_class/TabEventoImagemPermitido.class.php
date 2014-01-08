<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabEventoImagemPermitido
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/EventoImagemPermitido.class.php
	* Tabela:           tab_evento_imagem_permitido
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabEventoImagemPermitido extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabEventoImagemPermitido.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabEventoImagemPermitido;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABEVENTOIMAGEMPERMITIDO;
	
	
                 protected $cod_evento_imagem_permitido;		
                     
                
                 protected $cod_evento_imagem;		
                     
                
                 protected $cod_perfil;		
                     
                
	private $_camposLst = array('cod_evento_imagem_permitido' => array('nome'=>'txt_cod_evento_imagem_permitido','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_evento_imagem' => array('nome'=>'txt_cod_evento_imagem','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_perfil' => array('nome'=>'txt_cod_perfil','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'));
            
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
		function getCodEventoImagemPermitido() { 	return $this->cod_evento_imagem_permitido; }
			function getCodEventoImagem() { 	return $this->cod_evento_imagem; }
			function getCodPerfil() { 	return $this->cod_perfil; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodEventoImagemPermitido($val) { $this->cod_evento_imagem_permitido =  $val; }
		    function setCodEventoImagem($val) { $this->cod_evento_imagem =  $val; }
		    function setCodPerfil($val) { $this->cod_perfil =  $val; }
		
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
