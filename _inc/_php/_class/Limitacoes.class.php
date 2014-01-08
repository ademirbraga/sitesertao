<?php

/**
 * Classe do sistema para trabalhar com a tabela custo_tbl.
 *
  * @category Classe
 * @name ../_inc/_php/_class/Limitacoes.class.php
 * @author Itaceu Tecnologia <comercial@itaceutecnologia.com.br>
 * @copyright [Informa��es de Direitos de C�pia]
 * @license [link da licen�a] [Nome da licen�a]
 * @link [link de onde pode ser encontrado esse arquivo]
 * @version 1.0.0
 * @since 13/05/2011 19:06:38
 */
// **********************
// DECLARA��O DA CLASSE
// **********************


class Limitacoes extends DbUtils { // classe : inicio
    // **********************
    // Declara��o de Atributos
    // **********************
    /**
     * @access private
     * @var _aplicativo
     */

    private $_aplicativo = "appLimitacoes.php";
    /**
     * @access private
     * @var _nomModulo
     */
    private $_nomModulo = "txt_limitacoes";
    /**
     * @access protected
     * @var _name
     */
    protected $_name = TLIMITACOES;
    /**
     * @access protected
     * @var cod_limitacao
     */
    protected $cod_limitacao;
    /**
     * @access protected
     * @var nom_limitacao
     */
    protected $nom_limitacao;
    /**
     * @access protected
     * @var bol_web
     */
    protected $bol_web;
    protected $cod_equipe;
    private $_camposLst = array(
        'cod_limitacao' => array('nome' => 'txt_cod_limitacao', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '40'),
        'nom_limitacao' => array('nome' => 'txt_nom_limitacao', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '160'),
        'bol_web' => array('nome' => 'txt_bol_web', 'tipo' => 'boolean', 'sortable' => 'yes', 'tamanho' => '140'),
    );

    // **********************
    // Construtor da classe
    // **********************

    function __construct() {
        parent::__construct(DBPADRAO);
        //$this->filtroRevenda(true,'');
        //$this->filtroCancelamento(true,'');
    }

    // **********************
    // M�todos GET
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

    function getCodLimitacao() {
        return $this->cod_limitacao;
    }

    function getNomLimitacao() {
        return $this->nom_limitacao;
    }

    function getBolWeb() {
        return $this->bol_web;
    }

    /**
     * Configura��o para listagem 
     */
    function configMod() {
        
    }

    // **********************
    // M�todos SET
    // **********************

    function setCodLimitacao($val) {
        $this->cod_limitacao = $val;
    }

    function setNomLimitacao($val) {
        $this->nom_limitacao = $val;
    }

    function setBolWeb($val) {
        $this->bol_web = $val;
    }

    /**
     * Sobrescrita de metodo para tratar os dados antes da inser��o
     * @param  string $data
     * @param bool $forceUpdate
     * @return int
     */
    function inserir($data = null, $forceUpdate = false) {
        $id = parent::inserir($data, $forceUpdate);
        return $id;
    }

}

?>