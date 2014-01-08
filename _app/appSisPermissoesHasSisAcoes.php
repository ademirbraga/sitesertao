<?php

	/**

* Aplicativo do sistema para trabalhar com a tabela sis_permissoes_has_sis_acoes.

*



* @category Aplicativo

* @name _aplicativos/appSisPermissoesHasSisAcoes.php

* @author WebTupi

* @copyright [Informa��es de Direitos de C�pia]

* @license [link da licen�a] [Nome da licen�a]

* @link [link de onde pode ser encontrado esse arquivo]

* @version 1.0.0

* @since 13/05/2011 19:06:55

*/



	// Diretorio raiz

	if(!defined('WWW_ROOT'))

		define("WWW_ROOT","../");

				

	// Arquivo de constantes, configuracao e inicializacao

	include(WWW_ROOT."_inc/_php/geral.inc.php");

	

	$objPrincipal = new SisPermissoesHasSisAcoes();

	

	if(!empty($id)){

	

		$objPrincipal = $objPrincipal->listar(null,$where = "cod_permissao = $id");

		$dados = $objPrincipal->getRegistro();	

		

	}else{

		$dados['cod_usuario'] = $_SESSION['usr']['cod_usuario'];

		$dados['cod_equipe'] = $_SESSION['usr']['cod_equipe'];

	}	

	$smarty->assign('dados', $dados);



	$objSisAcoes = new SisAcoes();

	$lstcod_acao = $objSisAcoes->formatDados("cod_acao","nom_acao");

	$smarty->assign("lstcod_acao",$lstcod_acao);

	unset($objSisAcoes);



	$objSisPermissoes = new SisPermissoes();

	$lstcod_permissao = $objSisPermissoes->formatDados("cod_permissao","nom_permissao");

	$smarty->assign("lstcod_permissao",$lstcod_permissao);

	unset($objSisPermissoes);



	$smarty->assign('modulo', MODULO_SISPERMISSOESHASSISACOES);

	$smarty->assign('acao', $acao);

	

	if(@empty($index_form)) $index_form = 0;

	$smarty->assign('index_form',$index_form);

	$smarty->assign('display_form',$display_form);

	$smarty->assign('display_form_edit',$display_form_edit);

	$smarty->assign('display_info',$display_info);

	$smarty->assign('display_info_edit',$display_info_edit);

	$smarty->assign('display_cadastro',$display_cadastro);

	$smarty->assign('display_atualiza',$display_atualiza);	

	

	$tplConteudo = $smarty->fetch('tplSisPermissoesHasSisAcoes.htm');

	

?>