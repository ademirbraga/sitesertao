<?php
	
	
/**
* Classe do sistema para trabalhar com a tabela perfil_painel_has_painel_permissoes.
*
* @category Classe
* @name ../_inc/_php/_class/PerfilPainelHasPainelPermissoes.class.php
* @author Itaceu Tecnologia <comercial@itaceutecnologia.com.br>
* @copyright [Informa��es de Direitos de C�pia]
* @license [link da licen�a] [Nome da licen�a]
* @link [link de onde pode ser encontrado esse arquivo]
* @version 1.0.0
* @since 13/06/2011 14:14:10
*/
	
		
	// **********************
	// DECLARA��O DA CLASSE
	// **********************
	
	class PerfilPainelHasPainelPermissoes extends DbUtils
	{ // classe : inicio
	
	
	// **********************
	// Declara��o de Atributos
	// **********************
	/**
	* @access private
	* @var _aplicativo
	*/
	private $_aplicativo = "appPerfilPainelHasPainelPermissoes.php";
	/**
	* @access private
	* @var _nomModulo
	*/
	private $_nomModulo = "PerfilPainelHasPainelPermissoes";
	/**
	* @access protected
	* @var _name
	*/
	protected $_name = TPERFILPAINELHASPAINELPERMISSOES;
	
	/**
	* @access protected
	* @var cod_perfil_painel
	*/
	protected $cod_perfil_painel; 
	/**
	* @access protected
	* @var cod_painel_permissoes
	*/
	protected $cod_painel_permissoes; 
	/**
	* @access protected
	* @var num_nivel_permissao
	*/
	protected $num_nivel_permissao; 
	
	private $_camposLst = array ('cod_perfil_painel'=> array('nome'=>'txt_cod_perfil_painel','tipo'=>'int','sortable'=>'yes','tamanho'=>'30'),'cod_painel_permissoes'=> array('nome'=>'txt_cod_painel_permissoes','tipo'=>'int','sortable'=>'yes','tamanho'=>'30'),'num_nivel_permissao'=> array('nome'=>'txt_num_nivel_permissao','tipo'=>'int','sortable'=>'yes','tamanho'=>'30'));
	
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
	// M�todos GET
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
	function getCodPerfilPainel() { 	
		return $this->cod_perfil_painel; 
	}
	function getCodPainelPermissoes() { 	
		return $this->cod_painel_permissoes; 
	}
	function getNumNivelPermissao() { 	
		return $this->num_nivel_permissao; 
	}
	
		/**
		 * Configura��o para listagem 
		*/
	function configMod(){
	}
	
	// **********************
	// M�todos SET
	// **********************
	
	function setCodPerfilPainel($val) { 
		$this->cod_perfil_painel =  $val; 
	}
	function setCodPainelPermissoes($val) { 
		$this->cod_painel_permissoes =  $val; 
	}
	function setNumNivelPermissao($val) { 
		$this->num_nivel_permissao =  $val; 
	}
	
} // classe : fim

?>
