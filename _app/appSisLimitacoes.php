<?php



/**

 * Aplicativo do sistema para trabalhar com a tabela cdr_custom.

 *

 

 * @category Aplicativo

 * @name _aplicativos/appCdrCustom.php

 * @author WebTupi

 * @copyright [Informa��es de Direitos de C�pia]

 * @license [link da licen�a] [Nome da licen�a]

 * @link [link de onde pode ser encontrado esse arquivo]

 * @version 1.0.0

 * @since 13/05/2011 19:06:32

 */

// Diretorio raiz

if (!defined('WWW_ROOT'))

    define("WWW_ROOT", "../");



// Arquivo de constantes, configuracao e inicializacao

include(WWW_ROOT . "_inc/_php/geral.inc.php");

$dados = array();



if(!MOSTRAR_LIMITES){

    @header("location:index.php");

}

$objPrincipal = new SisLimitacoes();



if (!empty($id)) {



    if ($id == trim('Nenhum')) {



        $objPrincipal = $objPrincipal->getRegistroSisLimite($where = "A.cod_equipe IS NULL");

    } else {

      

        $objPrincipal = $objPrincipal->getRegistroSisLimiteCodEquipe($where = "A.cod_equipe = $id");

    }



    $dados = $objPrincipal->getDados();



    $limitesMarcadados = null;



    foreach ($dados as $key => $value) {



        $valores .= " ;$('.cod_limitacao_" . $value['cod_limitacao'] . "').val('$value[val_limitacao]')";

        $limitesMarcadados .= " , #usar_" . $value['cod_limitacao'];

    }



    if (empty($dados[0]['nom_equipe'])) {

        $cod_equipe_marcado .= "#cod_equipe option[value=todos]";

        $dados[0]['nom_equipe'] = "Todas";

    }



    $smarty->assign('limitesMarcadados', $limitesMarcadados);

    $smarty->assign('valores', $valores);

    $smarty->assign('cod_equipe_marcado', $cod_equipe_marcado);

} else {



    $dados['cod_usuario'] = $_SESSION['usr']['cod_usuario'];

    $dados['cod_equipe'] = $_SESSION['usr']['cod_equipe'];

}



$objSisEquipe = new SisEquipe();

$lstcod_equipe = $objSisEquipe->formatDados("cod_equipe", "nom_equipe");

$smarty->assign("lstcod_equipe", $lstcod_equipe);



$smarty->assign('dados', $dados);



$perfilsLigacoes = new Limitacoes();

$perfilsLigacoes->setOrder('nom_limitacao ASC');

$lst_limites = $perfilsLigacoes->listar(null , $where = 'cod_permissao IS NOT NULL')->getDados();

$smarty->assign("lst_limites", $lst_limites);



unset($perfilsLigacoes);



$smarty->assign('modulo', MODULO_SISLIMITACOES);



if (@empty($index_form))

    $index_form = 0;



$smarty->assign('index_form', $index_form);

$smarty->assign('display_form', $display_form);

$smarty->assign('display_form_edit', $display_form_edit);

$smarty->assign('display_info', $display_info);

$smarty->assign('display_info_edit', $display_info_edit);

$smarty->assign('display_cadastro', $display_cadastro);

$smarty->assign('display_atualiza', $display_atualiza);



$tplConteudo = $smarty->fetch('tplSisLimitacoes.htm');

?>