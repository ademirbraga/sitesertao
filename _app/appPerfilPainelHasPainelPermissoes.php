<?php

	/**

* Aplicativo do sistema para trabalhar com a tabela perfil_painel_has_painel_permissoes.

*



* @category Aplicativo

* @name _aplicativos/appPerfilPainelHasPainelPermissoes.php

* @author WebTupi

* @copyright [Informa��es de Direitos de C�pia]

* @license [link da licen�a] [Nome da licen�a]

* @link [link de onde pode ser encontrado esse arquivo]

* @version 1.0.0

* @since 13/06/2011 14:14:11

*/



	// Diretorio raiz

	if(!defined('WWW_ROOT'))

		define("WWW_ROOT","../");

				

	// Arquivo de constantes, configuracao e inicializacao

	include(WWW_ROOT."_inc/_php/geral.inc.php");

	

	$objPrincipal = new PerfilPainelHasPainelPermissoes();

	

	if(!empty($id)){

	

		$objPrincipal = $objPrincipal->listar(null,$where = "cod_perfil_painel = $id");

		$dados = $objPrincipal->getRegistro();	

		

	}else{

		$dados['cod_usuario'] = $_SESSION['usr']['cod_usuario'];

		$dados['cod_equipe'] = $_SESSION['usr']['cod_equipe'];

	}	

	$smarty->assign('dados', $dados);



	$objPainelPermissoes = new PainelPermissoes();

	$lstcod_painel_permissoes = $objPainelPermissoes->formatDados("cod_painel_permissoes","nom_painel_permissoes");

	$smarty->assign("lstcod_painel_permissoes",$lstcod_painel_permissoes);

	unset($objPainelPermissoes);



	$objPerfilPainel = new PerfilPainel();

	$lstcod_perfil_painel = $objPerfilPainel->formatDados("cod_perfil_painel","nom_perfil_painel");

	$smarty->assign("lstcod_perfil_painel",$lstcod_perfil_painel);

	unset($objPerfilPainel);



	$smarty->assign('modulo', MODULO_PERFILPAINELHASPAINELPERMISSOES);

	$smarty->assign('acao', $acao);

	

	if(@empty($index_form)) $index_form = 0;

	$smarty->assign('index_form',$index_form);

	$smarty->assign('display_form',$display_form);

	$smarty->assign('display_form_edit',$display_form_edit);

	$smarty->assign('display_info',$display_info);

	$smarty->assign('display_info_edit',$display_info_edit);

	$smarty->assign('display_cadastro',$display_cadastro);

	$smarty->assign('display_atualiza',$display_atualiza);	

	

	$tplConteudo = $smarty->fetch('tplPerfilPainelHasPainelPermissoes.htm');

	

?>