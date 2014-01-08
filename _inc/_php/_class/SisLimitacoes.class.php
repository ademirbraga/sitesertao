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


class SisLimitacoes extends DbUtils { // classe : inicio
    // **********************
    // Declaração de Atributos
    // **********************
    /**
     * @access private
     * @var _aplicativo
     */

    private $_aplicativo = "appSisLimitacoes.php";
    /**
     * @access private
     * @var _nomModulo
     */
    private $_nomModulo = "txt_limitacoes";
    /**
     * @access protected
     * @var _name
     */
    protected $_name = TSISLIMITACOES;
    /**
     * @access protected
     * @var cod_limitacao
     */
    protected $cod_sis_limitacoes;
    /**
     * @access protected
     * @var $cod_sis_limitacoes
     */
    protected $val_limitacao;
    /**
     * @access protected
     * @var $val_limitacao
     */
    protected $cod_limitacao;
    /**
     * @access protected
     * @var $cod_limitacao
     */
    protected $cod_equipe;
    /**
     * @access protected
     * @var cod_equipe
     */
    private $_camposLst = array(
        'cod_equipe' => array('nome' => 'txt_cod_equipe', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '40'),
        'nom_equipe' => array('nome' => 'txt_nom_equipe', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '140'),
//        'nom_limitacao' => array('nome' => 'txt_nom_limitacao', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '160'),
//        'val_limitacao' => array('nome' => 'txt_val_limitacao', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '160'),
//        'bol_web' => array('nome' => 'txt_bol_web', 'tipo' => 'boolean', 'sortable' => 'yes', 'tamanho' => '140'),
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

    function getCodSisLimitacoes() {
        return $this->cod_sis_limitacoes;
    }

    function getValLimitacao() {
        return $this->val_limitacao;
    }

    function getCodLimitacao() {
        return $this->cod_limitacao;
    }

    function getCodEquipe() {
        return $this->cod_equipe;
    }

    /**
     * Configuração para listagem 
     */
    function configMod() {
        
    }

    // **********************
    // Métodos SET
    // **********************

    function setCodSisLimitacoes($val) {
        $this->cod_sis_limitacoes = $val;
    }

    function setValLimitacao($val) {
        $this->val_limitacao = $val;
    }

    function setCodLimitacao($val) {
        $this->cod_limitacao = $val;
    }

    function setVodEquipe($val) {
        $this->cod_equipe = $val;
    }

    function listar() {

        $cols = array(
            'A.*',
            'B.nom_limitacao',
            'if(A.cod_equipe IS NULL, "Nenhum",A.cod_equipe) as cod_equipe'
        );

        $join = array(
            'B' => array(TLIMITACOES, 'B.cod_limitacao = A.cod_limitacao'),
            'C' => array(TSISEQUIPE, 'A.cod_equipe = C.cod_equipe', 'if(A.cod_equipe IS NULL, "Todas",C.nom_equipe) as nom_equipe'
                , 'joinLeft'),
        );

        return $this->consulta($cols, null, $join, $where, 'A.cod_equipe', $limit);
    }

    /**
     * Método para verificar o limite de cadastro
     * @param  string $modulo
     * @return string
     */
    function verificaLimitesCadastro($modulo) {

        $join = array(
            'B' => array(TLIMITACOES, 'B.cod_limitacao = A.cod_limitacao'),
        );

        if (!$this->isLimiteGeral($modulo)) {

            $cod_equipe = $_SESSION['usr']['cod_equipe'];
            $where = "A.cod_equipe = $cod_equipe AND B.cod_permissao = $modulo";
        } else {
            $where = "A.cod_equipe IS NULL AND B.cod_permissao = $modulo";
        }

        $dados = $this->consulta('A.*', null, $join, $where, $group, $limit)->getRegistro();

        if (!empty($dados['val_limitacao'])) {

            $totalRegistrosModulo = $this->getTotalRegistrosModulo($modulo);

            if ($totalRegistrosModulo >= $dados['val_limitacao']) {

                return 'limite_estourado';
            } else {
                return false;
            }
            return $dados['cod_equipe'];
        } else {
            return false;
        }
    }

    function getIdsEquipes() {

        $equipe = new SisEquipe();
        $dados = $equipe->consulta('A.*', null, $join, "A.dat_cancelamento IS NULL", $group, $limit)->getDados();

        $arrAux = array();
        foreach ($dados as $key => $value) {
            $arrAux[] = $value['cod_equipe'];
        }
        $ids = implode(',', $arrAux);

        return $ids;
    }

    function isLimiteGeral($modulo) {

        $join = array(
            'B' => array(TLIMITACOES, 'B.cod_limitacao = A.cod_limitacao'),
        );
        $where = "A.cod_equipe IS NULL AND B.cod_permissao = $modulo";
        $dadosLimiteGeral = $this->consulta('COUNT(B.cod_permissao) as total', null, $join, $where, $group, $limit)->getRegistro();

        if ($dadosLimiteGeral['total'])
            return true;
        else
            return false;
    }

    function getTotalRegistrosModulo($modulo) {

        if (!$this->isLimiteGeral($modulo)) {
            $cod_equipe = $_SESSION['usr']['cod_equipe'];
        } else {
            $cod_equipe = $this->getIdsEquipes();
        }

        // busca os registros do modulo
        $objModulo = new Modulo();
        $c = $objModulo->getObj($modulo);

        $join = array(
            'B' => array(TSISUSUARIO, 'B.cod_usuario = A.cod_usuario'),
        );

        $where = "B.cod_equipe IN($cod_equipe)";
        $cols = array('COUNT(B.cod_equipe) as total');
        $registrosEquipe = $c->consulta($cols, null, $join, $where, $group, $limit)->getRegistro();

        return $registrosEquipe['total'];
    }

    /**
     * @param  string $where
     * @return string
     */
    function getRegistroSisLimite($where) {

        $cols = "A.* , B.nom_limitacao  , C.nom_equipe";
        $join = array(
            'B' => array(TLIMITACOES, 'B.cod_limitacao = A.cod_limitacao'),
            'C' => array(TSISEQUIPE, 'A.cod_equipe = C.cod_equipe', '', 'joinLeft'),
        );

        return $this->consulta($cols, null, $join, $where, $group, $limit);
    }

    /* Método para obter limites por equipe
     * @param  string $where
     * @return string
     */

    function getRegistroSisLimiteCodEquipe($where) {

        $cols = array("A.*", "B.nom_limitacao", "C.nom_equipe", "A.cod_equipe as codigo_equipe");

        $join = array(
            'B' => array(TLIMITACOES, 'B.cod_limitacao = A.cod_limitacao'),
            'C' => array(TSISEQUIPE, 'A.cod_equipe = C.cod_equipe'),
        );

        return $this->consulta($cols, null, $join, $where, $group, $limit);
    }

    /**
     * Sobrescrita de metodo para tratar os dados antes da inserção
     * @param  string $data
     * @param bool $forceUpdate
     * @return int
     */
    function inserir($data = null, $forceUpdate = false) {

        if ($data['cod_equipe_ax'] != 'todos' && $data['cod_equipe'] != 'todos') {
            if (!empty($data['cod_equipe_ax']))
                $this->delete($where = 'cod_equipe = ' . $data['cod_equipe_ax']);
        } else {
            $this->delete($where = 'cod_equipe IS NULL ');
        }
        foreach ($data['usar'] as $key => $value) {

            $dados = array(
                'val_limitacao' => $data['val_limitacao'][$key],
                'cod_limitacao' => $data['cod_limitacao'][$key],
            );

            if ($data['cod_equipe'] != 'todos') {
                $dados['cod_equipe'] = $data['cod_equipe'];
            } else {
                unset($data['cod_equipe']);
            }

            $id = parent::inserir($dados, $forceUpdate);
        }
        return $id;
    }

    /**
     * Método para verificar se há limites para a equipe
     * @param  string $cod_equipe
     * @return string
     */
    function verificaDisponibilidade($cod_equipe) {

        if (!empty($cod_equipe)) {
            if ($cod_equipe == 'todos') {
                $dados = $this->consulta('A.*', null, $join, $where = 'A.cod_equipe IS NULL ', $group, $limit)->getRegistro();
            } else {
                $dados = $this->consulta('A.*', null, $join, $where = 'A.cod_equipe = ' . $cod_equipe, $group, $limit)->getRegistro();
            }
            return $dados['cod_sis_limitacoes'];
        }else
            return false;
    }

    function delete($cod_equipe) {

        if ($cod_equipe == "Nenhum")
            parent::delete($where = 'cod_equipe IS NULL');
        else {
            $where = str_replace('cod_sis_limitacoes', 'cod_equipe', $cod_equipe);
            parent::delete($where);
        }
    }

}

?>