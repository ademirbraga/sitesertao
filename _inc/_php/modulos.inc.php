<?php

/**
 * File:    modulos.inc.php
 ** @autor Claudia Matos <claudiarfm@yahoo.com.br>
 * @version 1.0.0
 * @package F3TEC
 *
 * -------------------------------------------------------
 * Gerada em:        17.11.2011
 * Arquivo:          modulos.inc.php
 * Comentarios:		arquivo com informacoes de modulos
 * -------------------------------------------------------	
 *
*/
define("MODULO_TABAUDITCLASSIFICACAO", 1);
$smarty->assign('MODULO_TABAUDITCLASSIFICACAO',MODULO_TABAUDITCLASSIFICACAO);
define("MODULO_TABCLASSIFPESSOA", 2);
$smarty->assign('MODULO_TABCLASSIFPESSOA',MODULO_TABCLASSIFPESSOA);
define("MODULO_TABCUPOM", 3);
$smarty->assign('MODULO_TABCUPOM',MODULO_TABCUPOM);
define("MODULO_TABCUPOMXPESSOA", 4);
$smarty->assign('MODULO_TABCUPOMXPESSOA',MODULO_TABCUPOMXPESSOA);
define("MODULO_TABCUPOMXTIPOSERVICO", 5);
$smarty->assign('MODULO_TABCUPOMXTIPOSERVICO',MODULO_TABCUPOMXTIPOSERVICO);
define("MODULO_TABEMAIL", 6);
$smarty->assign('MODULO_TABEMAIL',MODULO_TABEMAIL);
define("MODULO_TABEMAILPESSOA", 7);
$smarty->assign('MODULO_TABEMAILPESSOA',MODULO_TABEMAILPESSOA);
define("MODULO_TABENVIOEMAIL", 8);
$smarty->assign('MODULO_TABENVIOEMAIL',MODULO_TABENVIOEMAIL);
define("MODULO_TABENVIOSMS", 9);
$smarty->assign('MODULO_TABENVIOSMS',MODULO_TABENVIOSMS);
define("MODULO_TABPESSOA", 10);
$smarty->assign('MODULO_TABPESSOA',MODULO_TABPESSOA);
define("MODULO_TABPLANOCONTAS", 11);
$smarty->assign('MODULO_TABPLANOCONTAS',MODULO_TABPLANOCONTAS);
define("MODULO_TABPLANOPROPRIEDADES", 12);
$smarty->assign('MODULO_TABPLANOPROPRIEDADES',MODULO_TABPLANOPROPRIEDADES);
define("MODULO_TABPROPRCLASSIFPESSOA", 13);
$smarty->assign('MODULO_TABPROPRCLASSIFPESSOA',MODULO_TABPROPRCLASSIFPESSOA);
define("MODULO_TABSMS", 14);
$smarty->assign('MODULO_TABSMS',MODULO_TABSMS);
define("MODULO_TABSTATUSCUPOM", 15);
$smarty->assign('MODULO_TABSTATUSCUPOM',MODULO_TABSTATUSCUPOM);
define("MODULO_TABTELEFONELOJA", 16);
$smarty->assign('MODULO_TABTELEFONELOJA',MODULO_TABTELEFONELOJA);
define("MODULO_TABTIPOSERVICO", 17);
$smarty->assign('MODULO_TABTIPOSERVICO',MODULO_TABTIPOSERVICO);
define("MODULO_TABTIPOTELEFONE", 18);
$smarty->assign('MODULO_TABTIPOTELEFONE',MODULO_TABTIPOTELEFONE);
define("MODULO_TABTRANSACAO", 19);
$smarty->assign('MODULO_TABTRANSACAO',MODULO_TABTRANSACAO);

/* 
 * PERMISSOES
 */
define ( "MODULO_SISACOES", 20 );
$smarty->assign ( 'MODULO_SISACOES', MODULO_SISACOES );

define ( "MODULO_SISEQUIPE", 21 );
$smarty->assign ( 'MODULO_SISEQUIPE', MODULO_SISEQUIPE );

define ( "MODULO_SISEQUIPECONFIGURACOES", 22 );
$smarty->assign ( 'MODULO_SISEQUIPECONFIGURACOES', MODULO_SISEQUIPECONFIGURACOES );

define ( "MODULO_SISPERFIL", 23 );
$smarty->assign ( 'MODULO_SISPERFIL', MODULO_SISPERFIL );

//define ( "MODULO_SISPERFILPERMISSOES", 55 );
//$smarty->assign ( 'MODULO_SISPERFILPERMISSOES', MODULO_SISPERFILPERMISSOES );

define ( "MODULO_SISPERMISSOES", 24 );
$smarty->assign ( 'MODULO_SISPERMISSOES', MODULO_SISPERMISSOES );

define ( "MODULO_SISPERMISSOESHASSISACOES", 25 );
$smarty->assign ( 'MODULO_SISPERMISSOESHASSISACOES', MODULO_SISPERMISSOESHASSISACOES );

define ( "MODULO_SISUSUARIO", 26 );
$smarty->assign ( 'MODULO_SISUSUARIO', MODULO_SISUSUARIO );

define ( "MODULO_SISUSUARIOCONFIGS", 27 );
$smarty->assign ( 'MODULO_SISUSUARIOCONFIGS', MODULO_SISUSUARIOCONFIGS );

?>
