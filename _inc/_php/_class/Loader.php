<?php

/**
 * 
 * @package Loader Class
 * @version 1.0.0.0
 * @name Loader
 *
 */

class Loader {

	private static $classLoaded = array();
	public static $diretorios = array();
        public static $_helpers = array();

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
				throw new Exception( "Nenhum diret�rio informado!" );

			foreach( $arrDirs as $dir ) {

				$diretorio = new DirectoryIterator( $dir );

				foreach( $diretorio as $file ) {

					 if( $file->isFile() && preg_match("/^{$className}\./",$file->getFileName() ) ) {

						$class = $diretorio->getPath() . DIRECTORY_SEPARATOR . $file->getFileName();

						return require_once $class;

					}

				}

			}

		}

	}

        public static function helper( $helpers = array() ) {
            
            foreach (self::prepFilename( $helpers, '_helper' ) as $helper ) {
                if ( isset( self::$_helpers[$helper] ) ) {
                    continue;
                }
                foreach( self::$diretorios as $k=>$dir )
                    if( stristr( $dir , 'helpers' ) )
                        $path_helpers = $dir;
                   
                $ext_helper =  $path_helpers . DIRECTORY_SEPARATOR .  $helper . '.php';

                // Is this a helper extension request?
                if ( file_exists( $ext_helper ) ) {

                    if ( !file_exists( $ext_helper ) ) {
                        throw new Exception( 'Unable to load the requested file: helpers'.DIRECTORY_SEPARATOR . $helper . '.php' );
                    }

                    include_once( $ext_helper );

                    self::$_helpers[$helper] = TRUE;
                    continue;
                }
                // unable to load the helper
                if ( !isset( self::$_helpers[$helper] ) ) {
                    throw new Exception( 'Unable to load the requested file: helpers'.DIRECTORY_SEPARATOR . $helper . '.php' );
                }
        }
    }

    /**
     * @name prepFilename
     *
     * @access	public
     * @param	mixed
     * @return	array
     * @desc Esta funcao prepara o arquivo para ser carregado
     */
    public static function prepFilename( $filename, $extension ) {
        
        if ( !is_array( $filename ) ) {
            return array( strtolower( str_replace( '.php', '', str_replace( $extension, '', $filename ) ) . $extension ) );
        } else {
            foreach ( $filename as $key => $val ) {
                $filename[$key] = strtolower( str_replace( '.php', '', str_replace( $extension, '', $val ) ) . $extension );
            }
            return $filename;
        }
    }

}

?>