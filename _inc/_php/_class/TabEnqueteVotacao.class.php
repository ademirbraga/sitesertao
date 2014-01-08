<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabEnqueteVotacao
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/EnqueteVotacao.class.php
	* Tabela:           tab_enquete_votacao
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabEnqueteVotacao extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabEnqueteVotacao.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabEnqueteVotacao;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABENQUETEVOTACAO;
	
	
                 protected $cod_enquete_votacao;		
                     
                
                 protected $cod_enquete_alternativa;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $num_votacao;		
                     
                
                 protected $num_ip;		
                     
                
	private $_camposLst = array('cod_enquete_votacao' => array('nome'=>'txt_cod_enquete_votacao','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_enquete_alternativa' => array('nome'=>'txt_cod_enquete_alternativa','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'num_votacao' => array('nome'=>'txt_num_votacao','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'num_ip' => array('nome'=>'txt_num_ip','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '45'));
            
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
		function getCodEnqueteVotacao() { 	return $this->cod_enquete_votacao; }
			function getCodEnqueteAlternativa() { 	return $this->cod_enquete_alternativa; }
			function getCodUsuario() { 	return $this->cod_usuario; }
			function getNumVotacao() { 	return $this->num_votacao; }
			function getNumIp() { 	return $this->num_ip; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodEnqueteVotacao($val) { $this->cod_enquete_votacao =  $val; }
		    function setCodEnqueteAlternativa($val) { $this->cod_enquete_alternativa =  $val; }
		    function setCodUsuario($val) { $this->cod_usuario =  $val; }
		    function setNumVotacao($val) { $this->num_votacao =  $val; }
		    function setNumIp($val) { $this->num_ip =  $val; }
		
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
