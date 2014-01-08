<?php

/*
 ** @autor Claudia Matos <claudiarfm@yahoo.com.br> - Claudia Matos - claudia.matos@webtupi.com.br
 * -------------------------------------------------------
 * Aplicativo:       appTabEventoUpload.php
 * Gerada em:        08.08.2013
 * Arquivo:          ../sertao/_app/appTabEventoUpload.php
 * Tabela:           tab_evento_upload
 ** Banco:	    bdsertao
 * -------------------------------------------------------	
 *
 */

// Diretorio raiz
if (!defined('WWW_ROOT'))
    define("WWW_ROOT", "../");

// Arquivo de constantes, configuracao e inicializacao
include(WWW_ROOT . "/_inc/_php/geral.inc.php");

$objPrincipal = new TabEventoUpload();
$NomeModulo = $objPrincipal->getnomModulo();

if (!empty($id)) {

    $objPrincipal->listar(NULL, $where = "cod_evento_upload = $id");
    $dados = $objPrincipal->getRegistro();

    $smarty->assign('dados', $dados);
}

$objTabEventoImagem = new TabEventoImagem();

$lstcod_evento_imagem = $objTabEventoImagem->formatDados("cod_evento_imagem", "nom_evento_imagem");
$smarty->assign("lstcod_evento_imagem", $lstcod_evento_imagem);
unset($objTabEventoImagem);

$smarty->assign('modulo', MODULO_TABEVENTOUPLOAD);
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

$tplConteudo = $smarty->fetch('tplTabEventoUpload.htm');
?>