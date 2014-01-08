<?php
/*
 * @autor Gerador WebTupi
 * -------------------------------------------------------
 * Classe:           Grupo
 * Gerada em:        17.11.2011
 * Arquivo:          ../_inc/_php/_class/Grupo.class.php
 * Tabela:		    grupo
 * Banco:		    
 * -------------------------------------------------------	
 *
 */

// **********************
// DECLARAÇÂO DA CLASSE
// **********************



class SisEquipe extends DbUtils { // classe : inicio
    // **********************
    // Declaração de Atributos
    // **********************

    /**
     * @access private
     * @var _aplicativo
     */

    private $_aplicativo = "appSisEquipe.php";

    /**
     * @access private
     * @var _nomModulo
     */
    private $_nomModulo = "txt_empresas";

    /**
     * @access protected
     * @var _name
     */
    protected $_name = TSISEQUIPE;

    /**
     * @access protected
     * @var cod_equipe
     */
    protected $cod_equipe;

    /**
     * @access protected
     * @var nom_equipe
     */
    protected $nom_equipe;

    /**

     * @access protected

     * @var cod_equipe_superior

     */
    protected $cod_equipe_superior;

    /**

     * @access protected

     * @var dat_cadastro

     */
    protected $dat_cadastro;

    /**

     * @access protected

     * @var dat_cancelamento

     */
    protected $dat_cancelamento;
    protected $_foreignKeys = array('cod_equipe_superior');
    private $_camposLst = array('cod_equipe' => array('nome' => 'txt_cod_identificador', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '30'),
        'nom_equipe' => array('nome' => 'txt_nom_equipe', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '130'),
        'nom_equipe_superior' => array('nome' => 'txt_cod_equipe_superior', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '130'),
        'dat_cadastro' => array('nome' => 'txt_dat_cadastro', 'tipo' => 'timestamp', 'sortable' => 'yes', 'tamanho' => '140'),
        'dat_cancelamento' => array('nome' => 'txt_dat_cancelamento', 'tipo' => 'timestamp', 'sortable' => 'yes', 'tamanho' => '140'));

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

    function getCodEquipe() {

        return $this->cod_equipe;
    }

    function getNomEquipe() {

        return $this->nom_equipe;
    }

    function getCodEquipeSuperior() {

        return $this->cod_equipe_superior;
    }

    function getDatCadastro() {

        return $this->dat_cadastro;
    }

    function getDatCancelamento() {

        return $this->dat_cancelamento;
    }

    /**

     * Configuração para listagem 

     */
    function configMod() {
        
    }

    // **********************
    // Métodos SET
    // **********************



    function setCodEquipe($val) {

        $this->cod_equipe = $val;
    }

    function setNomEquipe($val) {

        $this->nom_equipe = $val;
    }

    function setCodEquipeSuperior($val) {

        $this->cod_equipe_superior = $val;
    }

    function setDatCadastro($val) {

        $this->dat_cadastro = $val;
    }

    function setDatCancelamento($val) {

        $this->dat_cancelamento = $val;
    }

    public function getConfig($cols = "*", $where = '', $limit = false, $group = '') {



        $join = array('B' => array(TSISEQUIPE, 'A.cod_equipe = B.cod_equipe', 'B.nom_equipe', 'joinLeft'));

        return parent::consulta($cols, TSISEQUIPECONFIGURACOES, $join, $where, '', true);
    }

    /**

     * @desc Comparar o endereco da touche com o endereco do cliente, NAO podem ser iguais

     * @param unknown_type $post

     * @return string|string

     */
    public function compararEndereco($post = array()) {

        $equipe = $this->getConfig(null, $where = "A.cod_equipe=" . COD_EQUIPE_TOUCHE)->getRegistro();



        $equipe = array_map('strtolower', $equipe);

        $equipe = array_map(array($this, 'removeAcento'), $equipe);



        $post = array_map('strtolower', $post);

        $post = array_map(array($this, 'removeAcento'), $post);





        if ($equipe['nom_endereco'] == $post['nom_logradouro'] && $equipe['num_numero'] == $post['num_numero'] &&
                $equipe['nom_cidade'] == $post['nom_cidade'] && $equipe['nom_bairro'] == $post['nom_bairro'] &&
                $equipe['sig_uf'] == $post['sig_uf'] && $equipe['num_cep'] == $post['num_cep']) {

            return true;
        }

        return false;
    }

    public function removeAcento($var) {

        return Helpers::removerAcentos($var);
    }

    public function listarPorRef($cols = "*", $where = '', $limit = false, $group = '') {



        return $this->consulta('A.*', null, array('B' => array(TSISEQUIPE, 'B.cod_equipe = A.cod_equipe_superior', 'B.nom_equipe as nom_equipe_superior', "joinLeft")));
    }

}

// classe : fim
?>

