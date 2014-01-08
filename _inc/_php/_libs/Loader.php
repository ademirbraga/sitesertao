<?php

/**
 * 
 * @package Loader Class
 * @author Thiago França <thiagotrue@gmail.com>
 * @version 1.0.0.0
 * @name Loader
 *
 */

class Loader {

	private static $classLoaded = array();
	public static $diretorios = array();

	public static function includeDir( $directoryList ) {

		if( empty( $directoryList ) || is_null( $directoryList ) )
			return;

		if( is_array( $directoryList ) ) {

			foreach( $directoryList as $dir ) {

				if( is_array( $dir ) ) return self::includeDir( $dir );

				array_push( self::$diretorios, $dir );

			}

		}
		else {
			array_push( self::$diretorios, $directoryList );
		}

		return;

	}

	public static function loadClass( $className ) {

		if(is_null($className) || empty($className))
			throw new Exception('File is null or empty');

		if( !is_null( self::$diretorios ) && !empty( self::$diretorios ) ) {

			if( is_array( self::$diretorios ) && !empty( self::$diretorios ) )
				$arrDirs = self::$diretorios;
			else
				throw new Exception( "Nenhum diretório informado!" );

			foreach( $arrDirs as $dir ) {

				$diretorio = new DirectoryIterator( $dir );

				foreach( $diretorio as $file ) {

					if( $file->isFile() && preg_match("/{$className}/", $file->getFileName() ) ) {

						$class = $diretorio->getPath() . DIRECTORY_SEPARATOR . $file->getFileName();

						return require_once $class;

					}

				}

			}

		}

	}

}

?>