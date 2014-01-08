<?php
	/*
	* @autor F3TEC - Claudia Matos - claudiarfm@yahoo.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabCupomXTipoServico
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_inc/_php/_class/TabCupomXTipoServico.class.php
	* Tabela:           tab_cupom_x_tipo_servico
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/
	
	class TabCupomXTipoServico extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabCupomXTipoServico.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabCupomXTipoServico;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABCUPOMXTIPOSERVICO;
	
	
                 protected $cod_cupom;		
                     
                
                 protected $cod_sms_email;		
                     
                
	private $_camposLst = array('cod_cupom' => array('nome'=>'txt_cod_cupom','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_sms_email' => array('nome'=>'txt_cod_sms_email','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'));
            
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
		function getCodCupom() { 	return $this->cod_cupom; }
			function getCodSmsEmail() { 	return $this->cod_sms_email; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodCupom($val) { $this->cod_cupom =  $val; }
		    function setCodSmsEmail($val) { $this->cod_sms_email =  $val; }
		
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
