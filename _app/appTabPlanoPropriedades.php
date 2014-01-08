<?php
	/*
	** @autor Claudia Matos <claudiarfm@yahoo.com.br> - Claudia Matos - claudiarfm@yahoo.com.br
	* -------------------------------------------------------
	* Aplicativo:       appTabPlanoPropriedades.php
	* Gerada em:        08.10.2013
	* Arquivo:          ../projSertao/_app/appTabPlanoPropriedades.php
	* Tabela:           tab_plano_propriedades
	* Banco:	    bd_mysql_sertao
	* -------------------------------------------------------	
	*
	*/

	// Diretorio raiz
	if(!defined('WWW_ROOT'))
		define("WWW_ROOT","../");
				
	// Arquivo de constantes, configuracao e inicializacao
	include(WWW_ROOT."/_inc/_php/geral.inc.php");
	
	$objPrincipal = new TabPlanoPropriedades();
        $NomeModulo = $objPrincipal->getnomModulo();	

	if(!empty($id)){
	
		$objPrincipal->listar(NULL,$where = "cod_plano_propriedade = $id");
		$dados = $objPrincipal->getRegistro();	
		
		$smarty->assign('dados', $dados);
	}	

	$objSisEquipe = new SisEquipe();
	$lstcod_equipe = $objSisEquipe->listar("",false);
	$lstcod_equipe = $objSisEquipe->formatDados("cod_equipe","nom_equipe");
	$smarty->assign("lstcod_equipe",$lstcod_equipe);
	unset($objSisEquipe);

	$objTabPlanoContas = new TabPlanoContas();
	$lstcod_plano_contas = $objTabPlanoContas->listar("",false);
	$lstcod_plano_contas = $objTabPlanoContas->formatDados("cod_plano_contas","nom_plano_contas");
	$smarty->assign("lstcod_plano_contas",$lstcod_plano_contas);
	unset($objTabPlanoContas);

	$objTabTipoServico = new TabTipoServico();
	$lstcod_tipo_servico = $objTabTipoServico->listar("",false);
	$lstcod_tipo_servico = $objTabTipoServico->formatDados("cod_tipo_servico","nom_tipo_servico");
	$smarty->assign("lstcod_tipo_servico",$lstcod_tipo_servico);
	unset($objTabTipoServico);

	$smarty->assign('modulo', MODULO_TABPLANOPROPRIEDADES);
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
	
	$tplConteudo = $smarty->fetch('tplTabPlanoPropriedades.htm');
	
?>