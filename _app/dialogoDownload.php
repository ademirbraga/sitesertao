<?php
/**
 * Utilizado para gerenciar download e play das gravações feitas no call center.
 * Ele devolve o arquivo correspondente buscado pela url e converte caso exista o .wav e não exista o .mp3
 *
 
 * @category Aplicativo
 * @name _aplicativos/dialogoDownload.php
 * @author WebTupi
 * @copyright [Informações de Direitos de Cópia]
 * @license [link da licença] [Nome da licença]
 * @link [link de onde pode ser encontrado esse arquivo]
 * @version 1.0.0
 * @since 30/06/2011 10:01:00
 */

include '../_inc/_php/geral.inc.php';

if( isset($_GET['arquivo']) && !empty($_GET['arquivo']) ) {
	
	$acao = 'download';
	
	if( isset($_GET['acao']) && !empty($_GET['acao']) ) {
		$acao = (string)$_GET['acao'];
	}
	
	$url = WWW_ROOT."_gravacoes/".(string)$_GET['arquivo']; // pega o endereço do arquivo
	                       // ou o nome dele se o arquivo 
	                       // estiver na mesma pagina!! 	
	
	$full_path = explode('/', $_GET['arquivo']);
	
	list($filename, $extension) = explode('.', array_pop($full_path));
	
	$path = implode('/', $full_path).'/';
	
	$file_in = PATH_GRAVACOES.$path.$filename."-in.wav";
	$file_out = PATH_GRAVACOES.$path.$filename."-out.wav";
	$file_or = PATH_GRAVACOES.$path.$filename.".wav";
		
	if( !file_exists($url) && file_exists($file_in) ) {
		
		$cmd_merge = PATH_DIR_SOX."/sox -m ".$file_in." ".$file_out." ".$file_or;
		exec($cmd_merge, $arrErro, $rExec);
				
		if( $rExec == 0 ) {
			
			$cmd_convert = PATH_DIR_LAME."/lame --resample 44.1 -b 32 -a ".$file_or." `echo \"".$file_or."\" | sed 's/.wav/.mp3/'`";
			exec($cmd_convert, $arrErro, $rExec);
			
			if( $rExec == 0 && file_exists($url) ) {
				exec ("rm -rf ".$file_in);
				exec ("rm -rf ".$file_out);
				exec ("rm -rf ".$file_or);
			} else {
				LOG::set('Erro na conversão de arquivos .wav para .mp3.');
			}
		} else {
			LOG::set('Erro no merge de arquivos de áudio.');
		}
	}
	                       
	if( file_exists($url) ) {	
		
		if( $acao != 'play'){
			// Set headers			
			header("Content-Type: application/save"); 
			header("Content-Length:".filesize($url)); 
			header('Content-Disposition: attachment; filename="' . $filename.'.'.$extension . '"'); 
			header("Content-Transfer-Encoding: binary");
			header('Expires: 0'); 
			header('Pragma: no-cache');
		}
		
		readfile($url);
	
	} else {
		echo 'Arquivo não existe.';
		LOG::set('Diálogo solicitado não existe. ' . $url);
	}
	
} else {
	echo 'Falta parâmetros para o download.';
}

die;