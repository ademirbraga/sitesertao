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

class SisUsuarioConfigs extends DbUtils { // classe : inicio
    // **********************
    // Declaração de Atributos
    // **********************
    /**
     * @access private
     * @var _aplicativo
     */

    private $_aplicativo = "appSisUsuarioConfigs.php";
    /**
     * @access private
     * @var _nomModulo
     */
    private $_nomModulo = "SisUsuarioConfigs";
    /**
     * @access protected
     * @var _name
     */
    protected $_name = TSISUSUARIOCONFIGS;
    /**
     * @access protected
     * @var cod_sis_usuario_configs
     */
    protected $cod_sis_usuario_configs;
    /**
     * @access protected
     * @var num_registro_pagina
     */
    protected $num_registro_pagina;
    /**
     * @access protected
     * @var num_casas_decimais
     */
    protected $num_casas_decimais;
    /**
     * @access protected
     * @var nom_moeda
     */
    protected $nom_moeda;
    /**
     * @access protected
     * @var bol_formata_tempo
     */
    protected $bol_formata_tempo;
    /**
     * @access protected
     * @var bol_minutos
     */
    protected $bol_minutos;
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
    private $_camposLst = array('cod_sis_usuario_configs' => array('nome' => 'txt_cod_sis_usuario_configs', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '30'), 'num_registro_pagina' => array('nome' => 'txt_num_registro_pagina', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '30'), 'num_casas_decimais' => array('nome' => 'txt_num_casas_decimais', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '30'), 'nom_moeda' => array('nome' => 'txt_nom_moeda', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '150'), 'bol_formata_tempo' => array('nome' => 'txt_bol_formata_tempo', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '100'), 'bol_minutos' => array('nome' => 'txt_bol_minutos', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '100'), 'cod_usuario' => array('nome' => 'txt_cod_usuario', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '30'), 'cod_equipe' => array('nome' => 'txt_cod_equipe', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '30'));

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

    function getCodSisUsuarioConfigs() {
        return $this->cod_sis_usuario_configs;
    }

    function getNumRegistroPagina() {
        return $this->num_registro_pagina;
    }

    function getNumCasasDecimais() {
        return $this->num_casas_decimais;
    }

    function getNomMoeda() {
        return $this->nom_moeda;
    }

    function getBolFormataTempo() {
        return $this->bol_formata_tempo;
    }

    function getBolMinutos() {
        return $this->bol_minutos;
    }

    function getCodUsuario() {
        return $this->cod_usuario;
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

    function setCodSisUsuarioConfigs($val) {
        $this->cod_sis_usuario_configs = $val;
    }

    function setNumRegistroPagina($val) {
        $this->num_registro_pagina = $val;
    }

    function setNumCasasDecimais($val) {
        $this->num_casas_decimais = $val;
    }

    function setNomMoeda($val) {
        $this->nom_moeda = $val;
    }

    function setBolFormataTempo($val) {
        $this->bol_formata_tempo = $val;
    }

    function setBolMinutos($val) {
        $this->bol_minutos = $val;
    }

    function setCodUsuario($val) {
        $this->cod_usuario = $val;
    }

    function setCodEquipe($val) {
        $this->cod_equipe = $val;
    }
    
    function inserir($data=array(),$forceUpdate=true){
        
        $data['bol_minutos'] = isset($data['bol_minutos']) ? 1 : 0;
        $data['bol_formata_tempo'] = isset($data['bol_formata_tempo']) ? 1 : 0;
        $data['cod_usuario'] = (is_array($data['cod_usuario'])) ? $data['cod_usuario']['cod_usuario'] : $data['cod_usuario'];
        
        
        if(empty($data['cod_sis_usuario_configs'])){
            unset($data['cod_sis_usuario_configs']);
        }
        $codConfig = parent::inserir($data, $forceUpdate);
        
        return $codConfig;
    }

}

// classe : fim
?>
