<?php

/*
 ** @autor Claudia Matos <claudiarfm@yahoo.com.br> - Claudia Matos - claudia.matos@webtupi.com.br
 * -------------------------------------------------------
 * Aplicativo:       appTabEnquetePermitido.php
 * Gerada em:        08.08.2013
 * Arquivo:          ../sertao/_app/appTabEnquetePermitido.php
 * Tabela:           tab_enquete_permitido
 ** Banco:	    bdsertao
 * -------------------------------------------------------	
 *
 */

// Diretorio raiz
if (!defined('WWW_ROOT'))
    define("WWW_ROOT", "../");

// Arquivo de constantes, configuracao e inicializacao
include(WWW_ROOT . "/_inc/_php/geral.inc.php");

$objPrincipal = new TabEnquetePermitido();
$NomeModulo = $objPrincipal->getnomModulo();

if (!empty($id)) {

    $objPrincipal->listar(NULL, $where = "cod_enquete_permitido = $id");
    $dados = $objPrincipal->getRegistro();

    $smarty->assign('dados', $dados);
}

$objTabEnquete = new TabEnquete();
$lstcod_enquete = $objTabEnquete->formatDados("cod_enquete", "nom_enquete");
$smarty->assign("lstcod_enquete", $lstcod_enquete);
unset($objTabEnquete);

$objTabSisPerfil = new TabSisPerfil();
$lstcod_perfil = $objTabSisPerfil->formatDados("cod_perfil", "nom_perfil");
$smarty->assign("lstcod_perfil", $lstcod_perfil);
unset($objTabSisPerfil);

$smarty->assign('modulo', MODULO_TABENQUETEPERMITIDO);
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

$tplConteudo = $smarty->fetch('tplTabEnquetePermitido.htm');
?>