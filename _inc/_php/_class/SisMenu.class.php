<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           SisMenu
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/SisMenu.class.php
	* Tabela:           SisMenu
	* Banco:	    
	* -------------------------------------------------------	
	*
	*/
	
	class SisMenu extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appSisMenu.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_SisMenu;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TSISMENU;
		
	protected $cod_menu;		
        protected $cod_menu_superior;		
	protected $cod_permissao;		
	protected $nom_menu;
	protected $nom_aplicativo;
	protected $nom_img;
	protected $bol_ativo;
	protected $bol_visualiza;
	protected $dat_criacao;
                
	private $_camposLst = array('cod_menu' => array('nome'=>'txt_cod_menu','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_menu_superior' => array('nome'=>'txt_cod_menu','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_permissao' => array('nome'=>'txt_cod_permissao','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'nom_menu' => array('nome'=>'txt_nom_menu','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '50'),
		'nom_aplicativo' => array('nome'=>'txt_nom_aplicativo','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '100'),
		'nom_img' => array('nome'=>'txt_nom_img','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '100'),
		'bol_ativo' => array('nome'=>'txt_bol_ativo','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '125'),
		'bol_visualiza' => array('nome'=>'txt_bol_visualiza','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '100'),
		'dat_criacao' => array('nome'=>'txt_dat_criacao','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '100')
	    );
            
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
	function getCodMenu() { 	return $this->cod_menu; }
	function getCodMenuSuperior() { 	return $this->cod_menu_superior; }
	function getCodPermissao() { 	return $this->cod_permissao; }
	function getNomMenu() { 	return $this->nom_menu; }
	function getNomAplicativo() { 	return $this->nom_aplicativo; }
	function getNomImg() { 	return $this->nom_img; }
	function getBolAtivo() { 	return $this->bol_ativo; }
	function getBolVisualiza() { 	return $this->bol_visualiza; }
	
		
	// **********************
	// Métodos SET
	// **********************
	function setCodClienteTipo($val) { $this->cod_cliente_tipo =  $val; }
	function setNomClienteTipo($val) { $this->nom_cliente_tipo =  $val; }
	function setCodMenu($val) { 	 $this->cod_menu =  $val; }
	function setCodMenuSuperior($val) { 	 $this->cod_menu_superior =  $val; }
	function setCodPermissao($val) { 	 $this->cod_permissao =  $val; }
	function setNomMenu($val) { 	 $this->nom_menu =  $val; }
	function setNomAplicativo($val) { 	 $this->nom_aplicativo =  $val; }
	function setNomImg($val) { 	 $this->nom_img =  $val; }
	function setBolAtivo($val) { 	 $this->bol_ativo =  $val; }
	function setBolVisualiza($val) { 	$this->bol_visualiza =  $val; }
		
	// **********************
	// Método listar abstrato
	// **********************
	
        /**
	* Configuração para listagem 
	*/
	function configMod(){
	}
	
	public function listMenus($cols = "*", $where = '', $limit = false, $group = '') {
	    		

		$join = array(
			'B' => array(
				TSISMENU,
				'B.cod_menu = A.cod_menu_superior',
				'B.nom_menu as nom_menu_superior',
				"joinLeft"
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
