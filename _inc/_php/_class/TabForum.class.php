<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabForum
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/Forum.class.php
	* Tabela:           tab_forum
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabForum extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabForum.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabForum;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABFORUM;
	
	
                 protected $cod_forum;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $nom_titulo_forum;		
                     
                
                 protected $dsc_forum;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('cod_forum' => array('nome'=>'txt_cod_forum','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		//'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
	    	'nom_cliente' => array('nome'=>'txt_nom_cliente','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		'nom_titulo_forum' => array('nome'=>'txt_nom_titulo_forum','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '225'),
		'dsc_forum' => array('nome'=>'txt_dsc_forum','tipo'=>'double','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'),
		'dat_finalizado' => array('nome'=>'txt_dat_finalizado','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'));
            
	// **********************
	// Construtor da classe
	// **********************
	
            function __construct()
            {
                    parent::__construct(DBPADRAO);
		    $this->filtroCancelamento(true,'(A.dat_finalizado IS NULL or A.dat_finalizado >= CURRENT_TIMESTAMP)');
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
	function getCodForum() { 	return $this->cod_forum; }
	function getCodUsuario() { 	return $this->cod_usuario; }
	function getNomTituloForum() { 	return $this->nom_titulo_forum; }
	function getDscForum() { 	return $this->dsc_forum; }
	function getDatCadastro() { 	return $this->dat_cadastro; }
	function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	function setCodForum($val) { $this->cod_forum =  $val; }
	function setCodUsuario($val) { $this->cod_usuario =  $val; }
	function setNomTituloForum($val) { $this->nom_titulo_forum =  $val; }
	function setDscForum($val) { $this->dsc_forum =  $val; }
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

				TTABCLIENTE,

				'B.cod_cliente = A.cod_cliente',

				'B.nom_cliente'

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
	public function excluir( $registro = null ) {	    
	    
	    $data['dat_finalizado'] = date("Y-m-d H:i:s");
	    
	    $objForumComentario = new TabForumComentario();
	    
	    if( isset($registro['chave'] )) {		    	
		$where = "cod_forum = '{$registro['chave']}'";;
    		parent::atualizar( $data, $where );	
		$objForumComentario->excluir($registro);
	    }else{
		if(is_array($registro)){		    
		    foreach ($registro as $key => $value) {			
			$where = "cod_forum = '{$value}'";;
			parent::atualizar( $data, $where );			
			$objForumComentario->excluir($registro);
		    }
		}		
	    }
	}

    
} // classe : fim

?>
