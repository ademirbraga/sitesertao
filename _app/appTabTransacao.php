<?php
	/*
	** @autor Claudia Matos <claudiarfm@yahoo.com.br> - Claudia Matos - claudiarfm@yahoo.com.br
	* -------------------------------------------------------
	* Aplicativo:       appTabTransacao.php
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_app/appTabTransacao.php
	* Tabela:           tab_transacao
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/

	// Diretorio raiz
	if(!defined('WWW_ROOT'))
		define("WWW_ROOT","../");
				
	// Arquivo de constantes, configuracao e inicializacao
	include(WWW_ROOT."/_inc/_php/geral.inc.php");
	
	$objPrincipal = new TabTransacao();
        $NomeModulo = $objPrincipal->getnomModulo();	

	if(!empty($id)){
	
		$objPrincipal->listar(NULL,$where = "cod_transacao = $id");
		$dados = $objPrincipal->getRegistro();	
		
		$smarty->assign('dados', $dados);
	}	

	$objSisEquipe = new SisEquipe();
	$lstcod_equipe = $objSisEquipe->listar("",false);
	$lstcod_equipe = $objSisEquipe->formatDados("cod_equipe","nom_equipe");
	$smarty->assign("lstcod_equipe",$lstcod_equipe);
	unset($objSisEquipe);

	$smarty->assign('modulo', MODULO_TABTRANSACAO);
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
	
	$tplConteudo = $smarty->fetch('tplTabTransacao.htm');
	
?>