<?php

/*
 ** @autor Claudia Matos <claudiarfm@yahoo.com.br> - Claudia Matos - claudia.matos@webtupi.com.br
 * -------------------------------------------------------
 * Aplicativo:       appTabBanner.php
 * Gerada em:        08.08.2013
 * Arquivo:          ../sertao/_app/appTabBanner.php
 * Tabela:           tab_banner
 ** Banco:	    bdsertao
 * -------------------------------------------------------	
 *
 */


// Diretorio raiz
if (!defined('WWW_ROOT'))
    define("WWW_ROOT", "../");

// Arquivo de constantes, configuracao e inicializacao
include(WWW_ROOT . "/_inc/_php/geral.inc.php");

$objPrincipal = new TabBanner();

$NomeModulo = $objPrincipal->getnomModulo();

if (!empty($id)) {

    $objPrincipal->listarPorRef(NULL, $where = "A.cod_banner = $id");
    $dados = $objPrincipal->getRegistro();
    
    $objBannerImg = new TabBannerImagem();
    $dadosImagem =$objBannerImg->listar(NULL, $where = "cod_banner = $id")->getRegistro();
   
    $smarty->assign('dadosImagem', $dadosImagem);
    $smarty->assign('dados', $dados);
}

$objTabBannerTipo = new TabBannerTipo();

$lstcod_banner_tipo = $objTabBannerTipo->formatDados("cod_banner_tipo", "nom_tipo_banner");
$smarty->assign("lstcod_banner_tipo", $lstcod_banner_tipo);
unset($objTabBannerTipo);

$objTabSisUsuario = new SisUsuario();
$lstcod_usuario = $objTabSisUsuario->formatDados("cod_usuario", "nom_usuario");
$smarty->assign("lstcod_usuario", $lstcod_usuario);
unset($objTabSisUsuario);

$smarty->assign('modulo', MODULO_TABBANNER);
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

$tplConteudo = $smarty->fetch('tplTabBanner.htm');
?>