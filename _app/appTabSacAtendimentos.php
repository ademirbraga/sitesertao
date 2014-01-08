<?php

/*
 ** @autor Claudia Matos <claudiarfm@yahoo.com.br> - Claudia Matos - claudia.matos@webtupi.com.br
 * -------------------------------------------------------
 * Aplicativo:       appTabSacAtendimentos.php
 * Gerada em:        08.08.2013
 * Arquivo:          ../sertao/_app/appTabSacAtendimentos.php
 * Tabela:           tab_sac_atendimentos
 ** Banco:	    bdsertao
 * -------------------------------------------------------	
 *
 */

// Diretorio raiz
if (!defined('WWW_ROOT'))
    define("WWW_ROOT", "../");

// Arquivo de constantes, configuracao e inicializacao
include(WWW_ROOT . "/_inc/_php/geral.inc.php");

$objPrincipal = new TabSacAtendimentos();
$NomeModulo = $objPrincipal->getnomModulo();

if (!empty($id)) {

    $objPrincipal->listar(NULL, $where = "cod_sac_atendimentos = $id");
    $dados = $objPrincipal->getRegistro();

    $smarty->assign('dados', $dados);
}

$objTabSac = new TabSac();

$lstcod_sac = $objTabSac->formatDados("cod_sac", "nom_sac");
$smarty->assign("lstcod_sac", $lstcod_sac);
unset($objTabSac);

$objTabSisUsuario = new SisUsuario();

$lstcod_usuario = $objTabSisUsuario->formatDados("cod_usuario", "nom_usuario");
$smarty->assign("lstcod_usuario", $lstcod_usuario);
unset($objTabSisUsuario);

$smarty->assign('modulo', MODULO_TABSACATENDIMENTOS);
$smarty->assign('acao', $acao);

if (@empty($index_form))
    $index_form = 0;
$smarty->assign('index_form', $index_form);
$smarty->assign('display_form', $display_form);
$smarty->assign('display_form_edit', $display_form_edit);
$smarty->assign('display_info', $display_info);
$smarty->assign('display_info_edit', $display_info_edit);
$smarty->assign('display_cadastro', $display_cadastro);
$smarty->assign('display_atualiza', $display_atualiza);
$smarty->assign('xxajax', $xxajax);
$smarty->assign('NomeModulo', $lng[$NomeModulo]);

$tplConteudo = $smarty->fetch('tplTabSacAtendimentos.htm');
?>