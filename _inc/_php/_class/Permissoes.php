<?php

/**
 * Classe de carregamento e aplica��o das permiss�es.
 * 
 * 
 */
class Permissoes {

	/**
	 * Objeto Usu�rio
	 * @var object Usuario
	 */
	protected $_usuario;

	/**
	 * Objeto M�dulo
	 * @var object M�dulo
	 */
	protected $_modulo;

	/**
	 * @var $_acao unknown_type
	 */
	protected $_acao;

	/**
	 * Modulos Has Acoes
	 * @var array $modulosHasAcoes
	 */
	protected $moduloHasAcoes = array();

	/**
	 * Sistema Has Acoes
	 */
	protected $sistemaHasAcoes = array();

	/**
	 * 
	 */
	protected $perfilHasPermissao = 0;

	public function __construct() {
		$this->setSistemaHasAcoes();
	}

	/**
	 * @param $_usuario the $_usuario to set
	 */
	public function setUsuario( $usuario ) {
		$this->_usuario = $usuario;
	}

	/**
	 * @return the $_usuario
	 */
	public function getUsuario() {
		return $this->_usuario;
	}

	public function setAcao( $acao ) {
		if( is_int( $acao ) )
			$this->_acao = $acao;
	}

	public function getAcao() {
		if( is_int( $acao ) )
			return $this->_acao;
	}

	/**
	 * @return the $perfilHasPermissao
	 */
	public function getPerfilHasPermissao() {
		return $this->perfilHasPermissao;
	}

	public function setModulo( $modulo ) {

		if( !empty( $modulo ) ) 
			$this->_modulo = $modulo;
		else
			throw new Exception( 'Modulo invalido' );

		$this->setModuloHasAcoes();

		if( !empty( $this->_usuario ) )
			$this->setAcoesHasPerfil();

	}

	/**
	 * @return the $_modulo
	 */
	public function getModulo() {
		return $this->modulo;
	}

	public function setSistemaHasAcoes() {

		$objSisAcoes = new SisAcoes;

		$sistemaHasAcoes = $objSisAcoes->listar( null, null, false );
		$sistemaHasAcoes = $sistemaHasAcoes->getDados();

		foreach( $sistemaHasAcoes as $sistemaHasAcao )
			$this->sistemaHasAcoes[] = (int)$sistemaHasAcao['cod_acao'];

	}

	public function setModuloHasAcoes() {

		$objSisPermissoesHasSisAcoes = new SisPermissoesHasSisAcoes;

		$sisPermissoesHasSisAcoes = $objSisPermissoesHasSisAcoes->listar( null, "A.cod_permissao = '{$this->_modulo}'" );
		$sisPermissoesHasSisAcoes = $sisPermissoesHasSisAcoes->getDados();

		$soma = 0;

		foreach( $sisPermissoesHasSisAcoes as $sisPermissaoHasSisAcao ) {

			foreach( $this->sistemaHasAcoes as $acao ) {

				if( $sisPermissaoHasSisAcao['cod_acao'] == $acao )
					$soma += (int) $sisPermissaoHasSisAcao['cod_acao'];

			}

		}

		$this->moduloHasAcoes = $soma;

	}

	public function getModuloHasAcoes() {
		return $this->moduloHasAcoes;
	}

	public function setAcoesHasPerfil() {

		if( !is_array( $this->_usuario ) )
			throw new Exception( 'Perfil nao setado' );

		$objSisPerfilPermissoes = new SisPerfilPermissoes;

		$sis_perfil_permissoes = $objSisPerfilPermissoes->listar( null, "cod_perfil = '{$this->_usuario['cod_perfil']}' AND cod_permissao = '{$this->_modulo}'", false );
		$sis_perfil_permissoes = $sis_perfil_permissoes->getRegistro();

		$this->perfilHasPermissao = (int)$sis_perfil_permissoes['num_nivel_permissao'];

	}

	public function getAcoesHasPerfil() {
		return $this->perfilHasPermissao;
	}

	public function getPerfilHasPermissaoHasAcao() {

		if( !is_int( $this->moduloHasAcoes ) || $this->moduloHasAcoes < 1 )
			return 0;

		if( ( $this->_acao & $this->moduloHasAcoes ) != $this->_acao )
			return 0;

		if( !is_int( $this->perfilHasPermissao ) )
			return 0;

		return ( $this->_acao & $this->perfilHasPermissao ) == $this->_acao ? 1 : 0;

	}

}

?>