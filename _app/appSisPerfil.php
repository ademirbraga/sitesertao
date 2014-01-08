<?php

/*
 ** @autor Claudia Matos <claudiarfm@yahoo.com.br> - Claudia Matos - claudia.matos@webtupi.com.br
 * -------------------------------------------------------
 * Aplicativo:       appSisPerfil.php
 * Gerada em:        08.08.2013
 * Arquivo:          ../sertao/_app/appSisPerfil.php
 * Tabela:           sis_perfil
 ** Banco:	    bdsertao
 * -------------------------------------------------------	
 *
 */

// Diretorio raiz
if(!defined('WWW_ROOT'))
	define("WWW_ROOT","../");

// Arquivo de constantes, configuracao e inicializacao
include(WWW_ROOT."_inc/_php/geral.inc.php");

$objPrincipal = new SisPerfil();
$NomeModulo = $objPrincipal->getnomModulo();

if(!empty($id)){

    $dados = $objPrincipal->listar( null, $where = "cod_perfil = {$id}" )->getRegistro();

    // breadcrumb		
    $extras[ 'breadcrumbs' ][ $dados['nom_perfil'] ] = "";

    $objSisPerfilPermissoes = new SisPerfilPermissoes;
    $lstPermissoes = $objSisPerfilPermissoes->listar( 'cod_permissao, num_nivel_permissao', "cod_perfil = {$id}" )->getPares();

    $smarty->assign( 'lstPermissoes', $lstPermissoes );

}else{
    $dados['cod_usuario'] = $_SESSION['usr']['cod_usuario'];
    $dados['cod_equipe'] = $_SESSION['usr']['cod_equipe'];

}	

$smarty->assign('dados', $dados);

$objSisPermissoesHasSisAcoes = new SisPermissoesHasSisAcoes();
$dadosPermissoes = $objSisPermissoesHasSisAcoes->listar(NULL,$where="")->getDados();

$lstPermAcoes = array();
$lstAcoes = array();
$lstPerm = array();

foreach($dadosPermissoes as $chPerm => $valPerm){

    $lstPermAcoes[$valPerm['cod_permissao']][$valPerm['cod_acao']] = 1;

    if(!isset($lstAcoes[$valPerm['cod_acao']]))
	    $lstAcoes[$valPerm['cod_acao']] = $valPerm['nom_acao'];

    if(!isset($lstPerm[$valPerm['cod_permissao']]))
	    $lstPerm[$valPerm['cod_permissao']] = $valPerm['dsc_permissao'];

}

$smarty->assign('modulo', MODULO_SISPERFIL);
$smarty->assign('lstPermAcoes', $lstPermAcoes);
$smarty->assign('lstAcoes', $lstAcoes);
$smarty->assign('lstPerm', $lstPerm);
$smarty->assign('acao', $acao);

if(@empty($index_form)) $index_form = 0;

$smarty->assign('index_form',$index_form);
$smarty->assign('display_form',$display_form);
$smarty->assign('display_form_edit',$display_form_edit);
$smarty->assign('display_info',$display_info);
$smarty->assign('display_info_edit',$display_info_edit);
$smarty->assign('display_cadastro',$display_cadastro);
$smarty->assign('display_atualiza',$display_atualiza);	
$smarty->assign('NomeModulo', $lng[$NomeModulo]);

$tplConteudo = $smarty->fetch('tplSisPerfil.htm');

?>