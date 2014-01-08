<?php

/*
 ** @autor Claudia Matos <claudiarfm@yahoo.com.br> - Claudia Matos - claudia.matos@webtupi.com.br
 * -------------------------------------------------------
 * Aplicativo:       appTabSac.php
 * Gerada em:        08.08.2013
 * Arquivo:          ../sertao/_app/appTabSac.php
 * Tabela:           tab_sac
 ** Banco:	    bdsertao
 * -------------------------------------------------------	
 *
 */

// Diretorio raiz
if (!defined('WWW_ROOT'))
    define("WWW_ROOT", "../");

// Arquivo de constantes, configuracao e inicializacao
include(WWW_ROOT . "/_inc/_php/geral.inc.php");

$objPrincipal = new TabSac();
$NomeModulo = $objPrincipal->getnomModulo();

if (!empty($id)) {
    	     
    $objPrincipal->listarPorRef(NULL, $where = "A.cod_sac = $id");
    $dados = $objPrincipal->getRegistro();

    $smarty->assign('dados', $dados);
    
    $objPrincipal->setOrder("C.cod_sac_atendimentos ASC");    
    $objPrincipal->listarAtendimentos(NULL, $where = "A.cod_sac = $id");
    $dadosAtend = $objPrincipal->getDados();

   
    $smarty->assign('dadosAtend', $dadosAtend);
}

/*
 $objTabCliente = new TabCliente();
 
$lstcod_cliente = $objTabCliente->formatDados("cod_cliente", "nom_cliente");
$smarty->assign("lstcod_cliente", $lstcod_cliente);
unset($objTabCliente);
*/
$objTabSisUsuario = new SisUsuario();

$lstcod_usuario = $objTabSisUsuario->formatDados("cod_usuario", "nom_usuario");
$smarty->assign("lstcod_usuario", $lstcod_usuario);
unset($objTabSisUsuario);

$smarty->assign('modulo', MODULO_TABSAC);
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

$tplConteudo = $smarty->fetch('tplTabSac.htm');
?>