<?php 

/*
 * @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
 */

/*
 *
 * -------------------------------------------------------
 * Classe:           TabAgendaCompromisso
 * Gerada em:        08.08.2013
 * Arquivo:          ../portalunimed/_inc/_php/_class/AgendaCompromisso.class.php
 * Tabela:           tab_agenda_compromisso
 * Banco:	    bd_portal_unimed
 * -------------------------------------------------------	
 *
 */

class TabAgendaCompromisso extends DbUtils {

    // **********************
    // Declaracao de Atributos
    // **********************

    private $_aplicativo = "appTabAgendaCompromisso.php";

    /**

     * @access private

     * @var _nomModulo

     */
    private $_nomModulo = "txt_TabAgendaCompromisso";

    /**

     * @access protected

     * @var _name

     */
    protected $_name = TTABAGENDACOMPROMISSO;
    protected $cod_agenda_compromisso;
    protected $cod_usuario;
    protected $nom_arq_agenda;
    protected $dat_cadastro;
    protected $dat_finalizado;
    private $_camposLst = array('cod_agenda_compromisso' => array('nome' => 'txt_cod_agenda_compromisso', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '11'),
        //'cod_usuario' => array('nome' => 'txt_cod_usuario', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '11'),
        'nom_arq_agenda' => array('nome' => 'txt_nom_arq_agenda', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '225'),
        'dat_cadastro' => array('nome' => 'txt_dat_cadastro', 'tipo' => 'timestamp', 'sortable' => 'yes', 'tamanho' => '60')
        //'dat_finalizado' => array('nome' => 'txt_dat_finalizado', 'tipo' => 'timestamp', 'sortable' => 'yes', 'tamanho' => '60')
	);

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

    function getCodAgendaCompromisso() {
        return $this->cod_agenda_compromisso;
    }

    function getCodUsuario() {
        return $this->cod_usuario;
    }

    function getNomArqAgenda() {
        return $this->nom_arq_agenda;
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

    function setCodAgendaCompromisso($val) {
        $this->cod_agenda_compromisso = $val;
    }

    function setCodUsuario($val) {
        $this->cod_usuario = $val;
    }

    function setNomArqAgenda($val) {
        $this->nom_arq_agenda = $val;
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
    /**
	* Sobrescrita de metodo para efetuar a validacao da insercao
	* @param  $data
	* @param bool $forceUpdate
	* @return bool
	*/
       public function inserir($data = null, $forceUpdate = false) {

	   if (empty($data))
	       return 0;

	   $caminho = explode("/", trim($data['nom_arq_agenda']));	   
	    //print_r($caminho);
	    if(empty($caminho[2])){
		$data['nom_arq_agenda'] = WWW_UPLOAD_TABELA.'_agendacompromisso/'.$data['nom_arq_agenda'];
	    }  else {
		$data['nom_arq_agenda'] = $data['nom_arq_agenda'];
	    }
	    
	    if(!empty($data['dat_finalizado'])){
		$datafinal = explode('/', $data['dat_finalizado']);		
		$data['dat_finalizado'] = date("Y-m-d H:i:s",mktime(23,59,59,$datafinal[1],$datafinal[0],$datafinal[2]));
	    }else
		unset($data['dat_finalizado']);

	   //echo "ANTES==";print_r($data);
	   //$ret = $this->objToArray();  print_r($ret);       
	   $this->populate($data);
	   //echo "DEPOIS";print_r($data);	

	   $cod_agenda_compromisso = parent::inserir(NULL, $forceUpdate);

	   return $cod_agenda_compromisso;

       }
    // **********************
    // Cancelar abstrato
    // **********************
}

// classe : fim
?>
