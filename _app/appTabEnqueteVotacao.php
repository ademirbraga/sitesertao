<?php

/*
 ** @autor Claudia Matos <claudiarfm@yahoo.com.br> - Claudia Matos - claudia.matos@webtupi.com.br
 * -------------------------------------------------------
 * Aplicativo:       appTabEnqueteVotacao.php
 * Gerada em:        08.08.2013
 * Arquivo:          ../sertao/_app/appTabEnqueteVotacao.php
 * Tabela:           tab_enquete_votacao
 ** Banco:	    bdsertao
 * -------------------------------------------------------	
 *
 */

// Diretorio raiz
if (!defined('WWW_ROOT'))
    define("WWW_ROOT", "../");

// Arquivo de constantes, configuracao e inicializacao
include(WWW_ROOT . "/_inc/_php/geral.inc.php");

$objPrincipal = new TabEnqueteVotacao();
$NomeModulo = $objPrincipal->getnomModulo();

if (!empty($id)) {

    $objPrincipal->listar(NULL, $where = "cod_enquete_votacao = $id");
    $dados = $objPrincipal->getRegistro();

    $smarty->assign('dados', $dados);
}

$objTabEnqueteAlternativa = new TabEnqueteAlternativa();
$lstcod_enquete_alternativa = $objTabEnqueteAlternativa->formatDados("cod_enquete_alternativa", "nom_enquete_alternativa");
$smarty->assign("lstcod_enquete_alternativa", $lstcod_enquete_alternativa);
unset($objTabEnqueteAlternativa);

$objTabSisUsuario = new SisUsuario();
$lstcod_usuario = $objTabSisUsuario->formatDados("cod_usuario", "nom_usuario");
$smarty->assign("lstcod_usuario", $lstcod_usuario);
unset($objTabSisUsuario);

$smarty->assign('modulo', MODULO_TABENQUETEVOTACAO);
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

$tplConteudo = $smarty->fetch('tplTabEnqueteVotacao.htm');
?>