<?php

/*
	* @autor Gerador WebTupi
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           Grupo
	* Gerada em:        17.11.2011
	* Arquivo:          ../sitebhstouche/_inc/_php/_class/Grupo.class.php
	* Tabela:		    grupo
	* Banco:		    bhstouche
	* -------------------------------------------------------	
	*
	*/

// **********************
// DECLARAÇÂO DA CLASSE
// **********************


class SisPermissoesHasSisAcoes extends DbUtils { // classe : inicio
	

	// **********************
	// Declaração de Atributos
	// **********************
	/**
	 * @access private
	 * @var _aplicativo
	 */
	private $_aplicativo = "appSisPermissoesHasSisAcoes.php";
	/**
	 * @access private
	 * @var _nomModulo
	 */
	private $_nomModulo = "SisPermissoesHasSisAcoes";
	/**
	 * @access protected
	 * @var _name
	 */
	protected $_name = TSISPERMISSOESHASSISACOES;
	
	/**
	 * @access protected
	 * @var cod_permissao
	 */
	protected $cod_permissao;
	/**
	 * @access protected
	 * @var cod_acao
	 */
	protected $cod_acao;
	
	private $_camposLst = array ('cod_permissao' => array ('nome' => 'txt_cod_permissao', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '30' ), 'cod_acao' => array ('nome' => 'txt_cod_acao', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '30' ) );
	
	// **********************
	// Construtor da classe
	// **********************
	

	function __construct() {
		parent::__construct ( DBPADRAO );
		//$this->filtroRevenda(true,'');
	//$this->filtroCancelamento(true,'');
	

	}
	
	// **********************
	// Métodos GET
	// **********************
	

	function getcamposLst() {
		return $this->_camposLst;
	}
	function getaplicativo() {
		return $this->_aplicativo;
	}
	function getnomModulo() {
		return $this->_nomModulo;
	}
	function getCodPermissao() {
		return $this->cod_permissao;
	}
	function getCodAcao() {
		return $this->cod_acao;
	}
	
	/**
	 * Configuração para listagem 
	 */
	function configMod() {
	}
	
	// **********************
	// Métodos SET
	// **********************
	

	function setCodPermissao($val) {
		$this->cod_permissao = $val;
	}
	function setCodAcao($val) {
		$this->cod_acao = $val;
	}

	public function listar($cols = "*", $where = '', $limit = false, $group = '') {

		return $this->consulta ( 
			'A.*', 
			null, 
			array (
				'B' => array (TSISACOES, 'B.cod_acao = A.cod_acao', 'B.nom_acao', "joinLeft" ), 
				'C' => array (TSISPERMISSOES, "C.cod_permissao=A.cod_permissao", 'C.dsc_permissao', "joinLeft" ) 
			),
			$where );

	}
	
	

} // classe : fim


?>
