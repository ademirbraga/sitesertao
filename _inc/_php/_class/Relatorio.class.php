<?php

/** 
 * @author root
 * 
 * 
 */
class Relatorio {

	/**
	 * @var unknown_typee
	 */
	private $_modulo;

	/**
	 * @var unknown_type
	 */
	private $_metodo;

	/**
	 * @var unknown_type
	 */
	private $_loaded = true;
	
	/**  
	 * @var array
	 */
	public $formulario = array();
	
	/**
	 * Amarnazena o objeto do m�dulo
	 * @param string $val
	 */
	private function setModulo($val){
		$this->_modulo = (int)$val;
	}
	/**
	 * Armazena o nome do m�todo
	 * @param string $val
	 */
	private function setMetodo($val){
		$this->_metodo = (int)$val;
	}
	
	public function __construct( $modulo = null, $metodo = 'getRelatorioDefault' ) {

		if( $modulo && $metodo ) {
			
			if( $this->registraModulo( $modulo ) ){
				
				if( $this->registraMetodo( $metodo ) ){

					$this->formulario = $this->getFormulario();
					
				}
			}						
		}
	}
	/**
	 * Verifica se o m�dulo existe e cria uma instancia dele
	 * @param int $modulo
	 */
	public function registraModulo( $modulo ) {

		$objModulo = new Modulo; 

		$modulo = $objModulo->getObj( $modulo );

		if( !$modulo instanceOf DbUtils )
			throw new Exception( 'M�dulo inv�lido' );
							
		$this->_modulo = $modulo;
		
		return true;

	}
	/**
	 * Verifica se o m�todo existe e salva o nome dele
	 * @param string $metodo
	 */
	public function registraMetodo( $metodo ) {
		
		$metodo = base64_decode($metodo);
		
		if( !method_exists( $this->_modulo, $metodo ) ) {
			throw new Exception( 'M�todo inv�lido' );
		}

		$this->_metodo = $metodo;
		
		return true;

	}

	/**
	 * Verifica se o formul�rio pode ser carregado
	 * @return boolean
	 */
	public function isLoad() {
		return $this->_loaded;
	}	
	
	/**
	 * Busca os dados e configura��es do relat�rio
	 * @param int $modulo
	 * @param string $metodo
	 * @param array $args
	 * @return array $grid
	 */
	public function getRelatorio( $modulo, $metodo, $args ) {
		
		global $lng;
		
		if(!( isset($modulo) or isset($metodo) or isset($args) ) ){
			throw new Exception( 'Falta par�metros necess�rios para a constru��o do relat�rio' );
		}	

		$this->tratarArgs($args);	

		$grid = array();
	
		if( $this->registraModulo( $modulo ) ){
			
			if( $this->registraMetodo( $metodo ) ){
								
				$args['page'] = isset($args['page']) && !empty($args['page']) ? $args['page'] : 1;
				$args['rows'] = isset($args['rows']) && !empty($args['rows']) ? $args['rows'] : null;
				
				$dados = $this->_modulo->{$this->_metodo}($args);

				$grid['colNames'] = array_keys($dados['colunas']);
				foreach($grid['colNames'] as &$name){
					$name = $lng[$name];
				}
                $grid['colModel'] = array_values($dados['colunas']);

                // Converte os labels do rodap�
                if(isset($dados['rodape'])){
                    $rodape = $dados['rodape'];
                    $labels_rodape = $rodape['labels'];
                    foreach($labels_rodape as $k=>&$v){
                        $v = $lng[$v];
                    }
                    unset($rodape['labels']);
                    $rodape = array_merge($rodape,$labels_rodape);
                }                

                $nroLinhasPorPagina = count( $dados['registros'] );

				// n�mero total de registros, encontrado com o getFoundRows();
				$grid['data']['records'] = $dados['nro_total_registros'];		
				// p�gina atual
				$grid['data']['page'] = $args['page'];

				// n�mero total de p�ginas
				if( $nroLinhasPorPagina > 0 )
					$grid['data']['total'] = ceil($dados['nro_total_registros']/$nroLinhasPorPagina);
				else
					$grid['data']['total'] = 0;

				// registros direto do banco de dados
				$grid['data']['rows'] = $dados['registros'];
				// n�mero de registrod por p�gina
				$grid['data']['rowNum'] = $nroLinhasPorPagina;
				
				if( isset($rodape) && !empty($rodape) )// dados para o rodap� do grid
					$grid['data']['userdata'] = $rodape;

				return $grid;
			}
		}		
		
		return false;
	}
	/**
	 * Executa a fun��o que busca os dados do relat�rio, mas retorna somente os campos do formul�rio e n�o executa o sql
	 * @param int $modulo
	 * @param string $metodo
	 */
	public function getFormulario(){
								
		$relatorio = $this->_modulo->{$this->_metodo}(null, false);
		
		if( $relatorio ) {
			
			$this->_loaded = true;
			
			return $this->_modulo->getRelatorioForm();
			
		} else {
			
			return false;
		
		}		
	}

	public function getnomRelatorio() {
		return $this->_modulo->getnomRelatorio();
	}
	
	public function tratarArgs( &$args ) {
		$args = utf8_decode(rawurldecode($args));		
		parse_str($args, $args);
		unset($args['args'], $args['method'], $args['modulo'], $args['_search']); // retira parametro para exporta��o
	}
	
        /**
         * @name getArquivosJS
         * @desc: Metodo para buscar o(s) arquivo(s) javascript quando o metodo setRelatorioJS � utilizado
         * na classe 
         * @return array 
         */
        public function getArquivosJS(){
            return (is_object($this->_modulo)) ? $this->_modulo->getRelatorioJS() : null;
        }
}

?>