<?php

define("WWW_ROOT", "../");

require_once (WWW_ROOT . "_inc/_php/config.inc.php");

//print_r($_POST);print_r($_FILES);

$upload = new Upload ( );
$pasta = '';
$extension = false;
$arq = '';
$modulo = $_GET['modulo'];


if($modulo == 35) $pasta = '_noticias'; 	    
if($modulo == 3) $pasta = '_cbhpm'; 	    
if($modulo == 6) $pasta = '_cid';
if($modulo == 1) $pasta = '_agendacompromisso';	    
if($modulo == 30) $pasta = '_hilum'; 	    
if($modulo == 34) $pasta = '_manualcooperado'; 	    
if($modulo == 48)  $pasta = '_tuss'; 	    
if($modulo == 49) $pasta = '_banner'; 	    
if($modulo == 64) $pasta = '_tnumm'; 	    
if($modulo == 65) $pasta = '_indicacaoartigo'; 	    	    
if($modulo == 20) $pasta = '_galeriadefotos'; 	
if($modulo == 31) $pasta = '_jornal'; 
if($modulo == 45) $pasta = '_tiss'; 

if (!empty($_FILES)) {

    if(is_array($_FILES['images'])){

	foreach($_FILES['images']['name'] as $k => $val){
	    //echo "session=";print_r($_SESSION['uploads']);echo "--".$k."<br>";
	    
		$upload->arquivo = $val;  

		if ($modulo == 49 || $modulo == 35 || $modulo == 20 || $modulo == 31){

		    if ($upload->getExtension('jpg') || $upload->getExtension('png') || $upload->getExtension('jpeg')) {
			//echo $modulo."=> ok extension";
			$extension = true;				
		    }
		}elseif ($modulo == 3 || $modulo == 6 || $modulo == 48  || $modulo == 30  || $modulo == 34 || $modulo == 64 || $modulo == 65 || $modulo == 1 || $modulo == 45 ) {

		    if ($upload->getExtension('doc') || $upload->getExtension('pdf') || $upload->getExtension('docx') || $upload->getExtension('jpg')  || $upload->getExtension('jpeg') || $upload->getExtension('png') || $upload->getExtension('gif') || $upload->getExtension('xls') || $upload->getExtension('xlsx')) {		
			//echo $modulo."=> ok extension2";
			$extension = true;
		    }     
		}


		if ($extension) {

		    //echo "<br>ENVIANDO:";print_r($_FILES['images']['tmp_name'][$k]); echo "==";print_r(PATH_UPLOAD_TABELA.$pasta.'/');
		    if($modulo == 3 || $modulo == 6 || $modulo == 48  || $modulo == 30  || $modulo == 34 || $modulo == 64 || $modulo == 65 || $modulo == 1 || $modulo == 49 || $modulo == 20 || $modulo == 31 || $modulo == 45){
			$nomeArquivo = $upload->doUpload($_FILES['images']['tmp_name'][$k], PATH_UPLOAD_TABELA.$pasta.'/');
		    }else
			$nomeArquivo = $upload->doUpload($_FILES['images']['tmp_name'][$k], PATH_UPLOAD_SITE.$pasta.'/');


		    //$_SESSION['uploads'][$k] = $nomeArquivo;
		    $campo[] = $nomeArquivo;
		    
		}else{
		    //Erro extension
		    echo 'Error';
		    exit();
		}	    

	}//Fecha o foreach	 
	if($nomeArquivo){
	    if ($modulo == 20 || $modulo == 31)
		echo json_encode($campo);	    
	    else
		echo $nomeArquivo;
	    exit();
	}else{
	    echo 'Error';		    
	    exit();
	}
    }//fecha os is_array        
}//fecha o empty
