<?php
	
	
/**
* Classe do sistema para trabalhar com a tabela cod_perfil_ligacao.
*
* @package NGCC
* @category Classe
* @name ../NGCC/_inc/_php/_class/CodPerfilLigacao.class.php
* @author Itaceu Tecnologia <comercial@itaceutecnologia.com.br>
* @copyright [Informações de Direitos de Cópia]
* @license [link da licença] [Nome da licença]
* @link [link de onde pode ser encontrado esse arquivo]
* @version 1.0.0
* @since 13/05/2011 19:06:35
*/
	
		
	// **********************
	// DECLARAÇÂO DA CLASSE
	// **********************
	
	class PerfilLigacao extends DbUtils
	{ // classe : inicio
	
	
	// **********************
	// Declaração de Atributos
	// **********************
	/**
	* @access private
	* @var _aplicativo
	*/
	private $_aplicativo = "appPerfilLigacao.php";
	/**
	* @access private
	* @var _nomModulo
	*/
	private $_nomModulo = "txt_perfil_ligacao";
	/**
	* @access protected
	* @var _name
	*/
	protected $_name = TPERFILLIGACAO;
	
	/**
	* @access protected
	* @var cod_perfil_ligacao
	*/
	protected $cod_perfil_ligacao; 
	/**
	* @access protected
	* @var nom_perfil_ligacao
	*/
	protected $nom_perfil_ligacao; 
	
	private $_camposLst = array ('cod_perfil_ligacao'=> array('nome'=>'txt_cod_perfil_ligacao','tipo'=>'int','sortable'=>'yes','tamanho'=>'30'),'nom_perfil_ligacao'=> array('nome'=>'txt_nom_perfil_ligacao','tipo'=>'varchar','sortable'=>'yes','tamanho'=>'150'));
	
	// **********************
	// Construtor da classe
	// **********************
	
		function __construct()
		{
			parent::__construct(DBPADRAO);
        	//$this->filtroRevenda(true,'');
			//$this->filtroCancelamento(true,'');
			
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
	function getCodPerfilLigacao() { 	
		return $this->cod_perfil_ligacao; 
	}
	function getNomPerfilLigacao() { 	
		return $this->nom_perfil_ligacao; 
	}
	
		/**
		 * Configuração para listagem 
		*/
	function configMod(){
	}
	
	// **********************
	// Métodos SET
	// **********************
	
	function setCodPerfilLigacao($val) { 
		$this->cod_perfil_ligacao =  $val; 
	}
	function setNomPerfilLigacao($val) { 
		$this->nom_perfil_ligacao =  $val; 
	}
	
} // classe : fim

?>
