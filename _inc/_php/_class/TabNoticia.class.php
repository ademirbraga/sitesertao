<?php

/*
 * @autor Webtupi - Claudia Matos - claudia.matos@webtupi.com.br
 */

/*
 *
 * -------------------------------------------------------
 * Classe:           TabNoticia
 * Gerada em:        08.08.2013
 * Arquivo:          ../portalunimed/_inc/_php/_class/Noticia.class.php
 * Tabela:           tab_noticia
 * Banco:	    bd_portal_unimed
 * -------------------------------------------------------	
 *
 */

class TabNoticia extends DbUtils {

    // **********************
    // Declaracao de Atributos
    // **********************

    private $_aplicativo = "appTabNoticia.php";

    /**

     * @access private

     * @var _nomModulo

     */
    private $_nomModulo = txt_TabNoticia;

    /**

     * @access protected

     * @var _name

     */
    protected $_name = TTABNOTICIA;
    protected $cod_noticia;
    protected $cod_usuario;
    protected $nom_titulo;
    protected $dsc_noticia;
    protected $dat_cadastro;
    protected $dat_inicio;
    protected $dat_finalizado;
    private $_camposLst = array('cod_noticia' => array('nome' => 'txt_cod_noticia', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '11'),
        'nom_titulo' => array('nome' => 'txt_nom_titulo', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '225'),
        //'dsc_noticia' => array('nome'=>'txt_dsc_noticia','tipo'=>'longtext','sortable'=>'yes', 'tamanho'=> '60'),                
        //'dat_cadastro' => array('nome'=>'txt_dat_cadastro','tipo'=>'timestamp','sortable'=>'yes', 'tamanho'=> '60'),
        'dat_inicio' => array('nome' => 'txt_dat_inicio', 'tipo' => 'timestamp', 'sortable' => 'yes', 'tamanho' => '60'),
        'dat_finalizado' => array('nome' => 'txt_dat_finalizado', 'tipo' => 'timestamp', 'sortable' => 'yes', 'tamanho' => '60'),
        //'cod_usuario' => array('nome' => 'txt_nom_usuario', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '11'),
        'nom_usuario' => array('nome' => 'txt_nom_usuario', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '150'));

    // **********************
    // Construtor da classe
    // **********************

    function __construct() {
        parent::__construct(DBPADRAO);
	$this->filtroCancelamento(true,'(A.dat_termino IS NULL or A.dat_termino >= CURRENT_TIMESTAMP)');
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

    function getCodNoticia() {
        return $this->cod_noticia;
    }

    function getCodUsuario() {
        return $this->cod_usuario;
    }

    function getNomTitulo() {
        return $this->nom_titulo;
    }

    function getDscNoticia() {
        return $this->dsc_noticia;
    }

    function getDatCadastro() {
        return $this->dat_cadastro;
    }

    function getDatInicio() {
        return $this->dat_inicio;
    }

    function getDatFinalizado() {
        return $this->dat_finalizado;
    }

    // **********************
    // Métodos SET
    // **********************

    function setCodNoticia($val) {
        $this->cod_noticia = $val;
    }

    function setCodUsuario($val) {
        $this->cod_usuario = $val;
    }

    function setNomTitulo($val) {
        $this->nom_titulo = $val;
    }

    function setDscNoticia($val) {
        $this->dsc_noticia = $val;
    }

    function setDatCadastro($val) {
        $this->dat_cadastro = $val;
    }

    function setDatInicio($val) {
        $this->dat_inicio = $val;
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
    
    public function listarPorRef($cols = "*", $where = '', $limit = false, $group = '') {

            $join = array(

			'B' => array(

				TSISUSUARIO,

				'B.cod_usuario = A.cod_usuario',

				'B.nom_usuario'

			),
                        'C' => array(

				TTABNOTICIAIMAGEM,

				'C.cod_noticia = A.cod_noticia',

				'C.*'

			)

		);



		return $this->consulta( $cols, null, $join, $where);


        //return $this->consulta('A.*', null, array('B' => array(TSISUSUARIO, 'B.cod_usuario = A.cod_usuario', 'B.nom_usuario', "joinLeft")));
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
	
        if(!empty($data['dat_finalizado'])){
	    $datafinal = explode('/', $data['dat_finalizado']);		
	    $data['dat_finalizado'] = date("Y-m-d H:i:s",mktime(23,59,59,$datafinal[1],$datafinal[0],$datafinal[2]));
	}else
	    unset($data['dat_finalizado']);
	
        //echo "ANTES==";print_r($data);
        //$ret = $this->objToArray();  print_r($ret);       
        $this->populate($data);
        //echo "DEPOIS";print_r($data);
        $cod_noticia = parent::inserir(NULL, $forceUpdate);
                
        /**
         * Cadastro de imagem
         */
	
        $objNotImg = new TabNoticiaImagem();
        $data['cod_noticia'] = $cod_noticia;
        	
	$caminho = explode("/", trim($data['nom_caminho_img']));	   
	//print_r($caminho);
	if(empty($caminho[2])){
	    $data['nom_caminho_img'] = WWW_UPLOAD_SITE.'_noticias/'.$data['nom_caminho_img'];
	}else
	    $data['nom_caminho_img'] = $data['nom_caminho_img'];
			
	$cod_noticia_imagem = $objNotImg->inserir($data, true);
	
        return $cod_noticia;
    }

   
    // **********************
    // Cancelar abstrato
    // **********************
    public function excluir( $registro = null ) {	    
	    
	    $data['dat_termino'] = date("Y-m-d H:i:s");
	    
	    if( isset($registro['chave'] )) {		    	
		$where = "cod_noticia = '{$registro['chave']}'";;
    		parent::atualizar( $data, $where );			
	    }else{
		if(is_array($registro)){		    
		    foreach ($registro as $key => $value) {			
			$where = "cod_noticia = '{$value}'";;
			parent::atualizar( $data, $where );			
		    }
		}		
	    }
	}
}

// classe : fim
?>
