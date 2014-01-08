<?php
/*
 * @autor Gerador WebTupi
 */

/*
 *
 * -------------------------------------------------------
 * Classe:           SisUsuario
 * Gerada em:        17.11.2011
 * Arquivo:          _inc/_php/_class/SisUsuario.class.php
 * Tabela:		    sis_usuario
 * Banco:		    bd_unimed
 * -------------------------------------------------------	
 *
 */

// **********************
// DECLARAï¿½ï¿½O DA CLASSE
// **********************



class SisUsuario extends DbUtils { // classe : inicio
    // **********************
    // Declaraï¿½ï¿½o de Atributos
    // **********************

    /**

     * @access private

     * @var _aplicativo

     */

    private $_aplicativo = "appSisUsuario.php";

    /**

     * @access private

     * @var _nomModulo

     */
    private $_nomModulo = "txt_nom_usuario";

    /**

     * @access protected

     * @var _name

     */
    protected $_name = TSISUSUARIO;

    /**

     * @access protected

     * @var cod_usuario

     */
    protected $cod_usuario;

    /**

     * @access protected

     * @var cod_equipe

     */
    protected $cod_equipe;

    /**

     * @access protected

     * @var nom_usuario

     */
    protected $nom_usuario;

    /**

     * @access protected

     * @var nom_login

     */
    protected $nom_login;

    /**

     * @access protected

     * @var nom_senha

     */
    protected $nom_senha;

    /**

     * @access protected

     * @var nom_email

     */
    protected $nom_email;

    /**

     * @access protected

     * @var cod_perfil

     */
    protected $cod_perfil;

    /**

     * @access protected

     * @var dat_termino

     */
    protected $dat_termino;

    /**

     * @access protected

     * @var dat_cadastro

     */
    protected $dat_cadastro;

    /**

     * @access protected

     * @var dat_ultimo_login

     */
    protected $dat_ultimo_login;
    private $_cancelado;
    private $_camposLst = array('cod_usuario' => array('nome' => 'txt_cod_identificador', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '30'),
        'nom_usuario' => array('nome' => 'txt_nom_usuario', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '150'),
        'nom_login' => array('nome' => 'txt_nom_login', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '150'),
        'nom_email' => array('nome' => 'txt_nom_email', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '150'),
       // 'nom_equipe' => array('nome' => 'txt_cod_equipe', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '80'),
        'nom_perfil' => array('nome' => 'txt_cod_perfil', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '150'),
        'dat_cadastro' => array('nome' => 'txt_dat_cadastro', 'tipo' => 'timestamp', 'sortable' => 'yes', 'tamanho' => '100'),
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
    // Mï¿½todos GET
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

    function getCodUsuario() {

        return $this->cod_usuario;
    }

    function getCodEquipe() {

        return $this->cod_equipe;
    }

    function getNomUsuario() {

        return $this->nom_usuario;
    }

    function getNomLogin() {

        return $this->nom_login;
    }

    function getNomSenha() {

        return $this->nom_senha;
    }

    function getNomEmail() {

        return $this->nom_email;
    }

    function getCodPerfil() {

        return $this->cod_perfil;
    }

    function getDatTermino() {

        return $this->dat_termino;
    }

    function getDatCadastro() {

        return $this->dat_cadastro;
    }

    function getDatUltimoLogin() {

        return $this->dat_ultimo_login;
    }

    /**

     * Configuraï¿½ï¿½o para listagem 

     */
    function configMod() {
        
    }

    // **********************
    // Mï¿½todos SET
    // **********************



    function setCodUsuario($val) {

        $this->cod_usuario = $val;
    }

    function setCodEquipe($val) {

        $this->cod_equipe = $val;
    }

    function setNomUsuario($val) {

        $this->nom_usuario = $val;
    }

    function setNomLogin($val) {

        $this->nom_login = $val;
    }

    function setNomSenha($val) {

        $this->nom_senha = $val;
    }

    function setNomEmail($val) {

        $this->nom_email = $val;
    }

    function setCodPerfil($val) {

        $this->cod_perfil = $val;
    }

    function setDatTermino($val) {

        $this->dat_termino = $val;
    }

    function setDatCadastro($val) {

        $this->dat_cadastro = $val;
    }

    function setDatUltimoLogin($val) {

        $this->dat_ultimo_login = $val;
    }

    function isLogado() {

        return $this->_logado;
    }

    function isCancelado() {

        if (!empty($this->dat_termino)) {



            $arr = explode(' ', $this->dat_termino);

            $dat = implode('-', array_reverse(explode('/', $arr [0]))) . ' ' . $arr [1];

            $this->_cancelado = (strtotime($dat) < strtotime(date("Y-m-d G:i:s"))) ? true : false;
        }

        return $this->_cancelado;
    }

    function setLogado($flg) {

        $this->_logado = $flg;
    }

    function logon() {

        $this->_logado = true;
    }

    function logoff() {

        $this->_logado = false;
    }

    function permissoes() {

        $sql = "select
                C.cod_permissao, C.num_nivel_permissao

                from " . TSISUSUARIO . " A

                inner join " . TSISPERFIL . " B on (A.cod_perfil = B.cod_perfil)				

                inner join " . TSISPERFILPERMISSOES . " C on (B.cod_perfil = C.cod_perfil)				

                where A.cod_usuario='" . $this->cod_usuario . "'";



        $this->consultaSql($sql);

        $perm = $this->getDados();

        $arrPerm = array();

        foreach ($perm as $p) {

            $arrPerm [$p ['cod_permissao']] ['cod_permissao'] = $p ['cod_permissao'];

            @$arrPerm [$p ['cod_permissao']] ['num_nivel_permissao'] |= $p ['num_nivel_permissao'];
        }



        $this->_arrPermissoes = $arrPerm;

        return $this->_arrPermissoes;
    }

    /**

     * Sobrescrita de metodo para efetuar a validacao da insercao

     * @param  $data

     * @param bool $forceUpdate

     * @return bool

     */
    public function inserir($data, $forceUpdate = false) {

        if (empty($data))
            return 0;

        if (empty($data['nom_senha']))
            unset($data['nom_senha']);

        else {

            $data['nom_senha'] = md5($data['nom_senha']);
        }

        $codUsuario = parent::inserir($data, $forceUpdate);


	if (is_array($codUsuario))
            $codUsuario =  $codUsuario['cod_usuario'];
        else
            $codUsuario =  $codUsuario;


        /**

         * configuracoes de usuario

         
        $objConfig = new SisUsuarioConfigs();

        $data['cod_usuario'] = $codUsuario;

        $objConfig->inserir($data);
	*/

	/**
         * Usuario Site
         */        
	
	if (is_array($data['cod_menu'])){	   
	    if(!empty($data['cod_menu'][0])){
		
		$objUsrSite = new TabUsuarioSite();		
		$dados['cod_usuario'] = $codUsuario;
		
		if(!empty($dados['cod_usuario']))
		    $objUsrSite->excluir("cod_usuario=".$dados['cod_usuario']);
		
		foreach ($data['cod_menu'] as $key => $value) {
		    $dados['cod_menu'] = $value;		    
		    $objUsrSite->inserir($dados,true);
		}		
	    }
	}
	
	return $codUsuario;
    }

    public function listarPorRef($cols = "*", $where = '', $limit = false, $group = '') {



        return $this->consulta('A.*', null, array('B' => array(TSISEQUIPE, 'B.cod_equipe = A.cod_equipe', 'B.nom_equipe'), 'C' => array(TSISPERFIL, 'C.cod_perfil = A.cod_perfil', 'C.nom_perfil')));
    }

    /**

     * Metodo responsavel pelo relatorio de usuarios

     * @param <type> $filtros

     * @param <type> $exec

     * @param <type> $export

     * @return <type>

     */
    public function getRelatorioUsuarios($filtros = null, $exec = true, $export = false) {



        $lstUsuario = $this->formatDados('cod_usuario', 'nom_usuario');

        $lstStatus = array(1 => 'Inativo', 2 => 'Ativo');

        $formulario = array(
            'txt_nom_usuario' => array('tag' => 'select', 'name' => 'cod_usuario', 'options' => $lstUsuario)
            , 'txt_nom_login' => array('type' => 'text', 'name' => 'nom_login')
            , 'txt_nom_email' => array('type' => 'text', 'name' => 'nom_email')
            , 'txt_nom_status' => array('tag' => 'select', 'name' => 'dat_termino', 'options' => $lstStatus)

//			,'txt_dat_ultimo_login' => array('type' => 'text', 'name' => 'dat_ultimo_login', 'class'=>'datepicker')
        );



        $this->setRelatorioForm($formulario);

        $this->setnomRelatorio('txt_cod_usuario');



        /**

         * Nï¿½o aplicados ainda a inserï¿½ï¿½o de CSS e Javascript

         */
        $js = '';

        $css = '';

        $this->setRelatorioJS($js);

        $this->setRelatorioCSS($css);



        if ($exec || $export) {



            $join = array();



            /**

             * Monta o where no formato campo = 'valor'

             * Pode acrescentar tipos de verificaï¿½ï¿½o caso necessï¿½rio, o segundo parï¿½metro ï¿½ para casos especiais

             */
//                        if($where['status'])

            if ($filtros['dat_termino'] == 1 || $filtros['dat_termino'] == 2) {

                $dat_termino = $filtros['dat_termino'];

                unset($filtros['dat_termino']);
            }

            $where = $this->montaWhereRelatorio($filtros, null);

            $where_str = '';



            if (!empty($where)) {

                $where_str = implode(' AND ', $where);
            }

            if ($dat_termino) {

                if ($dat_termino == 2) {

                    if ($where_str) {

                        $where_str = $where_str.= ' AND dat_termino is null OR dat_termino = 0 ';
                    } else {

                        $where_str = $where_str.= '  dat_termino is null OR dat_termino = 0 ';
                    }
                } else if ($dat_termino == 1) {

                    if ($where_str) {

                        $where_str = $where_str.= ' AND dat_termino > 0 ';
                    } else {

                        $where_str = $where_str.= ' dat_termino > 0 ';
                    }
                }
            }

//                        print_r($where_str );die;

            $this->setPaginacao($filtros['rows'], $filtros['page']);



            $limit = true;

            // sem limite quando for exportar para arquivo

            if ($export) {

                $limit = false;
            }



            if (!empty($filtros['sidx'])) {

                $order = array("{$filtros['sidx']} {$filtros['sord']}");
            } else {

                $order = array("dat_cadastro ASC");
            }

            $this->setOrder($order);

            $dados = $this->consulta(array("nom_usuario,nom_login,nom_email, dat_ultimo_login, dat_termino,IF((dat_termino is NULL) OR (dat_termino = 0),'Ativo','Inativo')as status "), TSISUSUARIO, $join, $where_str, null, $limit)->getDados();

            $total_registros = $this->getFoundRows();



            /**

             * Todas as opï¿½ï¿½es disponï¿½veis no grid podem ser aplicadas aqui

             * Campos obrigatï¿½rios sï¿½o "name" e "index"

             */
            $gridConfig = array(
                'colunas' => array(// nomes e formataï¿½ï¿½o das colunas

                    'txt_nom_usuario' => array(
                        'name' => 'nom_usuario'
                        , 'index' => 'nom_usuario'
                        , 'width' => '100'
                        , 'sortable' => true)
                    , 'txt_nom_login' => array(
                        'name' => 'nom_login'
                        , 'index' => 'nom_login'
                        , 'width' => '100'
                        , 'sortable' => true)
                    , 'txt_nom_email' => array(
                        'name' => 'nom_email'
                        , 'index' => 'nom_email'
                        , 'width' => '100'
                        , 'sortable' => true)
                    , 'txt_topo_msg_ultimo_login' => array(
                        'name' => 'dat_ultimo_login'
                        , 'formatter' => 'date'
                        , 'formatoptions' => array('srcformat' => 'Y-m-d H:i:s', 'newformat' => 'd\/m\/Y H:i:s')
                        , 'index' => 'dat_ultimo_login'
                        , 'width' => '100'
                        , 'sortable' => true)
                    , 'txt_nom_status' => array(
                        'name' => 'status'
                        , 'index' => 'status'
                        , 'width' => '100'
                        , 'sortable' => true)
                )
                , 'nro_total_registros' => $total_registros // nï¿½mero total de registros, usar a getFoundRows()
                , 'registros' => $dados // registros vindos do banco de dados
            );



            return $gridConfig;
        }

        return true;
    }

    /**

     * @name verificaUsuario

     * @param array $aPost

     * @desc Verifica se um login jï¿½ existe

     */
    public function verificaUsuario($login, $codUser) {

        $and = ($codUser != '') ? " and cod_usuario <> '$codUser'" : '';

        return $this->recordCount($where = "nom_login = '$login'  and cod_usuario <> '$codUser'") > 0 ? true : false;
    }

}

// classe : fim
?>

