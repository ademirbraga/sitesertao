<?php

/*
 ** @autor Claudia Matos <claudiarfm@yahoo.com.br> - Claudia Matos - claudia.matos@webtupi.com.br
 * -------------------------------------------------------
 * Aplicativo:       appTabEvento.php
 * Gerada em:        08.08.2013
 * Arquivo:          ../sertao/_app/appTabEvento.php
 * Tabela:           tab_evento
 ** Banco:	    bdsertao
 * -------------------------------------------------------	
 *
 */

// Diretorio raiz
if (!defined('WWW_ROOT'))
    define("WWW_ROOT", "../");

// Arquivo de constantes, configuracao e inicializacao
include(WWW_ROOT . "/_inc/_php/geral.inc.php");

$objPrincipal = new TabEvento();
$NomeModulo = $objPrincipal->getnomModulo();

if (!empty($id)) {

    $objPrincipal->listarPorRef(NULL, $where = "A.cod_evento = $id");
    $dados = $objPrincipal->getRegistro();
    
    $objEvPer = new TabEventoPermitido();
    $dadosPerfil = $objEvPer->listar(NULL, $where = "cod_evento = ".$dados['cod_evento'])->getDados();
    
    $cod_perfil = array();
    if(!empty($dadosPerfil)){
	foreach($dadosPerfil as $k => $val){
	    $cod_perfil['cod_perfil'][] = $val['cod_perfil'];
	}
	$dados = array_merge($dados,$cod_perfil);
    }   
        
    $smarty->assign('dados', $dados);
}

$objTabEventoTipo = new TabEventoTipo();
$lstcod_evento_tipo = $objTabEventoTipo->formatDados("cod_evento_tipo", "nom_evento_tipo");
$smarty->assign("lstcod_evento_tipo", $lstcod_evento_tipo);
unset($objTabEventoTipo);

$objTabSisUsuario = new SisUsuario();
$lstcod_usuario = $objTabSisUsuario->formatDados("cod_usuario", "nom_usuario");
$smarty->assign("lstcod_usuario", $lstcod_usuario);
unset($objTabSisUsuario);

$objTabSisPerfil = new SisPerfil();
$arrcod_perfil = $objTabSisPerfil->listar("cod_perfil,nom_perfil", $where = "nom_perfil like 'Site%'")->getDados();
if(!empty($arrcod_perfil)){
    foreach($arrcod_perfil as $key => $val){
	$lstcod_perfil[$val['cod_perfil']] = $val['nom_perfil'];
    }
}
$smarty->assign("lstcod_perfil", $lstcod_perfil);
unset($objTabSisPerfil);

$smarty->assign('modulo', MODULO_TABEVENTO);
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

$tplConteudo = $smarty->fetch('tplTabEvento.htm');
?>