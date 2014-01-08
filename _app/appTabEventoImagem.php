<?php

/*
 ** @autor Claudia Matos <claudiarfm@yahoo.com.br> - Claudia Matos - claudia.matos@webtupi.com.br
 * -------------------------------------------------------
 * Aplicativo:       appTabEventoImagem.php
 * Gerada em:        08.08.2013
 * Arquivo:          ../sertao/_app/appTabEventoImagem.php
 * Tabela:           tab_evento_imagem
 ** Banco:	    bdsertao
 * -------------------------------------------------------	
 *
 */

// Diretorio raiz
if (!defined('WWW_ROOT'))
    define("WWW_ROOT", "../");

// Arquivo de constantes, configuracao e inicializacao
include(WWW_ROOT . "/_inc/_php/geral.inc.php");

$objPrincipal = new TabEventoImagem();
$NomeModulo = $objPrincipal->getnomModulo();

if (!empty($id)) {

    $objPrincipal->listar(NULL, $where = "cod_evento_imagem = $id");
    $dados = $objPrincipal->getRegistro();
    
    $objEvUp = new TabEventoUpload();
    $dadosImagem =$objEvUp->listar(NULL, $where = "cod_evento_imagem = $id")->getDados();
   
    $smarty->assign('dadosImagem', $dadosImagem);
    $smarty->assign('dados', $dados);
}

$objTabSisUsuario = new SisUsuario();
$lstcod_usuario = $objTabSisUsuario->formatDados("cod_usuario", "nom_usuario");
$smarty->assign("lstcod_usuario", $lstcod_usuario);
unset($objTabSisUsuario);

$smarty->assign('cod_perfil', SITECOLABORADORES);
$smarty->assign('modulo', MODULO_TABEVENTOIMAGEM);
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

$tplConteudo = $smarty->fetch('tplTabEventoImagem.htm');
?>