<?php

/**
 * Aplicativo do sistema para trabalhar com a tabela sis_usuario.
 *
 * @category Aplicativo
 * @name _aplicativos/appSisUsuario.php
 * @author WebTupi
 * @copyright [Informações de Direitos de Cópia]
 * @license [link da licença] [Nome da licença]
 * @link [link de onde pode ser encontrado esse arquivo]
 * @version 1.0.0
 * @since 13/05/2011 19:06:55
 */

// Diretorio raiz
if (!defined('WWW_ROOT'))
    define("WWW_ROOT", "../");

// Arquivo de constantes, configuracao e inicializacao
include(WWW_ROOT . "_inc/_php/geral.inc.php");
require_once (INCLUDE_PHP_FUNC . "/fctAx.php");

$objPrincipal = new SisUsuario();
$NomeModulo = $objPrincipal->getnomModulo();

if (!empty($id)) {

    $objPrincipal = $objPrincipal->listar(null, $where = "cod_usuario = $id");
    $dados = $objPrincipal->getRegistro();

    // breadcrumb		
    $extras['breadcrumbs'][$dados['dados']['nom_usuario']] = "";
    /*
    $objConfig = new SisUsuarioConfigs();
    $objConfig = $objConfig->listar(null, $where = "cod_usuario = $id");
    $dados['configs'] = $objConfig->getRegistro();
     * /
     */
    
    $objUsrSite = new TabUsuarioSite();
    $usrSite = $objUsrSite->listar(NULL, $where = "cod_usuario = ".$id)->getDados();
    
    $cod_usr_site = array();
    if(!empty($usrSite)){
	foreach($usrSite as $k => $val){
	    $cod_usr_site['cod_menu'][] = $val['cod_menu'];
	}
	$dados = array_merge($dados,$cod_usr_site);
    } 
    //echo "<pre>";print_r($dados);die;
    $smarty->assign('dados', $dados);
}

/*
 * TODOS AS EQUIPES
 */
$objSisEquipe = new SisEquipe();
$lstcod_equipe = $objSisEquipe->formatDados("cod_equipe", "nom_equipe");
//$dados["lstcod_equipe"] = $lstcod_equipe;
$smarty->assign('lstcod_equipe', $lstcod_equipe);
unset($objSisEquipe);

/*
 * TODOS OS PERFIL DO USUARIO
 */
$objSisPerfil = new SisPerfil();
$array_perfil = $objSisPerfil->listar(null, $where = "")->getDados();
//echo "<pre>";print_r($array_perfil);die;
if(!empty($array_perfil)){
    foreach ($array_perfil as $key => $value) {
	$lstcod_perfil[$value['cod_perfil']] = $value['nom_perfil'];
    }
    //$dados["lstcod_perfil"] = $lstcod_perfil;
}
$smarty->assign('lstcod_perfil', $lstcod_perfil);
unset($objSisPerfil);

$smarty->assign('modulo', MODULO_SISUSUARIO);
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

//Helpers::smartyAssign($smarty, $dados);

$tplConteudo = $smarty->fetch('tplSisUsuario.htm');
?>