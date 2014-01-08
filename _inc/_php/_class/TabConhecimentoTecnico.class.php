<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabConhecimentoTecnico
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/ConhecimentoTecnico.class.php
	* Tabela:           tab_conhecimento_tecnico
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabConhecimentoTecnico extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabConhecimentoTecnico.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabConhecimentoTecnico;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABCONHECIMENTOTECNICO;
	
	
                 protected $cod_conhecimento_tecnico;		
                     
                
                 protected $cod_formacao;		
                     
                
                 protected $nom_instituicao;		
                     
                
                 protected $nom_curso;		
                     
                
                 protected $flg_cursando;		
                     
                
                 protected $dat_inicio;		
                     
                
                 protected $dat_fim;		
                     
                
	private $_camposLst = array('cod_conhecimento_tecnico' => array('nome'=>'txt_cod_conhecimento_tecnico','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_formacao' => array('nome'=>'txt_cod_formacao','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_instituicao' => array('nome'=>'txt_nom_instituicao','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		'nom_curso' => array('nome'=>'txt_nom_curso','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		'flg_cursando' => array('nome'=>'txt_flg_cursando','tipo'=>'tinyint','sortable'=>'yes', 'tamanho'=> '4'),
		'dat_inicio' => array('nome'=>'txt_dat_inicio','tipo'=>'date','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_fim' => array('nome'=>'txt_dat_fim','tipo'=>'date','sortable'=>'yes', 'tamanho'=> '60'));
            
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
		function getCodConhecimentoTecnico() { 	return $this->cod_conhecimento_tecnico; }
			function getCodFormacao() { 	return $this->cod_formacao; }
			function getNomInstituicao() { 	return $this->nom_instituicao; }
			function getNomCurso() { 	return $this->nom_curso; }
			function getFlgCursando() { 	return $this->flg_cursando; }
			function getDatInicio() { 	return $this->dat_inicio; }
			function getDatFim() { 	return $this->dat_fim; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodConhecimentoTecnico($val) { $this->cod_conhecimento_tecnico =  $val; }
		    function setCodFormacao($val) { $this->cod_formacao =  $val; }
		    function setNomInstituicao($val) { $this->nom_instituicao =  $val; }
		    function setNomCurso($val) { $this->nom_curso =  $val; }
		    function setFlgCursando($val) { $this->flg_cursando =  $val; }
		    function setDatInicio($val) { $this->dat_inicio =  $val; }
		    function setDatFim($val) { $this->dat_fim =  $val; }
		
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
