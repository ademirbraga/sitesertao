<?php

	/**

* Aplicativo do sistema para trabalhar com a tabela sis_equipe.

*



* @category Aplicativo

* @name _aplicativos/appSisEquipe.php

* @author WebTupi

* @copyright [Informa��es de Direitos de C�pia]

* @license [link da licen�a] [Nome da licen�a]

* @link [link de onde pode ser encontrado esse arquivo]

* @version 1.0.0

* @since 13/05/2011 19:06:54

*/



	// Diretorio raiz

	if(!defined('WWW_ROOT'))

		define("WWW_ROOT","../");

				

	// Arquivo de constantes, configuracao e inicializacao

	include(WWW_ROOT."_inc/_php/geral.inc.php");

	

	$objPrincipal = new SisEquipe();
	$NomeModulo = $objPrincipal->getnomModulo();
	

	if(!empty($id)){

	

		$objPrincipal = $objPrincipal->listar(null,$where = "cod_equipe = $id");

		$dados = $objPrincipal->getRegistro();	

		

	// breadcrumb		

	$extras[ 'breadcrumbs' ][ $dados['nom_equipe'] ] = "";

		

	}

	$smarty->assign('dados', $dados);



	$lstcod_equipe = $objPrincipal->formatDados("cod_equipe","nom_equipe");

	$smarty->assign("lstcod_equipe",$lstcod_equipe);

	unset($objSisEquipe);



	$smarty->assign('modulo', MODULO_SISEQUIPE);

	$smarty->assign('acao', $acao);

	

	if(@empty($index_form)) $index_form = 0;

	$smarty->assign('index_form',$index_form);

	$smarty->assign('display_form',$display_form);

	$smarty->assign('display_form_edit',$display_form_edit);

	$smarty->assign('display_info',$display_info);

	$smarty->assign('display_info_edit',$display_info_edit);

	$smarty->assign('display_cadastro',$display_cadastro);

	$smarty->assign('display_atualiza',$display_atualiza);	
	$smarty->assign('NomeModulo', $lng[$NomeModulo]);
	

	$tplConteudo = $smarty->fetch('tplSisEquipe.htm');

	

?>