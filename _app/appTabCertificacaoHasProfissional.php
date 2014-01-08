<?php

/*
 ** @autor Claudia Matos <claudiarfm@yahoo.com.br> - Claudia Matos - claudia.matos@webtupi.com.br
 * -------------------------------------------------------
 * Aplicativo:       appTabCertificacaoHasProfissional.php
 * Gerada em:        08.08.2013
 * Arquivo:          ../sertao/_app/appTabCertificacaoHasProfissional.php
 * Tabela:           tab_certificacao_has_profissional
 ** Banco:	    bdsertao
 * -------------------------------------------------------	
 *
 */

// Diretorio raiz
if (!defined('WWW_ROOT'))
    define("WWW_ROOT", "../");

// Arquivo de constantes, configuracao e inicializacao
include(WWW_ROOT . "/_inc/_php/geral.inc.php");

$objPrincipal = new TabCertificacaoHasProfissional();
$NomeModulo = $objPrincipal->getnomModulo();

if (!empty($id)) {

    $objPrincipal->listar(NULL, $where = "cod_certificacao_has_profissional = $id");
    $dados = $objPrincipal->getRegistro();

    $smarty->assign('dados', $dados);
}

$objTabCertificacaoEspecializacao = new TabCertificacaoEspecializacao();
$lstcod_certificacao_especializacao = $objTabCertificacaoEspecializacao->formatDados("cod_certificacao_especializacao", "nom_certificacao_especializacao");
$smarty->assign("lstcod_certificacao_especializacao", $lstcod_certificacao_especializacao);
unset($objTabCertificacaoEspecializacao);

$objTabTrabalheConosco = new TabTrabalheConosco();
$lstcod_trabalhe_conosco = $objTabTrabalheConosco->formatDados("cod_trabalhe_conosco", "nom_trabalhe_conosco");
$smarty->assign("lstcod_trabalhe_conosco", $lstcod_trabalhe_conosco);
unset($objTabTrabalheConosco);

$smarty->assign('modulo', MODULO_TABCERTIFICACAOHASPROFISSIONAL);
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

$tplConteudo = $smarty->fetch('tplTabCertificacaoHasProfissional.htm');
?>