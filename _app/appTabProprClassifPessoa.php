<?php
	/*
	** @autor Claudia Matos <claudiarfm@yahoo.com.br> - Claudia Matos - claudiarfm@yahoo.com.br
	* -------------------------------------------------------
	* Aplicativo:       appTabProprClassifPessoa.php
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_app/appTabProprClassifPessoa.php
	* Tabela:           tab_propr_classif_pessoa
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/

	// Diretorio raiz
	if(!defined('WWW_ROOT'))
		define("WWW_ROOT","../");
				
	// Arquivo de constantes, configuracao e inicializacao
	include(WWW_ROOT."/_inc/_php/geral.inc.php");
	
	$objPrincipal = new TabProprClassifPessoa();
        $NomeModulo = $objPrincipal->getnomModulo();	

	if(!empty($id)){
	
		$objPrincipal->listar(NULL,$where = "cod_propr_classif_pessoa = $id");
		$dados = $objPrincipal->getRegistro();	
		
		$smarty->assign('dados', $dados);
	}	

	$objTabClassifPessoa = new TabClassifPessoa();
	$lstcod_classif_pessoa = $objTabClassifPessoa->listar("",false);
	$lstcod_classif_pessoa = $objTabClassifPessoa->formatDados("cod_classif_pessoa","nom_classif_cliente");
	$smarty->assign("lstcod_classif_pessoa",$lstcod_classif_pessoa);
	unset($objTabClassifPessoa);

	$smarty->assign('modulo', MODULO_TABPROPRCLASSIFPESSOA);
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
	
	$tplConteudo = $smarty->fetch('tplTabProprClassifPessoa.htm');
	
?>