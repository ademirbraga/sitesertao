<?php
/*
	* @autor Gerador WebTupi
	*/

/*
	*
	* -------------------------------------------------------
	* Classe:           Cargo
	* Gerada em:        17.11.2011
	* Arquivo:          ../sitebhstouche/_inc/_php/_class/UploadCliente.class.php
	* Tabela:		    cadastro
	* Banco:		    bhstouche
	* -------------------------------------------------------	
	*
	*/

// **********************
// DECLARA��O DA CLASSE
// **********************


class UploadCliente extends DbUtils { // classe : inicio
	

	// **********************
	// Declara��o de Atributos
	// **********************
	

	private $_aplicativo = "uploadCliente.php";
	private $_aCamposPlanilha = array (0 => 'num_matricula', 1 => 'nom_cliente', 2 => 'num_cpf', 3 => 'cod_tipo_sexo', 4 => 'cod_cargo', 5 => 'nom_logradouro', 6 => 'num_numero', 
									   7 => 'nom_complemento', 8 => 'nom_bairro', 9 => 'nom_cidade', 10 => 'num_cep', 11 => 'sig_uf', 12 => 'num_telefone', 13 => 'num_telefone2', 14 => 'nom_email' );
	/**
	 * @access private
	 * @var _nomModulo
	 */
	
	private $_nomModulo = 'txt_nom_upload';
	private $_objCliente;
	private $_objCargo;
	private $_objSexo;
	private $_aSexo = array();
	private $_aCargo = array();
	
	public $uploads = "ON";
	
	/**
	 * @access protected
	 * @var _name
	 */
	protected $_name = TCADASTRO;
	private $_camposLst = array (); //array ('cod_cargo' => array ('nome' => 'txt_cod_cargo', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '11' ), 'nom_cargo' => array ('nome' => 'txt_nom_cargo', 'tipo' => 'varchar', 'sortable' => 'yes', 'tamanho' => '225' ), 'dat_cadastro' => array ('nome' => 'txt_dat_cadastro', 'tipo' => 'timestamp', 'sortable' => 'yes', 'tamanho' => '' ), 'cod_usuario' => array ('nome' => 'txt_cod_usuario', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '11' ), 'cod_equipe' => array ('nome' => 'txt_cod_equipe', 'tipo' => 'int', 'sortable' => 'yes', 'tamanho' => '11' ) );
	// **********************
	// Construtor da classe
	// **********************
	

	function __construct() {
		parent::__construct ( DBPADRAO );
		$this->_objCliente = new Cadastro;
		$this->_objCargo = new Cargo;
		$this->_objSexo = new Tiposexo(); 
	}
	
	// **********************
	// M�todos GET
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
	function getCamposPlanilha() {
		return $this->_aCamposPlanilha;
	}
	
	public function cadastrar($nomeArquivo = '',$get=array()) {
		$objUp = new Upload ( );
		list($get['cod_usuario'],$get['cod_equipe']) = explode('_',$get['ue']);
		
		if ($objUp->unzipFile ( PATH_UPLOAD . '/clientes', $nomeArquivo )) {
			$this->getCamposPlanilha ();
			$entry = $objUp->objZip->getNameIndex ( 0 );
			$lines = file ( PATH_UPLOAD . $nomeArquivo );
			$dados = $this->readFile($entry);
			unset($dados[0]);
			
			$this->_aCargo = $this->_objCargo->formatDados('cod_cargo','nom_cargo');
			$this->cadastrarCargos($dados,$get);
			
			$this->_aSexo = $this->_objSexo->formatDados('cod_tipo_sexo','nom_sexo');
			
			if(!empty($dados)){
				foreach($dados as $k=>$aV){
					if(!empty($aV[4])){//INDICE DO CARGO
						$this->cadastrarCliente($aV,$get);
					}
				}
			}
		}
	}
	
	private function cadastrarCliente($dados=array(),$get=array()){
		
		foreach($dados as $k=>$v){
			$dados[$k] = Helpers::removerAcentos($v);
		}
		
		$dados = array_combine($this->getCamposPlanilha(),$dados);
		$this->_aCargo = $this->_objCargo->formatDados('cod_cargo','nom_cargo');
		
		$dados['cod_cargo'] = array_search($dados['cod_cargo'], $this->_aCargo);
		
		$cliente = $this->_objCliente->listar('*',$where="num_cpf='{$dados['num_cpf']}'")->getRegistro();

		if(!empty($cliente['cod_cadastro'])){
			$dados['cod_cadastro'] = $cliente['cod_cadastro'];
			$dados['cod_cargo'] = $cliente['cod_cargo'];
			$dados['cod_cadastro_matricula'] = $cliente['cod_cadastro_matricula'];
			$dados['cod_cadastro_email'] = $cliente['cod_cadastro_email'];
			$dados['cod_cadastro_endereco'] = $cliente['cod_cadastro_endereco'];
			$dados['cod_cadastro_telefone'] = $cliente['cod_cadastro_telefone'];
		}else{
			$dados['cod_tipo_endereco'] = 1;
			$dados['cod_tipo_telefone'] = 1;
		}
		$dados['cod_usuario'] = $get['cod_usuario'];
		$dados['cod_equipe'] = $get['cod_equipe'];
		$dados['cod_tipo_sexo'] =  (strtolower(trim($dados['cod_tipo_sexo'][0])) == 'm') ? 1 : 2;
		
		
		return $this->_objCliente->inserir($this->limpaCampos($dados),$forceUpdate=true);
	}
	
	private function cadastrarCargos($dados=array(),$get=array()){
		foreach($dados as $k=>$v){
			if(!empty($v[4])){
				$aCargos[] = Helpers::removerAcentos($v[4]);//posicao da planilha que contem os cargos
			}
		}
		$aCargos = array_unique($aCargos);
		$aCargos = array_diff ($aCargos,$this->_aCargo);
		
		foreach($aCargos as $k=>$v){
			$vv['cod_usuario'] = $get['cod_usuario'];
			$vv['cod_equipe'] = $get['cod_equipe'];
			$vv['nom_cargo'] = $v;
			$this->_objCargo->inserir($vv,true);
		}
	}
	
	
	function readFile($file='') {
		$row = 1;
		$handle = fopen ( PATH_UPLOAD . '/clientes/'.$file, "r" );
		while ( ($data[] = fgetcsv ( $handle, 1000, ";" )) !== FALSE ) {
			$num = count ( $data );
			$row ++;
		}
		fclose ( $handle );
		return $data;
	}
	
	/**
	 * Configura��o para listagem 
	 */
	function configMod() {
	}

} // classe : fim


?>
