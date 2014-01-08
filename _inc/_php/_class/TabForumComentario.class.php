<?php
	/*
	* @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           TabForumComentario
	* Gerada em:        08.08.2013
	* Arquivo:          ../portalunimed/_inc/_php/_class/ForumComentario.class.php
	* Tabela:           tab_forum_comentario
	* Banco:	    bd_portal_unimed
	* -------------------------------------------------------	
	*
	*/
	
	class TabForumComentario extends DbUtils{ 
	
	
	// **********************
	// Declaracao de Atributos
	// **********************

	private $_aplicativo = "appTabForumComentario.php";
	/**

	 * @access private

	 * @var _nomModulo

	 */
	private $_nomModulo = txt_TabForumComentario;
	/**
        
	* @access protected
        
	* @var _name
        
	*/
	protected $_name = TTABFORUMCOMENTARIO;
	
	
                 protected $idtab_forum_comentario;		
                     
                
                 protected $cod_forum;		
                     
                
                 protected $cod_usuario;		
                     
                
                 protected $dsc_forum_comentario;		
                     
                
                 protected $dat_cadastro;		
                     
                
                 protected $dat_finalizado;		
                     
                
	private $_camposLst = array('idtab_forum_comentario' => array('nome'=>'txt_idtab_forum_comentario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_forum' => array('nome'=>'txt_cod_forum','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
		'dsc_forum_comentario' => array('nome'=>'txt_dsc_forum_comentario','tipo'=>'double','sortable'=>'yes', 'tamanho'=> '60'),
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
		function getIdtabForumComentario() { 	return $this->idtab_forum_comentario; }
			function getCodForum() { 	return $this->cod_forum; }
			function getCodUsuario() { 	return $this->cod_usuario; }
			function getDscForumComentario() { 	return $this->dsc_forum_comentario; }
			function getDatCadastro() { 	return $this->dat_cadastro; }
			function getDatFinalizado() { 	return $this->dat_finalizado; }
		
	// **********************
	// Métodos SET
	// **********************
	
	    function setIdtabForumComentario($val) { $this->idtab_forum_comentario =  $val; }
		    function setCodForum($val) { $this->cod_forum =  $val; }
		    function setCodUsuario($val) { $this->cod_usuario =  $val; }
		    function setDscForumComentario($val) { $this->dsc_forum_comentario =  $val; }
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
				TTABFORUM,
				'B.cod_forum = A.cod_forum',
				'B.*'
			),
			'C' => array(
				TTABCLIENTE,
				'C.cod_cliente = A.cod_cliente',
				'C.nom_cliente'
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
	    
	    if( isset($registro['chave'] )) {		    	
		$where = "cod_forum = '{$registro['chave']}'";;
    		parent::atualizar( $data, $where );			
	    }else{
		if(is_array($registro)){		    
		    foreach ($registro as $key => $value) {			
			$where = "cod_forum = '{$value}'";;
			parent::atualizar( $data, $where );			
		    }
		}		
	    }
	}

    
} // classe : fim

?>
