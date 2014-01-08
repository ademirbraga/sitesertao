<?php
/*
    * @autor F3TEC - Claudia Matos - claudiarfm@yahoo.com.br
    */

/*
    *
    * -------------------------------------------------------
    * Classe:           TabPessoa
    * Gerada em:        08.10.2013
    * Arquivo:          ../projSertao/_inc/_php/_class/TabPessoa.class.php
    * Tabela:           tab_pessoa
    * Banco:	    bd_mysql_sertao
    * -------------------------------------------------------
    *
    */

class TabPessoa extends DbUtils
{


    // **********************
    // Declaracao de Atributos
    // **********************

    private $_aplicativo = "appTabPessoa.php";
    /**
     * @access private
     * @var _nomModulo

     */
    private $_nomModulo = txt_TabPessoa;
    /**
     * @access protected
     * @var _name

     */
    protected $_name = TTABPESSOA;


    protected $cod_pessoa;


    protected $cod_usuario;


    protected $cod_classif_pessoa;


    protected $nom_pessoa;


    protected $cod_cpf;


    protected $des_endereco;


    protected $des_nro_endereco;


    protected $des_complemento;


    protected $des_nro_celular;


    protected $des_nro_celular_2;


    protected $dat_aniversario;


    protected $des_sexo;


    protected $bol_ativo;


    protected $dat_cadastro;


    protected $dat_alteracao;


    protected $qtd_filhos;


    protected $bol_utiliza_crm;


    private $_camposLst = array('cod_pessoa' => array('nome' => 'txt_cod_pessoa', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '11'),
        //'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
        //'cod_classif_pessoa' => array('nome'=>'txt_cod_classif_pessoa','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
        'nom_pessoa' => array('nome' => 'txt_nom_pessoa', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '60'),
        'cod_cpf' => array('nome' => 'txt_cod_cpf', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '11'),
        //'des_endereco' => array('nome'=>'txt_des_endereco','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '60'),
        //'des_nro_endereco' => array('nome'=>'txt_des_nro_endereco','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
        //'des_complemento' => array('nome'=>'txt_des_complemento','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '50'),
        'des_nro_celular' => array('nome' => 'txt_des_nro_celular', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '15'),
        //'des_nro_celular_2' => array('nome'=>'txt_des_nro_celular_2','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '15'),
        //'dat_aniversario' => array('nome'=>'txt_dat_aniversario','tipo'=>'datetime','sortable'=>'yes', 'tamanho'=> '60'),
        //'des_sexo' => array('nome'=>'txt_des_sexo','tipo'=>'varchar','sortable'=>'yes', 'tamanho'=> '10'),
        //'bol_ativo' => array('nome'=>'txt_bol_ativo','tipo'=>'tinyint','sortable'=>'yes', 'tamanho'=> '4'),
        'dat_cadastro' => array('nome' => 'txt_dat_cadastro', 'tipo' => 'timestamp', 'sortable' => 'yes', 'tamanho' => '60'),
        //'dat_alteracao' => array('nome'=>'txt_dat_alteracao','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'),
        //'qtd_filhos' => array('nome'=>'txt_qtd_filhos','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
        'bol_utiliza_crm' => array('nome' => 'txt_bol_utiliza_crm', 'tipo' => 'tinyint', 'sortable' => 'yes', 'tamanho' => '4'));

    // **********************
    // Construtor da classe
    // **********************

    function __construct()
    {
        parent::__construct(DBPADRAO);
    }


    // **********************
    // M�todos GET
    // **********************
    function getcamposLst()
    {
        return $this->_camposLst;
    }

    function getaplicativo()
    {
        return $this->_aplicativo;
    }

    function getnomModulo()
    {
        return $this->_nomModulo;
    }

    function getCodPessoa()
    {
        return $this->cod_pessoa;
    }

    function getCodUsuario()
    {
        return $this->cod_usuario;
    }

    function getCodClassifPessoa()
    {
        return $this->cod_classif_pessoa;
    }

    function getNomPessoa()
    {
        return $this->nom_pessoa;
    }

    function getCodCpf()
    {
        return $this->cod_cpf;
    }

    function getDesEndereco()
    {
        return $this->des_endereco;
    }

    function getDesNroEndereco()
    {
        return $this->des_nro_endereco;
    }

    function getDesComplemento()
    {
        return $this->des_complemento;
    }

    function getDesNroCelular()
    {
        return $this->des_nro_celular;
    }

    function getDesNroCelular2()
    {
        return $this->des_nro_celular_2;
    }

    function getDatAniversario()
    {
        return $this->dat_aniversario;
    }

    function getDesSexo()
    {
        return $this->des_sexo;
    }

    function getBolAtivo()
    {
        return $this->bol_ativo;
    }

    function getDatCadastro()
    {
        return $this->dat_cadastro;
    }

    function getDatAlteracao()
    {
        return $this->dat_alteracao;
    }

    function getQtdFilhos()
    {
        return $this->qtd_filhos;
    }

    function getBolUtilizaCrm()
    {
        return $this->bol_utiliza_crm;
    }

    // **********************
    // M�todos SET
    // **********************

    function setCodPessoa($val)
    {
        $this->cod_pessoa = $val;
    }

    function setCodUsuario($val)
    {
        $this->cod_usuario = $val;
    }

    function setCodClassifPessoa($val)
    {
        $this->cod_classif_pessoa = $val;
    }

    function setNomPessoa($val)
    {
        $this->nom_pessoa = $val;
    }

    function setCodCpf($val)
    {
        $this->cod_cpf = $val;
    }

    function setDesEndereco($val)
    {
        $this->des_endereco = $val;
    }

    function setDesNroEndereco($val)
    {
        $this->des_nro_endereco = $val;
    }

    function setDesComplemento($val)
    {
        $this->des_complemento = $val;
    }

    function setDesNroCelular($val)
    {
        $this->des_nro_celular = $val;
    }

    function setDesNroCelular2($val)
    {
        $this->des_nro_celular_2 = $val;
    }

    function setDatAniversario($val)
    {
        $this->dat_aniversario = $val;
    }

    function setDesSexo($val)
    {
        $this->des_sexo = $val;
    }

    function setBolAtivo($val)
    {
        $this->bol_ativo = $val;
    }

    function setDatCadastro($val)
    {
        $this->dat_cadastro = $val;
    }

    function setDatAlteracao($val)
    {
        $this->dat_alteracao = $val;
    }

    function setQtdFilhos($val)
    {
        $this->qtd_filhos = $val;
    }

    function setBolUtilizaCrm($val)
    {
        $this->bol_utiliza_crm = $val;
    }

    // **********************
    // M�todo listar abstrato
    // **********************

    /**
     * Configura��o para listagem
     */
    function configMod()
    {
    }

    // **********************
    // M�todo cadastrar abstrato
    // **********************

    // **********************
    // Cancelar abstrato
    // **********************

    /**
     * @name verificaCPF
     * @param array $aPost
     * @desc Verifica se um login ja existe
     */
    public function verificaCPF($cpfcnpj, $codUser)
    {

        //retirando os caracteres do cnpj
        $chars = array(".", "/", "-");
        $cpfcnpj = str_replace($chars, "", $cpfcnpj);

        $and = ($codUser != '') ? " and cod_pessoa <> '$codUser'" : '';

        return $this->recordCount($where = "cod_cpf = '$cpfcnpj'  and cod_pessoa <> '$codUser'") > 0 ? true : false;
    }

    public function buscarDadosPessoa($cpfcnpj) {

        //retirando os caracteres do cnpj
        $chars = array(".", "/", "-");
        $cpfcnpj = str_replace($chars, "", $cpfcnpj);

        return $this->listar("*", $where = "cod_cpf = '$cpfcnpj'", 1)->getRegistro();

    }


} // classe : fim

?>
