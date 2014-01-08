<?php

/*
 * @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
 */

/*
 *
 * -------------------------------------------------------
 * Classe:           TabAtividadeProfissional
 * Gerada em:        08.08.2013
 * Arquivo:          ../portalunimed/_inc/_php/_class/AtividadeProfissional.class.php
 * Tabela:           tab_atividade_profissional
 * Banco:	    bd_portal_unimed
 * -------------------------------------------------------	
 *
 */

class TabAtividadeProfissional extends DbUtils {

    // **********************
    // Declaracao de Atributos
    // **********************

    private $_aplicativo = "appTabAtividadeProfissional.php";

    /**

     * @access private

     * @var _nomModulo

     */
    private $_nomModulo = "txt_TabAtividadeProfissional";

    /**

     * @access protected

     * @var _name

     */
    protected $_name = TTABATIVIDADEPROFISSIONAL;
    protected $cod_atividade_profissional;
    protected $nom_empresa;
    protected $dat_inicio_profissional;
    protected $dat_fim_profissional;
    protected $dsc_profissional;
    protected $val_salario;
    protected $dat_cadastro;
    protected $dat_finalizado;
    private $_camposLst = array('cod_atividade_profissional' => array('nome' => 'txt_cod_atividade_profissional', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '11'),
        'nom_empresa' => array('nome' => 'txt_nom_empresa', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '125'),
        'dat_inicio_profissional' => array('nome' => 'txt_dat_inicio_profissional', 'tipo' => 'date', 'sortable' => 'yes', 'tamanho' => '60'),
        'dat_fim_profissional' => array('nome' => 'txt_dat_fim_profissional', 'tipo' => 'date', 'sortable' => 'yes', 'tamanho' => '60'),
        'dsc_profissional' => array('nome' => 'txt_dsc_profissional', 'tipo' => 'double', 'sortable' => 'yes', 'tamanho' => '60'),
        'val_salario' => array('nome' => 'txt_val_salario', 'tipo' => 'decimal', 'sortable' => 'yes', 'tamanho' => '10,0'),
        'dat_cadastro' => array('nome' => 'txt_dat_cadastro', 'tipo' => 'timestamp', 'sortable' => 'yes', 'tamanho' => '60'),
        'dat_finalizado' => array('nome' => 'txt_dat_finalizado', 'tipo' => 'timestamp', 'sortable' => 'yes', 'tamanho' => '60'));

    // **********************
    // Construtor da classe
    // **********************

    function __construct() {
        parent::__construct(DBPADRAO);
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

    function getCodAtividadeProfissional() {
        return $this->cod_atividade_profissional;
    }

    function getNomEmpresa() {
        return $this->nom_empresa;
    }

    function getDatInicioProfissional() {
        return $this->dat_inicio_profissional;
    }

    function getDatFimProfissional() {
        return $this->dat_fim_profissional;
    }

    function getDscProfissional() {
        return $this->dsc_profissional;
    }

    function getValSalario() {
        return $this->val_salario;
    }

    function getDatCadastro() {
        return $this->dat_cadastro;
    }

    function getDatFinalizado() {
        return $this->dat_finalizado;
    }

    // **********************
    // Métodos SET
    // **********************

    function setCodAtividadeProfissional($val) {
        $this->cod_atividade_profissional = $val;
    }

    function setNomEmpresa($val) {
        $this->nom_empresa = $val;
    }

    function setDatInicioProfissional($val) {
        $this->dat_inicio_profissional = $val;
    }

    function setDatFimProfissional($val) {
        $this->dat_fim_profissional = $val;
    }

    function setDscProfissional($val) {
        $this->dsc_profissional = $val;
    }

    function setValSalario($val) {
        $this->val_salario = $val;
    }

    function setDatCadastro($val) {
        $this->dat_cadastro = $val;
    }

    function setDatFinalizado($val) {
        $this->dat_finalizado = $val;
    }

    // **********************
    // Método listar abstrato
    // **********************

    /**
     * Configuração para listagem 
     */
    function configMod() {
        
    }

    // **********************
    // Método cadastrar abstrato
    // **********************
    // **********************
    // Cancelar abstrato
    // **********************
}

// classe : fim
?>
