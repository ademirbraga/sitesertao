<?php

/*
 * @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
 */

/*
 *
 * -------------------------------------------------------
 * Classe:           TabDuvida
 * Gerada em:        08.08.2013
 * Arquivo:          ../portalunimed/_inc/_php/_class/Duvida.class.php
 * Tabela:           tab_duvida
 * Banco:	    bd_portal_unimed
 * -------------------------------------------------------	
 *
 */

class TabDuvida extends DbUtils {

    // **********************
    // Declaracao de Atributos
    // **********************

    private $_aplicativo = "appTabDuvida.php";

    /**

     * @access private

     * @var _nomModulo

     */
    private $_nomModulo = txt_TabDuvida;

    /**

     * @access protected

     * @var _name

     */
    protected $_name = TTABDUVIDA;
    protected $cod_duvida;
    protected $cod_usuario;
    protected $nom_pergunta_duvida;
    protected $nom_resposta_duvida;
    protected $num_acesso;
    protected $dat_cadastro;
    protected $dat_finalizado;
    private $_camposLst = array('cod_duvida' => array('nome' => 'txt_cod_duvida', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '11'),
	//'cod_usuario' => array('nome'=>'txt_cod_usuario','tipo'=>'int','sortable'=>'yes', 'tamanho'=> '11'),
	'nom_pergunta_duvida' => array('nome' => 'txt_nom_pergunta_duvida', 'tipo' => 'text', 'sortable' => 'yes', 'tamanho' => '60'),
	//'nom_resposta_duvida' => array('nome'=>'txt_nom_resposta_duvida','tipo'=>'text','sortable'=>'yes', 'tamanho'=> '60'),
	'num_acesso' => array('nome' => 'txt_num_acesso', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '11'),
	'dat_cadastro' => array('nome' => 'txt_dat_cadastro', 'tipo' => 'timestamp', 'sortable' => 'yes', 'tamanho' => '60')
	//'dat_finalizado' => array('nome' => 'txt_dat_finalizado', 'tipo' => 'timestamp', 'sortable' => 'yes', 'tamanho' => '60')
	);

    // **********************
    // Construtor da classe
    // **********************

    function __construct() {
	parent::__construct(DBPADRAO);
	$this->filtroCancelamento(true,'(dat_finalizado IS NULL or dat_finalizado >= CURRENT_TIMESTAMP)');
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

    function getCodDuvida() {
	return $this->cod_duvida;
    }

    function getCodUsuario() {
	return $this->cod_usuario;
    }

    function getNomPerguntaDuvida() {
	return $this->nom_pergunta_duvida;
    }

    function getNomRespostaDuvida() {
	return $this->nom_resposta_duvida;
    }

    function getNumAcesso() {
	return $this->num_acesso;
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

    function setCodDuvida($val) {
	$this->cod_duvida = $val;
    }

    function setCodUsuario($val) {
	$this->cod_usuario = $val;
    }

    function setNomPerguntaDuvida($val) {
	$this->nom_pergunta_duvida = $val;
    }

    function setNomRespostaDuvida($val) {
	$this->nom_resposta_duvida = $val;
    }

    function setNumAcesso($val) {
	$this->num_acesso = $val;
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
    public function excluir( $registro = null ) {	    
	    
	    $data['dat_finalizado'] = date("Y-m-d H:i:s");
	    
	    if( isset($registro['chave'] )) {		    	
		$where = "cod_duvida = '{$registro['chave']}'";;
    		parent::atualizar( $data, $where );			
	    }else{
		if(is_array($registro)){		    
		    foreach ($registro as $key => $value) {			
			$where = "cod_duvida = '{$value}'";;
			parent::atualizar( $data, $where );			
		    }
		}		
	    }
	}
}

// classe : fim
?>
