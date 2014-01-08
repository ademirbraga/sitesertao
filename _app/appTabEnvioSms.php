<?php
	/*
	** @autor Claudia Matos <claudiarfm@yahoo.com.br> - Claudia Matos - claudiarfm@yahoo.com.br
	* -------------------------------------------------------
	* Aplicativo:       appTabEnvioSms.php
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_app/appTabEnvioSms.php
	* Tabela:           tab_envio_sms
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/

	// Diretorio raiz
	if(!defined('WWW_ROOT'))
		define("WWW_ROOT","../");
				
	// Arquivo de constantes, configuracao e inicializacao
	include(WWW_ROOT."/_inc/_php/geral.inc.php");
	
	$objPrincipal = new TabEnvioSms();
        $NomeModulo = $objPrincipal->getnomModulo();	

	if(!empty($id)){
	
		$objPrincipal->listar(NULL,$where = "cod_sms = $id");
		$dados = $objPrincipal->getRegistro();	
		
		$smarty->assign('dados', $dados);
	}	

	$objTabPessoa = new TabPessoa();
	$lstcod_pessoa = $objTabPessoa->listar("",false);
	$lstcod_pessoa = $objTabPessoa->formatDados("cod_pessoa","nom_pessoa");
	$smarty->assign("lstcod_pessoa",$lstcod_pessoa);
	unset($objTabPessoa);

	$objTabSms = new TabSms();
	$lstcod_sms = $objTabSms->listar("",false);
	$lstcod_sms = $objTabSms->formatDados("cod_sms","nom_sms");
	$smarty->assign("lstcod_sms",$lstcod_sms);
	unset($objTabSms);

	$smarty->assign('modulo', MODULO_TABENVIOSMS);
	$smarty->assign('acao', $acao);	
	
	if(@empty($index_form)) $index_form = 0;
	$smarty->assign('index_form',$index_form);
	$smarty->assign('display_form',$display_form);
	$smarty->assign('display_form_edit',$display_form_edit);
	$smarty->assign('display_info',$display_info);
	$smarty->assign('display_info_edit',$display_info_edit);
	$smarty->assign('display_cadastro',$display_cadastro);
	$smarty->assign('display_atualiza',$display_atualiza);	
	$smarty->assign('xxajax', $xxajax);
        $smarty->assign('NomeModulo', $lng[$NomeModulo]);
	
	$tplConteudo = $smarty->fetch('tplTabEnvioSms.htm');
	
?>