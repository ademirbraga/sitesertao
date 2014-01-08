<?php
	/*
	** @autor Claudia Matos <claudiarfm@yahoo.com.br> - Claudia Matos - claudia.matos@webtupi.com.br
	*/
	
	/*
	*
	* -------------------------------------------------------
	* Classe:           SisPerfil
	* Gerada em:        08.08.2013
	* Arquivo:          ../sertao/_inc/_php/_class/SisPerfil.class.php
	* Tabela:           sis_perfil
	** Banco:	    bdsertao
	* -------------------------------------------------------	
	*
	*/

	class SisPerfil extends DbUtils{	

	// **********************
	// Declaracao de Atributos
	// **********************

	/**
	* @access private
	* @var _aplicativo
	*/
	private $_aplicativo = "appSisPerfil.php";

	/**
	* @access private
	* @var _nomModulo
	*/
	private $_nomModulo = "txt_nom_perfil";

	/**
	* @access protected
	* @var _name
	*/
	protected $_name = TSISPERFIL;

	/**
	* @access protected
	* @var cod_perfil
	*/
	protected $cod_perfil; 

	/**
	* @access protected
	* @var nom_perfil
	*/
	protected $nom_perfil; 

	private $_camposLst = array ('cod_perfil'=> array('nome'=>'txt_cod_identificador','tipo'=>'int','sortable'=>'yes','tamanho'=>'30'),'nom_perfil'=> array('nome'=>'txt_nom_perfil','tipo'=>'varchar','sortable'=>'yes','tamanho'=>'150'));
	
	// **********************
	// Construtor da classe
	// **********************
	function __construct(){
	    parent::__construct(DBPADRAO);
	    //$this->filtroRevenda(true,'');
	    //$this->filtroCancelamento(true,'');
	}

	// **********************
	// Métodos GET
	// **********************
	function getcamposLst(){
		return $this->_camposLst;
	}

	function getaplicativo(){
		return $this->_aplicativo;
	}

	function getnomModulo(){
		return $this->_nomModulo;
	}

	function getCodPerfil() {
		return $this->cod_perfil; 
	}

	function getNomPerfil() {
		return $this->nom_perfil; 
	}

	/**
	 * Configuração para listagem 
	*/
	function configMod(){

	}

	// **********************
	// Métodos SET
	// **********************
	function setCodPerfil($val) { 
		$this->cod_perfil =  $val; 
	}

	function setNomPerfil($val) { 
		$this->nom_perfil =  $val; 
	}

	/**
	 * Sobrescrita de metodo para efetuar a validacao da insercao
	 * @param  $data
	 * @param bool $forceUpdate
	 * @return bool
	 */
	public function inserir($data, $forceUpdate = false) {

		if (empty ( $data ))
			return 0;		
		
		$codPerfil = parent::inserir($data,$forceUpdate);

		if(isset($data['cod_permissao']) && !empty($data['cod_permissao'])){

			$objSisPerfilPermissoes = new SisPerfilPermissoes();
			$objSisPerfilPermissoes->excluir($codPerfil);

			foreach ($data['cod_permissao'] as $chPerm => $valPerm){

				//echo "<br>".$chPerm;
				//print_r($valPerm);
			    
				$NumNivel = 0;
				foreach($valPerm as $chAcao => $valAcao){
					$NumNivel += $valAcao;
				}
				//echo $chPerm." - ".$NumNivel . PHP_EOL;

				$objSisPerfilPermissoes->inserir(array('cod_perfil'=>$codPerfil,'num_nivel_permissao'=>$NumNivel,'cod_permissao'=>$chPerm),false);
			}
		}
		return $codPerfil;
	}
} // classe : fim
?>