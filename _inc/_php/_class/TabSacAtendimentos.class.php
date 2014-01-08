<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabSacAtendimentos
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/SacAtendimentos.class.php
	* Tabela:           tab_sac_atendimentos
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabSacAtendimentos extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabSacAtendimentos.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabSacAtendimentos;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABSACATENDIMENTOS;
	
	
                 protected $cod_sac_atendimentos;		
                     
                
                 protected $cod_sac;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $nom_assunto;		
                     
                
                 protected $dsc_observacao;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_sac_atendimentos' => array('nome'=>'txt_cod_sac_atendimentos','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_sac' => array('nome'=>'txt_cod_sac','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_assunto' => array('nome'=>'txt_nom_assunto','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		'dsc_observacao' => array('nome'=>'txt_dsc_observacao','tipo'=>'double','sortable'=>'yes', 'tamanho'=> '60'),
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
		function getCodSacAtendimentos() { 	return $this->cod_sac_atendimentos; }
			function getCodSac() { 	return $this->cod_sac; }
			function getCodUsuario() { 	return $this->cod_usuario; }
			function getNomAssunto() { 	return $this->nom_assunto; }
			function getDscObservacao() { 	return $this->dsc_observacao; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setCodSacAtendimentos($val) { $this->cod_sac_atendimentos =  $val; }
		    function setCodSac($val) { $this->cod_sac =  $val; }
		    function setCodUsuario($val) { $this->cod_usuario =  $val; }
		    function setNomAssunto($val) { $this->nom_assunto =  $val; }
		    function setDscObservacao($val) { $this->dsc_observacao =  $val; }
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

	public function listarPorRef($cols = "*", $where = '', $limit = false, $group) {

            $join = array(
			'B' => array(
				TTABSAC,
				'B.cod_sac = A.cod_sac',
				'B.*'
			),
			'C' => array(
				TTABCLIENTE,
				'C.cod_cliente = B.cod_cliente',
				'C.nom_cliente'
			),
			'D' => array(
				TSISUSUARIO,
				'D.cod_usuario = A.cod_usuario',
				'D.nom_usuario'
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
