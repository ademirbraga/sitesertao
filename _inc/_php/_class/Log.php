<?php
/**
 * 
 * @author WebTupi
 * @version 1.0.0
 * 
 */
class LOG 
{
	const TYPE_DEBUG = 1;
	const TYPE_ERROR = 2;
	const TYPE_SQL = 4;
	const TYPE_ALL = '*' ;
	
	private static $_logDirs = array(
		self::TYPE_DEBUG => '/_debug/'
		, self::TYPE_ERROR => '/_error/'
		, self::TYPE_SQL => '/_sql/'
	);
	
	private static $_enableType;
	
	/**
	 * Adicionar aqui todos os tipos para validação quando habilitar geral
	 */
	public static function getTypeAll() {
		return self::TYPE_DEBUG | self::TYPE_ERROR | self::TYPE_SQL;
	}
	
	/**
	 * Cria o arquivo caso não exista e adiciona a linha de log com data e hora
	 * Para escrever o log em mais de um ou todos os diretórios, é necessário deixar explícito. 
	 * Ex.: LOG::TYPE_ERROR | LOG::TYPE_SQL | LOG::TYPE_DEBUG
	 * @param string $txt
	 * @param const $type
	 * @param string $new_file
	 * @uses LOG::set( "Erro de script.", LOG::ERROR, "teste_relatorio" ) 
	 * @uses LOG::set( "Erro de script.", LOG::ERROR )
	 * @uses LOG::set( "SELECT * FROM tabela", LOG::SQL )
	 * 
	 */
	public static function set( $txt = 'No message', $type = self::TYPE_ERROR, $new_file = null ) {
		
		if( !self::isEnable( $type ) ) {
			return false;
		}		
		
		if( !defined('PATH_LOG_DIR') ) {
			echo "Atenção: o diretório de armazenamento de logs não está definido.";
			return false;
		}
		
		foreach( self::$_logDirs as $dir_type => $dir_log ) {
					
			if( $dir_type & $type ) {
				self::writeLog( $dir_log, $txt, $new_file);
			}
		}	
		
	}
	private static function writeLog( $dir_log, $txt, $new_file = null ) { 
		
		$dir_log = PATH_LOG_DIR.$dir_log;
				
		$filename = 'default';
		
		if( isset($new_file) && !empty($new_file) ) {
			$filename = $new_file;
		}
		
		$usuario = 'script';
		$equipe = 'desenvolvimento';
		
		if( isset($_SESSION['usr']['cod_usuario']) ) {
			$usuario = 	$_SESSION['usr']['cod_usuario'];
		}
		
		if( isset($_SESSION['usr']['cod_equipe']) ) {
			$equipe = $_SESSION['usr']['cod_equipe'];
		}
		
		$ip = 'Unknown';
		if( isset($_SERVER['REMOTE_ADDR']) ) {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
				
		try {
			
			$fp = fopen( $dir_log."{$filename}.txt", "a");
			fwrite($fp, date("d/m/Y H:i:s")." - {$usuario}@{$equipe} IP:{$ip} \n   ".$txt."\n");
			fclose($fp);
			
		} catch( Exception $e ) {
			echo $e->getMessage();
		}
	}
	/*
	 * Desabilita o log por tipo ou geral
	 * @param string $type 
	 */
	public static function disable( $type = '*' ) {
		self::$_enableType = ( $type == '*' ) ? 0 : self::$_enableType ^ $type;
	}
	/**
	 * Habilita o log para um ou todos os tipos
	 * @param string $type 
	 */
	public static function enable( $type = '*' ) {
		self::$_enableType = ( $type == '*' ) ? self::getTypeAll() : self::$_enableType | $type;
	}
	/**
	 * Verifica se o log está ativo para determinado tipo
	 * @param string $type
	 * @return boolean
	 */
	public static function isEnable( $types = '*' ) {
		
		$types = ( $types == '*' ) ? self::getTypeAll() : $types;
		
		if( $types & self::$_enableType ) {
			return true;
		}
		return false;
	}
	
}