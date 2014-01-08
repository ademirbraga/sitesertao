<?php
	
	
/**
* Classe do sistema para trabalhar com a tabela perfil_painel.
*
* @category Classe
* @name ./_inc/_php/_class/PerfilPainel.class.php
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
	
	class PerfilPainel extends DbUtils
	{ // classe : inicio
	
	
	// **********************
	// Declara��o de Atributos
	// **********************
	/**
	* @access private
	* @var _aplicativo
	*/
	private $_aplicativo = "appPerfilPainel.php";
	/**
	* @access private
	* @var _nomModulo
	*/
	private $_nomModulo = "txt_nom_perfil_painel";
	/**
	* @access protected
	* @var _name
	*/
	protected $_name = TPERFILPAINEL;
	
	/**
	* @access protected
	* @var cod_perfil_painel
	*/
	protected $cod_perfil_painel; 
	/**
	* @access protected
	* @var nom_perfil
	*/
	protected $nom_perfil; 

	private $_camposLst = array(
		'cod_perfil_painel'=> array( 'nome' => 'txt_cod_identificador','tipo'=>'int','sortable'=>'yes','tamanho'=>'30'),
		'nom_perfil'=> array('nome'=>'txt_nom_perfil_painel','tipo'=>'varchar','sortable'=>'yes','tamanho'=>'150')
	);

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
	function getNomPerfil() { 	
		return $this->nom_perfil; 
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
	function setNomPerfil($val) { 
		$this->nom_perfil =  $val; 
	}
	
	public function inserir( $data = array(), $forceUpdate = false ) {

		if( empty ( $data ) )
			return 0;

		$codPerfil = parent::inserir( $data, $forceUpdate );

		if( isset( $data['cod_permissao'] ) && !empty( $data['cod_permissao'] ) ) {

			$objPerfilPainelHasPainelPermissoes = new PerfilPainelHasPainelPermissoes;
			$objPerfilPainelHasPainelPermissoes->excluir( "cod_perfil_painel = {$codPerfil}" );

			foreach( $data['cod_permissao'] as $chPerm => $valPerm ) {

				$NumNivel = 0;

				foreach( $valPerm as $chAcao => $valAcao )
					$NumNivel += $valAcao;

				$arr_insert = array( "cod_perfil_painel" => $codPerfil, "num_nivel_permissao" => $NumNivel, "cod_permissao" => $chPerm );

				$objPerfilPainelHasPainelPermissoes->inserir( $arr_insert, false );

			}

		}	

		return $codPerfil;

	}
	
} // classe : fim

?>
